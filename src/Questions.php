<?php

namespace BrainGames\Questions;

use function cli\line;
use function cli\prompt;

function getName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?:');
    line("Hello, %s!", $name);
    return $name;
}

function writeQuestionCli(string $game): void
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

function showWinMessage(string $name): void
{
    line("Congratulations, $name!");
}
