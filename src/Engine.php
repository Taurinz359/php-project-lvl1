<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function runCalcGame(): void
{
    run('BrainGames\Games\Calc\calc', 'What is the result of the expression ?');
}

function runGcdGame(): void
{
    run('BrainGames\Games\Gcd\gcd', 'Find the greatest common divisor of given numbers.');
}

function runProgressionGame(): void
{
    run(
        'BrainGames\Games\Progression\progression',
        'What number is missing in the progression?'
    );
}

function runPrimeGame(): void
{
    run(
        'BrainGames\Games\Prime\prime',
        "Answer \"yes\" if given number is prime. Otherwise answer \"no\"."
    );
}

function runBrainEven(): void
{
    run(
        'BrainGames\Games\Game\brainEven',
        "Answer \"yes\" if the number is even, otherwise answer \"no\"."
    );
}


function run(callable $launchGameWithCheck = null, string $question = null): void
{
    if ($launchGameWithCheck === null || $question === null) {
        throw new \Exception('fail to start game');
    }

    $name = getName();
    line($question);

    for ($attempt = 0; $attempt < 3; $attempt++) {
        if (!$launchGameWithCheck($name)) {
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

function showLossGameMessage(string $answer, string $correctAnswer, string $name): void
{
    line("\"$answer\" is wrong answer ;(. Correct answer was '$correctAnswer' Let's try again, $name!");
}
