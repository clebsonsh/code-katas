<?php

namespace App;

class RomanNumerals
{
    const NUMERALS = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I',
    ];

    public function convert(int $number): string | bool
    {
        if ($number <= 0 || $number >= 4000) {
            return false;
        }

        $result = '';

        foreach (self::NUMERALS as $arabic => $numeral) {
            while ($number >= $arabic) {
                $result .= $numeral;

                $number -= $arabic;
            }
        }

        return $result;
    }
}
