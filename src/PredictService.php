<?php
namespace Src;

use Rubix\ML\Datasets\Unlabeled;
use Src\ModelTrainer;

class PredictService
{
    protected $model;

    public function __construct()
    {
        $this->model = ModelTrainer::load();
    }

    public function predict(array $input)
    {
        $test = new Unlabeled([$input]);
        $predictions = $this->model->predict($test);
        return $predictions[0];
    }
}