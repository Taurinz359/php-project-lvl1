<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;

/**
 * @return true|array<string,string|int>
 */

function progression(): bool|array
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

    return ['answer' => $answer, 'correctAnswer' => $correctAnswer];
}

/**
 * @return array<int>
 */
function getRandNumsForGame(): array
{
    return [rand(1, 100), rand(5, 10), rand(1, 10)];
}
