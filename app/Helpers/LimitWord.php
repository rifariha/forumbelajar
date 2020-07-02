<?php
function limit_word($string, $word_limit)
{
    $words = explode(" ", $string);
    $new = implode(" ", array_splice($words, 0, $word_limit));

    return $new;
}
