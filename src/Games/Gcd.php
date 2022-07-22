<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\wrongAnswer;
use function cli\line;
use function cli\prompt;

function gcd(string $name): bool
{
    $firstNum = rand(1, 10);
    $secondNum = rand(1, 10);
    line("Question: $firstNum $secondNum");
    $answer = prompt('Your answer: ', false, '');
    $correctAnswer = checkGcd($firstNum, $secondNum);

    if ($answer == $correctAnswer) {
        return true;
    }

    wrongAnswer($answer, $correctAnswer, $name);
    return false;
}

function checkGcd($n, $m)
{
    while (true) {
        if ($n == $m) {
            return $m;
        }
        if ($n > $m) {
            $n -= $m;
        } else {
            $m -= $n;
        }
    }
}
