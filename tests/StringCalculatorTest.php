<?php

use App\StringCalculator;

use Exception;

it('evaluates a empty string as 0', function () {
    $calculator = new StringCalculator();

    expect($calculator->add(''))->toBe(0);
});

it('finds the sum of one number', function () {
    $calculator = new StringCalculator();

    expect($calculator->add('5'))->toBe(5);
});

it('finds the sum of two numbers', function () {
    $calculator = new StringCalculator();

    expect($calculator->add('5,5'))->toBe(10);
});

it('finds the sum of any amount of numbers', function (string $numbers, int $sum) {
    $calculator = new StringCalculator();

    expect($calculator->add($numbers))->toBe($sum);
})->with('numbers');

dataset('numbers', [
    ['1,2,3,4,5,6,7,8,9,10', 55],
    ['1,2,3,4,5,6,7,8,9,10,11,12,13,14,15', 120],
    ['1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20', 210],
    ['1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25', 325],
]);

it('accepts new lines as valid delimiters', function () {
    $calculator = new StringCalculator();

    expect($calculator->add("5\n5"))->toBe(10);
});

it('negative numbers throw an exception', function () {
    $calculator = new StringCalculator();

    $calculator->add('5,-5');
})->throws(Exception::class, 'Negatives not allowed -5');

it('numbers bigger than 1000 should be ignored', function () {
    $calculator = new StringCalculator();

    expect($calculator->add('5,1001'))->toBe(5);
});

it('it supports custom delimiters', function () {
    $calculator = new StringCalculator();

    expect($calculator->add("//:\n5:5"))->toBe(10);
});
