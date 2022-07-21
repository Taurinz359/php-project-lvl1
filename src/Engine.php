<?php

namespace BrainGames\Engine;

use function BrainGames\Games\Calc\calc;
use function BrainGames\Games\Gcd\gcd;
use function cli\line;
use function cli\prompt;

function runCalcGame(): void
{
    run("calc");
}

function runGcdGame(): void
{
    run('gcd');
}

function run(string $game)
{
    $name = getName();

    question($game);
    $firstNum = rand(1, 10);
    $secondNum = rand(1, 10);

    $game = match ($game) {
        'calc' => fn() => calc($name, $firstNum, $secondNum),
        'gcd' => fn() => gcd($name, $firstNum, $secondNum)
    };

    for ($attempt = 0; $attempt < 3; $attempt++) {
        $answer = $game($name, $firstNum, $secondNum);
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
        case 'calc':
            line('What is the result of the expression ?');
            break;
        case 'gcd':
            line('Find the greatest common divisor of given numbers.');
            break;
    }
}

function wrongAnswer(string $answer, string $correctAnswer, string $name): void
{
    line("$answer is wrong answer ;(. Correct answer was '$correctAnswer' Let's try again, $name!");
}
