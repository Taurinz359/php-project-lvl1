<?php

namespace BrainGames\Games\Game;

use function BrainGames\Engine\showLossGameMessage;
use function cli\line;
use function cli\prompt;

function brainEven(string $name): bool
{
    $randNum = rand(1, 10);
    line("Question: " . $randNum);

    $answer = strtolower(prompt('Your answer:'));
    $correctAnswer = $randNum % 2 === 0 ? 'yes' : 'no';

    if ($answer != $correctAnswer) {
        showLossGameMessage($answer, $correctAnswer, $name);
        return false;
    }
    return true;
}
