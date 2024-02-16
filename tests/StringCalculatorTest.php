<?php

use App\StringCalculator;

it('evaluates a empty string as 0', function () {
    $calculator = new StringCalculator();

    expect($calculator->add(''))->toBe(0);
});
