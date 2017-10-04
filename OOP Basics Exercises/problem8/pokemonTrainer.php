<?php

include 'Trainer.php';
include 'Pokemon.php';

$trainers = [];
$appears = [];
while(true) {
    $input = trim(fgets(STDIN));
    if ($input == 'Tournament') {
        break;
    }

    $arr = explode(' ', $input);
    $pokemon = new Pokemon($arr[1], $arr[2], intval($arr[3]));
    $trainer = new Trainer($arr[0], $pokemon);
    if (!array_key_exists($arr[0], $trainers)) {
        $trainers[$arr[0]] = $trainer;
        $trainers[$arr[0]]->appears = 1;
    } else {
        $trainers[$arr[0]]->appears++;
        $trainers[$arr[0]]->pokemons[] = $pokemon;
    }

}

while (true) {
    $input = trim(fgets(STDIN));
    if ($input == 'End') {
        break;
    }



    foreach ($trainers as $trainer) {
        $hasElement = false;
        foreach ($trainer->pokemons as $pokemon) {
            if ($pokemon->element == $input) {
                $hasElement = true;
            }
        }

        if($hasElement) {
            $trainer->badges++;
        } else {
            foreach ($trainer->pokemons as $pokemon) {
                $pokemon->health -= 10;
            }
            $trainer->cleanPokemons();
        }
    }
}

usort($trainers, function($b, $a) {
    if ($a->badges == $b->badges) {
        if ($b->appears == $a->appears) {
            return 0;
        } elseif ($b->appears < $a->appears) {
            return -1;
        } else {
            return 1;
        }
    } elseif($a->badges < $b->badges) {
        return -1;
    } else {
        return 1;
    }
});

foreach ($trainers as $trainer) {
    echo $trainer;
}

