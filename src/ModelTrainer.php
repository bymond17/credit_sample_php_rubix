<?php
namespace Src;

use Rubix\ML\Classifiers\MLPClassifier;
use Rubix\ML\NeuralNet\Layers\Dense;
use Rubix\ML\NeuralNet\Layers\Activation;
use Rubix\ML\NeuralNet\ActivationFunctions\ReLU;
use Rubix\ML\NeuralNet\ActivationFunctions\Tanh;
use Rubix\ML\NeuralNet\Layers\Dropout;
use Rubix\ML\NeuralNet\Layers\BatchNorm;
use Rubix\ML\Datasets\Labeled;
use Src\DataGenerator;

class ModelTrainer
{
    public static function trainAndSave($modelPath = __DIR__ . '/../models/credit_model.rbx')
    {
        list($samples, $labels) = DataGenerator::generate();
        $dataset = new Labeled($samples, $labels);

        $model = new MLPClassifier([
            new Dense(32),                // 은닉층 1
            new Activation(new ReLU()),
            new BatchNorm(),
            new Dropout(0.3),
            new Dense(16),                // 은닉층 2
            new Activation(new ReLU()),
            new BatchNorm(),
            new Dropout(0.2),
            new Dense(8),                 // 은닉층 3
            new Activation(new Tanh()),
            new Dense(1),                 // 출력층
            new Activation(new ReLU()),   // Rubix ML은 sigmoid 대신 relu/tanh 등 사용
        ], 100, 0.005, 2); // epochs, learning_rate, batch_size

        $model->train($dataset);
        $model->saveToFile($modelPath);
    }

    public static function load($modelPath = __DIR__ . '/../models/credit_model.rbx')
    {
        return MLPClassifier::loadFromFile($modelPath);
    }
}