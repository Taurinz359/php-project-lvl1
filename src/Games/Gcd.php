<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function cli\prompt;

/**
 * @return true|array<string,string|int>
 */
function gcd(): true|array
{
    $firstNum = rand(1, 10);
    $secondNum = rand(1, 10);
    line("Question: $firstNum $secondNum");
    $answer = prompt('Your answer: ');
    $correctAnswer = checkGcd($firstNum, $secondNum);

    if ($answer == $correctAnswer) {
        return true;
    }

    return ['answer' => $answer, 'correctAnswer' => $correctAnswer];
}

function checkGcd(int $n, int $m): int
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
