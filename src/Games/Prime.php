<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;

/**
 * @return true|array<string,string>
 */

function prime(): true|array
{
    $randomNum = rand(1, 100);
    line("Question: {$randomNum}");
    $answer = strtolower(prompt('Your answer: '));
    $correctAnswer = checkPrime($randomNum) == 1 ? 'yes' : 'no';

    if ($answer == $correctAnswer) {
        return true;
    }

    return ['answer' => $answer, 'correctAnswer' => $correctAnswer];
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
