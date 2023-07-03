<?php

namespace BrainGames\Games\Game;

use function cli\line;
use function cli\prompt;

function run(): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?:');
    line("Hello, %s!", $name);
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");

    for ($attempt = 0; $attempt < 3; $attempt++) {
        $randNum = rand(1, 10);
        line("Question: " . $randNum);

        $answer = strtolower(prompt('Your answer:'));
        $correctAnswer = $randNum % 2 === 0 ? 'yes' : 'no';

        if ($answer != $correctAnswer) {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer' Let's try again, $name!");
            return;
        }

        line('Correct');
    }

    line("Congratulations, $name!");
}
