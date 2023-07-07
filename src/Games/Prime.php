<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\showLossGameMessage;
use function cli\line;
use function cli\prompt;

function prime(string $name): bool
{
    $randomNum = rand(1, 100);
    line("Question: {$randomNum}");
    $answer = strtolower(prompt('Your answer: '));
    $correctAnswer = checkPrime($randomNum) == 1 ? 'yes' : 'no';

    if ($answer == $correctAnswer) {
        return true;
    }

    showLossGameMessage($answer, $correctAnswer, $name);
    return false;
}

function checkPrime(int $num): int
{
    if ($num == 1) {
        return 0;
    }
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            return 0;
        }
    }
    return 1;
}

function showQuestion(): void
{
    line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");
}
