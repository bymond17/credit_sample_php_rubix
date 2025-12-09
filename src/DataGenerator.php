<?php
namespace Src;

class DataGenerator
{
    public static function generate($count = 3000)
    {
        $samples = [];
        $labels = [];
        for ($i = 0; $i < $count; $i++) {
            $age = rand(20, 65);
            $income = rand(2000, 20000);
            $loan = rand(100, 7000);
            $approved = ($income >= $loan * 2) ? '1' : '0';
            $samples[] = [$age, $income, $loan];
            $labels[] = $approved;
        }
        return [$samples, $labels];
    }
}