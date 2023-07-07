<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function runCalcGame(): void
{
    run('BrainGames\Games\Calc\calc', 'BrainGames\Games\Calc\showQuestion');
}

function runGcdGame(): void
{
    run('BrainGames\Games\Gcd\gcd', 'BrainGames\Games\Gcd\showQuestion');
}

function runProgressionGame(): void
{
    run('BrainGames\Games\Progression\progression', 'BrainGames\Games\Progression\showQuestion');
}

function runPrimeGame(): void
{
    run('BrainGames\Games\Prime\prime', 'BrainGames\Games\Prime\showQuestion');
}

function run(string $game = null, string $showQuestion = null): void
{
    if ($game === null || $showQuestion === null) {
        return;
    }

    $name = getName();
    $showQuestion();

    for ($attempt = 0; $attempt < 3; $attempt++) {
        if (!$game($name)) {
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
