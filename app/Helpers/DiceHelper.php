<?php
function rollDice(int $qty=1, int $sides=6){
    $result = array();
    for ($i = 1; $i <= $qty; $i++) {
        array_push($result,rand(1, $sides));
    }
    return $result;
}