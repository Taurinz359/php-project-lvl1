<?php

namespace BrainGames\Engine;

use function BrainGames\Games\Calc\calc;
use function BrainGames\Games\Gcd\gcd;
use function BrainGames\Games\Prime\prime;
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

function runPrimeGame(): void
{
    run('prime');
}

function run(string $game): void
{
    $name = getName();

    question($game);

    for ($attempt = 0; $attempt < 3; $attempt++) {
        if (!callGame($game, $name)) {
            return;
        }
        line('Correct');
    }

    line("Congratulations, $name!");
}

function getName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?:');
    line("Hello, %s!", $name);
    return $name;
}

function callGame(string $game, string $name): bool
{
    return match ($game) {
        'calc' => calc($name),
        'gcd' => gcd($name),
        'progression' => progression($name),
        'prime' => prime($name),
        default => calc($name)
    };
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
        case 'progression':
            line('What number is missing in the progression?');
            break;
        case 'prime':
            line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");
            break;
    }
}

function wrongAnswer(string $answer, string $correctAnswer, string $name): void
{
    line("\"$answer\" is wrong answer ;(. Correct answer was '$correctAnswer' Let's try again, $name!");
}
