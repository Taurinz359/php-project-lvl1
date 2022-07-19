<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function run(string $game)
{
    $name = getName();

    question($game);

    for ($attempt = 0; $attempt < 3; $attempt++) {
        $answer = match ($game) {
            'even' => even($name),
            'calc' => calc($name)
        };

        if ($answer) {
            line('Correct');
        } elseif (!$answer) {
            return;
        }
    }

    line("Congratulations, $name!");
}

function getName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May i have your name? ', false, '');
    line("Hello, $name");
    return $name;
}

function question(string $game): void
{
    switch ($game) {
        case 'even':
            line("Answer \"yes\" if the number is even, otherwise answer \"no\"");
            break;
        case 'calc':
            line('What is the result of the expression ?');
            break;
    }
}

function even($name): bool
{
    $randNum = rand(1, 10);

    line("Question: " . $randNum);

    $answer = strtolower(prompt('Your answer: ', false, ''));

    $correctAnswer = $randNum % 2 === 0 ? 'yes' : 'no';
    if ($answer === $correctAnswer) {
        return true;
    }

    line("$answer is wrong answer ;(. Correct answer was '$correctAnswer' Let's try again, $name!");
    return false;
}

function calc($name): bool
{
    $operators = ['+', '-', '*'];

    $firstNum = rand(1, 10);
    $secondNum = rand(1, 10);
    $operation = $operators[rand(0, 2)];

    line("Question: $firstNum $operation $secondNum");

    $answer = strtolower(prompt('Your answer: ', false, ''));

    $correctAnswer = match ($operation) {
        '+' => $firstNum + $secondNum,
        '-' => $firstNum - $secondNum,
        '*' => $firstNum * $secondNum
    };

    if ($answer == $correctAnswer) {
        return true;
    }

    line("$answer is wrong answer ;(. Correct answer was '$correctAnswer' Let's try again, $name!");
    return false;
}