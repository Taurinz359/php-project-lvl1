<?php

namespace BrainGames\Engine;

use function BrainGames\Games\Calc\calc;
use function BrainGames\Games\Gcd\gcd;
use function BrainGames\Games\Prime\prime;
use function BrainGames\Games\Progression\progression;
use function BrainGames\Questions\writeQuestionCli;
use function cli\line;

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
    writeQuestionCli($game);

    for ($attempt = 0; $attempt < 3; $attempt++) {
        if (!callGame($game)) {
            return;
        }
        line('Correct');
    }
}

function callGame(string $game): bool
{
    return match ($game) {
        'gcd' => gcd(),
        'progression' => progression(),
        'prime' => prime(),
        default => calc()
    };
}

function wrongAnswer(string $answer, string $correctAnswer, string $name): void
{
    line("\"$answer\" is wrong answer ;(. Correct answer was '$correctAnswer' Let's try again, $name!");
}
