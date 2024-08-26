<?php

namespace App\Libraries;

class TreeNode
{
    public $feature;
    public $threshold;
    public $left;
    public $right;
    public $label;

    public function __construct($feature = null, $threshold = null, $label = null)
    {
        $this->feature = $feature;
        $this->threshold = $threshold;
        $this->label = $label;
        $this->left = null;
        $this->right = null;
    }
    public function calculateBestThreshold($samples, $labels, $featureIndex)
    {
        $data = [];
        foreach ($samples as $i => $sample) {
            $data[] = [$sample[$featureIndex], $labels[$i]];
        }

        // Urutkan data berdasarkan nilai fitur
        usort($data, function ($a, $b) {
            return $a[0] <=> $b[0];
        });

        $bestThreshold = null;
        $bestGain = -INF;

        // Loop melalui setiap possible split point
        for ($i = 1; $i < count($data); $i++) {
            $currentThreshold = ($data[$i - 1][0] + $data[$i][0]) / 2;

            // Hitung informasi gain atau kriteria lain di sini
            $currentGain = calculateInformationGain($data, $currentThreshold);

            if ($currentGain > $bestGain) {
                $bestGain = $currentGain;
                $bestThreshold = $currentThreshold;
            }
        }

        //return $bestThreshold;

        $rootNode = buildTreeManually();

        return extractTreeToJSON($rootNode);
    }
}
function calculateInformationGain($data, $threshold)
{
    // Implementasi perhitungan informasi gain
    // Ini tergantung pada algoritma yang Anda gunakan
    return rand(0, 1); // Placeholder, ganti dengan perhitungan yang tepat
}
function buildTreeManually()
{
    $root = new TreeNode('Fitur1', 4.4);

    // Sub pohon kiri jika Fitur1 <= 4.4
    $root->left = new TreeNode('Fitur2', 4.5);
    $root->left->left = new TreeNode('Fitur3', 4.4);
    $root->left->left->left = new TreeNode(null, null, 'Tidak berprestasi');
    $root->left->left->right = new TreeNode(null, null, 'Berprestasi');
    $root->left->right = new TreeNode('Fitur4', 4.5);
    $root->left->right->left = new TreeNode(null, null, 'Berprestasi');
    $root->left->right->right = new TreeNode(null, null, 'Tidak berprestasi');

    // Sub pohon kanan jika Fitur1 > 4.4
    $root->right = new TreeNode('Fitur2', 4.6);
    $root->right->left = new TreeNode('Fitur5', 4.7);
    $root->right->left->left = new TreeNode(null, null, 'Berprestasi');
    $root->right->left->right = new TreeNode(null, null, 'Tidak berprestasi');
    $root->right->right = new TreeNode('Fitur3', 4.8);
    $root->right->right->left = new TreeNode(null, null, 'Tidak berprestasi');
    $root->right->right->right = new TreeNode(null, null, 'Berprestasi');

    return $root;
}

//$rootNode = buildTreeManually();
// Data sampel dan label (contoh data)


//$samples = [[1, 2], [3, 4], [5, 6], [7, 8]];
//$labels = ['a', 'b', 'a', 'b'];

//$rootNode = buildTreeManually($samples, $labels);

function extractTreeToJSON($node)
{
    if ($node === null) {
        return null;
    }

    $nodeData = [
        'name' => $node->feature ? "Feature: {$node->feature} | Threshold: {$node->threshold}" : $node->label,
        'children' => []
    ];

    if ($node->left !== null) {
        $nodeData['children'][] = extractTreeToJSON($node->left);
    }

    if ($node->right !== null) {
        $nodeData['children'][] = extractTreeToJSON($node->right);
    }

    return $nodeData;
}

// Fungsi untuk mengekstrak pohon menjadi format JSON untuk visualisasi

//$treeJSON = extractTreeToJSON($rootNode);

// Output JSON untuk digunakan di D3.js
//header('Content-Type: application/json');
//echo json_encode($treeJSON);
