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

        return (int) array_sum($numbers);
    }
}
