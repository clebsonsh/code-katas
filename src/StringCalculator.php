<?php

namespace App;

class StringCalculator
{
    public function add(string $numbers): int
    {
        if (!$numbers) {
            return 0;
        }

        return (int) $numbers;
    }
}
