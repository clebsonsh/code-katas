<?php

use App\PrimeFactors;

it('returns a array of prime factors', function (int $number, array $expected) {
    expect((new PrimeFactors())->generate($number))->toBe($expected);
})->with('factors');

dataset('factors', [
    [1, [1]],
    [2, [2]],
    [3, [3]],
    [4, [2, 2]],
    [5, [5]],
    [6, [2, 3]],
    [7, [7]],
    [8, [2, 2, 2]],
    [9, [3, 3]],
    [100, [2, 2, 5, 5]],
    [999, [3, 3, 3, 37]],
    [1000, [2, 2, 2, 5, 5, 5]],
]);
