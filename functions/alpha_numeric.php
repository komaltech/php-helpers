<?php

function checkAlphaNumeric($input)
{
    $result = true;

    if(!preg_match('/^[a-zA-Z]+[a-zA-Z0-9._]+$/', $input)) {
        $result = false;
    }

    return $result;
}