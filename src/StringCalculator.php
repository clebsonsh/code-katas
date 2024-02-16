<?php

namespace App;

class StringCalculator
{
    public function add(string $numbers): int
    {
        $delimeter = ',|\n';

        if (!$numbers) {
            return 0;
        }

        if (preg_match('/^\/\/(.)\n/', $numbers, $matches)) {
            $delimeter = $matches[1];
            $numbers = str_replace($matches[0], '', $numbers);
        }

        $numbers = preg_split("/$delimeter/", $numbers);

        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new \Exception('Negatives not allowed ' . $number);
            }
        }

        $numbers = array_filter($numbers, function ($number) {
            return $number <= 1000;
        });

        return (int) array_sum($numbers);
    }
}
