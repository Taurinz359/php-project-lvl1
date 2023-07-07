<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\showLossGameMessage;
use function cli\line;
use function cli\prompt;

function gcd(string $name): bool
{
    $firstNum = rand(1, 10);
    $secondNum = rand(1, 10);
    line("Question: $firstNum $secondNum");
    $answer = prompt('Your answer: ');
    $correctAnswer = checkGcd($firstNum, $secondNum);

    if ($answer == $correctAnswer) {
        return true;
    }

    showLossGameMessage($answer, (string)$correctAnswer, $name);
    return false;
}

function checkGcd(int $n, int $m): int
{
    while (true) {
        if ($n == $m) {
            return $m;
        }
        if ($n > $m) {
            $n -= $m;
        } else {
            $m -= $n;
        }
    }
}

function showQuestion(): void
{
    line('Find the greatest common divisor of given numbers.');
}
