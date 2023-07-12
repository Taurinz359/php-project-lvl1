<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\showLossGameMessage;
use function cli\line;
use function cli\prompt;

function progression(string $name): bool
{
    [$firstNum, $maxProgression, $randPlus] = getRandNumsForGame();
    $stop = rand(0, $maxProgression - 1);

    $question = '';
    $correctAnswer = 0;

    for ($i = 0; $i < $maxProgression; $i++) {
        $firstNum += $randPlus;
        if ($i == $stop) {
            $question .= '.. ';
            $correctAnswer = $firstNum;
        } else {
            $question .= "$firstNum ";
        }
    }

    line("Question: $question");
    $answer = prompt('Your answer: ');

    if ($answer == $correctAnswer) {
        return true;
    }

    showLossGameMessage($answer, (string)$correctAnswer, $name);
    return false;
}

/**
 * @return array<int>
 */
function getRandNumsForGame(): array
{
    return [rand(1, 100), rand(5, 10), rand(1, 10)];
}
