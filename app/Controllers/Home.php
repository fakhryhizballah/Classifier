<?php

namespace App\Controllers;

use Phpml\Classification\DecisionTree;
use Phpml\Metric\Accuracy;
use Phpml\Classification\KNearestNeighbors;
use Phpml\ModelManager;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Input Data | SPN Polda Kalbar',
        ];

        return view('input', $data);
    }
    public function inputData(): string
    {
        $data = [
            'title' => 'Input Data Sampel | SPN Polda Kalbar',
        ];

        return view('dataSampel', $data);
    }

    public function predict(): string
    {
        $data = [
            'title' => 'Prediksi Decision Tree | SPN Polda Kalbar',
        ];
        return view('predict', $data);
    }
    public function predictNb(): string
    {
        $data = [
            'title' => 'Prediksi Naive Bayes | SPN Polda Kalbar',
        ];
        return view('predictNb', $data);
    }
    public function comparison(): string
    {
        $data = [
            'title' => 'Prediksi Naive Bayes | SPN Polda Kalbar',
        ];
        return view('comparison', $data);
    }

}
