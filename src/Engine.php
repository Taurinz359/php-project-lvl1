<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function run(string $game)
{
    $name = getName();

    question($game);

    $game = match ($game) {
        'even' => fn() => even($name),
        'calc' => fn() => calc($name),
        'gcd' => fn() => gcd($name)
    };

    for ($attempt = 0; $attempt < 3; $attempt++) {
        $answer = $game();
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
        case 'gcd':
            line('Find the greatest common divisor of given numbers.');
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

    wrongAnswer($answer, $correctAnswer, $name);

    return false;
}

function calc($name): bool
{
    $operators = ['+', '-', '*'];

    [$firstNum, $secondNum] = getTwoRandNum();
    $operation = $operators[rand(0, 2)];

    line("Question: $firstNum $operation $secondNum");

    $answer = prompt('Your answer: ', false, '');

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

function getTwoRandNum(): array
{
    return [rand(1, 10), rand(1, 10)];
}

function wrongAnswer(string $answer, string $correctAnswer, string $name): void
{
    line("$answer is wrong answer ;(. Correct answer was '$correctAnswer' Let's try again, $name!");
}

function gcd(string $name): bool
{
    [$firstNum, $secondNum] = getTwoRandNum();
    line("Question: $firstNum $secondNum");
    $answer = prompt('Your answer: ', false, '');
    $correctAnswer = gmp_gcd($firstNum, $secondNum);

    if ($answer == $correctAnswer) {
        return true;
    }

    wrongAnswer($answer, $correctAnswer, $name);
    return false;
}
