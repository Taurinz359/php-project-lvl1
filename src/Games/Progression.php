<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;

/**
 * @return array{'answer': string, "correctAnswer": string|int, "isCorrect": bool}
 */
function progression(): array
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

    return [
        'answer' => $answer,
        'correctAnswer' => $correctAnswer,
        'isCorrect' => $answer == $correctAnswer,
    ];
}

/**
 * @return array<int>
 */
function getRandNumsForGame(): array
{
    return [rand(1, 100), rand(5, 10), rand(1, 10)];
}
