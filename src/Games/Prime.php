<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;

/**
 * @return array{'answer': string, "correctAnswer": string|int, "isCorrect": bool}
 */
function prime(): array
{
    $randomNum = rand(1, 100);
    line("Question: {$randomNum}");
    $answer = strtolower(prompt('Your answer: '));
    $correctAnswer = checkPrime($randomNum) == 1 ? 'yes' : 'no';

    return [
        'answer' => $answer,
        'correctAnswer' => $correctAnswer,
        'isCorrect' => $answer == $correctAnswer
    ];
}

function checkPrime(int $num): int
{
    if ($num == 1) {
        return 0;
    }
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            return 0;
        }
    }
    return 1;
}
