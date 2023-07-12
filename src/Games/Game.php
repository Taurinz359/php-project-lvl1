<?php

namespace BrainGames\Games\Game;

use function cli\line;
use function cli\prompt;

/**
 * @return true|array<string,string>
 */

function brainEven(): true | array
{
    $randNum = rand(1, 10);
    line("Question: " . $randNum);

    $answer = strtolower(prompt('Your answer:'));
    $correctAnswer = $randNum % 2 === 0 ? 'yes' : 'no';

    if ($answer === $correctAnswer) {
        return true;
    }
    return ['answer' => $answer, 'correctAnswer' => $correctAnswer];
}
