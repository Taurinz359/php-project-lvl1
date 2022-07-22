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
    $correctAnswer = gmp_prob_prime($randomNum) == 2 ? 'yes' : 'no';

    if ($answer == $correctAnswer) {
        return true;
    }

    wrongAnswer($answer, $correctAnswer, $name);
    return false;
}
