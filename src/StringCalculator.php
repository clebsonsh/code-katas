<?php

namespace App;

class StringCalculator
{
    public function add(string $numbers): int
    {
        if (!$numbers) {
            return 0;
        }

        $numbers = preg_split('/,|\n/', $numbers);

        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new \Exception('Negatives not allowed ' . $number);
            }
        }

        return (int) array_sum($numbers);
    }
}
