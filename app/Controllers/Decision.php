<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Phpml\Classification\DecisionTree;
use Phpml\ModelManager;
use Phpml\Metric\Accuracy;

class Decision extends BaseController
{
    public function index()
    {
        $classifier = new DecisionTree();
        // Data training
        $samples = [[3, 7], [1, 5], [4, 9], [8, 6], [7, 3]];
        $labels = ['A', 'A', 'B', 'B', 'A'];
        $classifier->train($samples, $labels);
        $testSample = [1, 2];
        $predictedLabel = $classifier->predict($testSample);
        echo "Predicted label: " . $predictedLabel . PHP_EOL;
         //    $modelManager = new ModelManager();
        //      $modelManager->saveToFile($classifier, 'decision_tree_model.phpml');
         //      $modelManager->restoreFromFile('decision_tree_model.phpml');
         //      $predictedLabel2= $classifier->predict($testSample);
            //   dd($predictedLabel2);

        // Memprediksi hasil dari data uji
        $testSamples = [[1, 2],[1, 5]];
        $testLabels = ['A', 'B'];
        $predictedLabels = [];
        foreach ($testSamples as $sample) {
            $predictedLabels[] = $classifier->predict($sample);
        }

        // Menghitung akurasi
        $accuracy = Accuracy::score($testLabels, $predictedLabels);
        dd($accuracy);

        return view('layouts/index');
    }
}
