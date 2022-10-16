<?php

/**
 * @param int $number
 * @return array
 */
function atmAlgorithm(int $number): array
{
    $notes = [50, 10, 5, 1];
    $result = [];

    foreach ($notes as $note) {
        $div = (int) floor($number / $note);

        if ($div > 0) {
            $number = $number % $note;
            $result[] = ['note_value' => $note, 'number_of_note' => $div];
        }

        if ($number == 0) {
            break;
        }
    }

    return $result;
}

/**
 * @param string $word
 * @return bool
 */
function findGoolge(string $word): bool
{
    return (bool) preg_match('/^(g|G)(o|O|0|(\(\))|(\[])|(<>)){2,2}(g|G)(l|L|I|i)(e|E|3)$/', $word);
}

/**
 * @param array $arr
 * @return float|int
 */
function calculateAbsoluteDifference(array $arr)
{
    $length = count($arr);
    $res = 0;

    for ($i = 0; $i < $length; $i++) {
        $res = $res + $arr[$i][$i] - $arr[$i][$length - 1 - $i];
    }

    return abs($res);
}
