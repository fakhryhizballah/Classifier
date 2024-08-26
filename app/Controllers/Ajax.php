<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Phpml\Classification\DecisionTree;
use Phpml\Classification\NaiveBayes;
use Phpml\ModelManager;
use Phpml\Metric\Accuracy;
use App\Models\PolriModel;
use App\Models\LabelModel;
use App\Models\NilaiModel;
use App\Models\SampelModel;
use App\Models\HasilModel;
use App\Libraries\TreeNode;

class Ajax extends ResourceController
{
    protected $labelModel;
    protected $polriModel;
    protected $nilaiModel;
    protected $sampelModel;
    protected $hasilModel;
    protected $treeNode;
    public function __construct()
    {
        $this->polriModel = new polriModel();
        $this->labelModel = new labelModel();
        $this->nilaiModel = new nilaiModel();
        $this->sampelModel = new sampelModel();
        $this->hasilModel = new HasilModel();
        $this->treeNode = new TreeNode();
    }
    public function index()
    {
        $data = [
            'status' => '200',
            'data' => ['oke']
        ];

        return $this->respond($data, 200);
    }
    public function postSiswa()
    {
        $request = $this->request->getPost();
        $data = [
            'name' => $this->request->getPost('name'),
            'NOSIS' => $this->request->getPost('NOSIS'),
            'PLETON' => $this->request->getPost('PLETON'),
        ];

        // Validasi data (opsional)
        if (!$this->validate([
            'name' => 'required|min_length[2]',
            'NOSIS' => 'required|min_length[2]',
            'PLETON' => 'required|min_length[2]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->polriModel->insert($data);

        $response = [
            'status' => '200',
            'data' => $request
        ];
        return redirect()->back();
    }
    public function getSiswa()
    {
        $data = $this->polriModel->findAll();
        $response = [
            'status' => '200',
            'data' => $data
        ];
        return $this->respond($response, 200);
    }
    public function deleteSiswa($id)
    {
        $this->polriModel->delete($id);
        $response = [
            'status' => '200',
            'data' => null
        ];
        return $this->respond($response, 200);
    }
    // Input label
    public function postLabel()
    {
        $data = [
            'moral' => $this->request->getPost('MORAL'),
            'penampilan' => $this->request->getPost('PENAMPILAN'),
            'kepemimpinan' => $this->request->getPost('KEPEMIMPINAN'),
            'disiplin' => $this->request->getPost('DISIPLIN'),
            'pengendalian' => $this->request->getPost('PENGENDALIAN'),
            'label' => $this->request->getPost('LABEL'),

        ];
        if (!$this->validate([
            'MORAL' => 'required',
            'PENAMPILAN' => 'required',
            'KEPEMIMPINAN' => 'required',
            'DISIPLIN' => 'required',
            'PENGENDALIAN' => 'required',
            'LABEL' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->labelModel->insert($data);

        return redirect()->back();
    }
    public function getLabel()
    {
        $data = $this->labelModel->findAll();
        $response = [
            'status' => '200',
            'data' => $data
        ];
        return $this->respond($response, 200);
    }
    public function deleteLabel($id)
    {
        $this->labelModel->delete($id);
        $response = [
            'status' => '200',
            'data' => null
        ];
        return $this->respond($response, 200);
    }
    public function postSampel()
    {
        $data = [
            'moral' => $this->request->getPost('Sampel_MORAL'),
            'penampilan' => $this->request->getPost('Sampel_PENAMPILAN'),
            'kepemimpinan' => $this->request->getPost('Sampel_KEPEMIMPINAN'),
            'disiplin' => $this->request->getPost('Sampel_DISIPLIN'),
            'pengendalian' => $this->request->getPost('Sampel_PENGENDALIAN'),
            'label' => $this->request->getPost('Sampel_LABEL'),

        ];
        if (!$this->validate([
            'Sampel_MORAL' => 'required',
            'Sampel_PENAMPILAN' => 'required',
            'Sampel_KEPEMIMPINAN' => 'required',
            'Sampel_DISIPLIN' => 'required',
            'Sampel_PENGENDALIAN' => 'required',
            'Sampel_LABEL' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->sampelModel->insert($data);

        return redirect()->back();
    }
    public function getSampel()
    {
        $data = $this->sampelModel->findAll();
        $response = [
            'status' => '200',
            'data' => $data
        ];
        return $this->respond($response, 200);
    }
    public function deleteSampel($id)
    {
        $this->sampelModel->delete($id);
        $response = [
            'status' => '200',
            'data' => null
        ];
        return $this->respond($response, 200);
    }
    public function getNilaiSiswa($id)
    {
        $data = $this->nilaiModel->where('id_polri', $id)->find();
        if (!$data) {
            $response = [
                'status' => '404',
                'data' => null
            ];
            return $this->respond($response, 404);
        }
        $response = [
            'status' => '200',
            'data' => $data
        ];
        return $this->respond($response, 200);

    }
    public function addNilaiSiswa()
    {
        $data = [
            'id_polri' => $this->request->getPost('id_polri'),
            'moral' => $this->request->getPost('moral'),
            'penampilan' => $this->request->getPost('penampilan'),
            'kepemimpinan' => $this->request->getPost('kepemimpinan'),
            'disiplin' => $this->request->getPost('disiplin'),
            'pengendalian' => $this->request->getPost('pengendalian'),
            'label' => $this->request->getPost('label'),
        ];
        $nilais = $this->nilaiModel->where('id_polri', $this->request->getPost('id_polri'))->find();
        if ($nilais) {
            $this->nilaiModel->update($nilais[0]['id'], $data);
            return redirect()->back();
        }
        $this->nilaiModel->insert($data);
        return redirect()->back();
    }
    public function getallNilaiSiswa()
    {
        $nilai = $this->nilaiModel->getNilaiWithPolri();
        $response = [
            'status' => '200',
            'data' => $nilai
        ];
        return $this->respond($response, 200);
    }
    public function getPredictDt()
    {
        $dataSample = $this->labelModel->findAll();
        $samples = [];
        $labels = [];
        foreach ($dataSample as $s) {
            $samples[] = [$s['moral'], $s['penampilan'], $s['kepemimpinan'], $s['disiplin'], $s['pengendalian']];
            $labels[] = $s['label'];
        }
        $classifier = new DecisionTree();
        $classifier->train($samples, $labels);
        $dataSiswa = $this->nilaiModel->getNilaiWithPolri();
        foreach ($dataSiswa as $s) {
            $predicted = $classifier->predict([$s['moral'], $s['penampilan'], $s['kepemimpinan'], $s['disiplin'], $s['pengendalian']]);
            $hasil = $this->hasilModel->where('id_polri', $s['id_polri'])->find();
            if (!$hasil) {
                $this->hasilModel->save([
                    'id_polri' => $s['id_polri'],
                    'dt' => $predicted
                ]);
            } else {
                $this->hasilModel->update($s['id_polri'], ['dt' => $predicted]);
            }
        }
        $response = [
            'status' => '200',
            'data' => [$classifier]
        ];
        return $this->respond($response, 200);
    }
    public function getPredictNb()
    {
        $dataSample = $this->labelModel->findAll();
        $samples = [];
        $labels = [];
        foreach ($dataSample as $s) {
            $samples[] = [$s['moral'], $s['penampilan'], $s['kepemimpinan'], $s['disiplin'], $s['pengendalian']];
            $labels[] = $s['label'];
        }
        $classifier = new NaiveBayes();
        $classifier->train($samples, $labels);
        $dataSiswa = $this->nilaiModel->getNilaiWithPolri();
        foreach ($dataSiswa as $s) {
            $predicted = $classifier->predict([$s['moral'], $s['penampilan'], $s['kepemimpinan'], $s['disiplin'], $s['pengendalian']]);
            $hasil = $this->hasilModel->where('id_polri', $s['id_polri'])->find();
            if (!$hasil) {
                $this->hasilModel->save([
                    'id_polri' => $s['id_polri'],
                    'nb' => $predicted
                ]);
            } else {
                $this->hasilModel->update($s['id_polri'], ['nb' => $predicted]);
            }
        }
        $response = [
            'status' => '200',
            'data' => $classifier
        ];
        return $this->respond($response, 200);
    }
    public function comparison()
    {
        $dataSiswa = $this->hasilModel->getNilaiWithPolri();
        $response = [
            'status' => '200',
            'data' => $dataSiswa
        ];
        return $this->respond($response, 200);
    }
    public function getTest()
    {
        $dataSample = $this->labelModel->findAll();
        $samples = [];
        $labels = [];
        foreach ($dataSample as $s) {
            $samples[] = [$s['moral'], $s['penampilan'], $s['kepemimpinan'], $s['disiplin'], $s['pengendalian']];
            $labels[] = $s['label'];
        }
        $classifierDt = new DecisionTree();
        $classifierDt->train($samples, $labels);
        // Menyimpan model ke file
        $modelManager = new ModelManager();
        $modelManager->saveToFile($classifierDt, 'tree-model.phpml');
        $root = $this->treeNode->calculateBestThreshold($samples, $labels, 2);
       // dd($root);

        $response = [
            'status' => '200',
            'data' => $root
        ];
        return $this->respond($response, 200);
    }
}
