<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\wrongAnswer;
use function cli\line;
use function cli\prompt;

function prime($name): bool
{
    $randomNum = rand(1, 100);
    line("Question: {$randomNum}");
    $answer = strtolower(prompt('Your answer: ', false, ''));
    $correctAnswer = checkPrime($randomNum) == 1 ? 'yes' : 'no';

    if ($answer == $correctAnswer) {
        return true;
    }

    wrongAnswer($answer, $correctAnswer, $name);
    return false;
}

function checkPrime($num)
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
