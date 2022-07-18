<?php

namespace BrainGames\Game;

use function cli\line;
use function cli\prompt;

function run(): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May i have your name? ', false, '');
    line("Hello, {$name}");

    for ($attempt = 0; $attempt < 3; $attempt++) {
        line("Answer \"yes\" if the number is even, otherwise answer \"no\"");
        $randNum = rand(1, 10);

        line("Question: " . $randNum);
        $answer = strtolower(prompt('Your answer:', false, ''));

        if ($answer == 'yes' && $randNum % 2 == 0 || $answer == 'no' && $randNum % 2 == 1) {
            line('Correct');
        } else {
            line("'yes' is wrong answer ;(. Correct answer was 'no' Let's try again, $name!");
            return;
        }
    }

    line("Congratulations, $name!");
}
