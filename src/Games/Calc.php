<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\wrongAnswer;
use function cli\line;
use function cli\prompt;

function calc(string $name): bool
{
    $firstNum = rand(1, 10);
    $secondNum = rand(1, 10);
    $operators = ['+', '-', '*'];

    $operation = $operators[rand(0, 2)];

    line("Question: $firstNum $operation $secondNum");

    $answer = prompt('Your answer: ', 'no', '');

    $correctAnswer = match ($operation) {
        '+' => $firstNum + $secondNum,
        '-' => $firstNum - $secondNum,
        '*' => $firstNum * $secondNum
    };

    if ($answer == $correctAnswer) {
        return true;
    }

    wrongAnswer($answer, $correctAnswer, $name);
    return false;
}
