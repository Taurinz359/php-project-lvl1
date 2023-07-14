<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function cli\prompt;

/**
 * @return array{'answer': string, "correctAnswer": string|int, "isCorrect": bool}
 */
function gcd(): array
{
    $firstNum = rand(1, 10);
    $secondNum = rand(1, 10);
    line("Question: $firstNum $secondNum");
    $answer = prompt('Your answer: ');
    $correctAnswer = checkGcd($firstNum, $secondNum);

    return [
        'answer' => $answer,
        'correctAnswer' => $correctAnswer,
        'isCorrect' => $answer == $correctAnswer,
    ];
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
