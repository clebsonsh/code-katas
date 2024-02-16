<?php

namespace App;

use Exception;

class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;

    protected string $delimeter = ',|\n';

    public function add(string $numbers): int
    {
        $numbers = $this->parseString($numbers);

        $this->disallowNegatives($numbers);;

        return (int) array_sum(
            $this->ignoreGreaterThan1000($numbers)
        );
    }

    protected function parseString(string $numbers): array
    {
        $customeDelimeter = '^\/\/(.)\n';

        if (preg_match("/$customeDelimeter/", $numbers, $matches)) {
            $this->delimeter = $matches[1];
            $numbers = str_replace($matches[0], '', $numbers);
        }

        return preg_split("/{$this->delimeter}/", $numbers);
    }

    protected function disallowNegatives(array $numbers): void
    {
        array_walk($numbers, function ($number) {
            if ((int) $number < 0) {
                throw new Exception('Negatives not allowed ' . $number);
            }
        });
    }

    protected function ignoreGreaterThan1000(array $numbers): array
    {
        return array_filter($numbers, fn ($number) => $number <= self::MAX_NUMBER_ALLOWED);
    }
}
