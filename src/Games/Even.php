<?php

namespace BrainGames\Games\Game;

use function cli\line;
use function cli\prompt;

/**
 * @return array{'answer': string, "correctAnswer": string|int, "isCorrect": bool}
 */
function brainEven(): array
{
    $randNum = rand(1, 10);
    line("Question: " . $randNum);

    $answer = strtolower(prompt('Your answer:'));
    $correctAnswer = $randNum % 2 === 0 ? 'yes' : 'no';

    return [
        'answer' => $answer,
        'correctAnswer' => $correctAnswer,
        'isCorrect' => $answer == $correctAnswer,
    ];
}
