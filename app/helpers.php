<?php

function random_str($length, $useUpper = true, $useNumbers = true)
{
    $numbers = '0123456789';
    $lower = 'abcdefghijklmnopqrstuvwxyz';
    $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $characters = $lower;
    if($useUpper)
        $characters .= $upper;

    if($useNumbers)
        $characters .= $numbers;

    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}