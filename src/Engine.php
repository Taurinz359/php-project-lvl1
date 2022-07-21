<?php

namespace BrainGames\Engine;

use function BrainGames\Games\Calc\calc;
use function BrainGames\Games\Gcd\gcd;
use function BrainGames\Games\Progression\progression;
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

function runProgressionGame(): void
{
    run('progression');
}

function run(string $game)
{
    $name = getName();

    question($game);

    $game = match ($game) {
        'calc' => fn() => calc($name),
        'gcd' => fn() => gcd($name),
        'progression' => fn() => progression($name)
    };

    for ($attempt = 0; $attempt < 3; $attempt++) {
        $firstNum = rand(1, 100);
        $secondNum = rand(1, 100);

        $answer = $game($name, $firstNum, $secondNum);
        if (!$answer) {
            return;
        }
        line('Correct');
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
