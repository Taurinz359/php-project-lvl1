<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\wrongAnswer;
use function cli\line;
use function cli\prompt;

function gcd(string $name, int $firstNum, int $secondNum): bool
{
    line("Question: $firstNum $secondNum");
    $answer = prompt('Your answer: ', false, '');
    $correctAnswer = gmp_gcd($firstNum, $secondNum);

    if ($answer == $correctAnswer) {
        return true;
    }

    wrongAnswer($answer, $correctAnswer, $name);
    return false;
}
