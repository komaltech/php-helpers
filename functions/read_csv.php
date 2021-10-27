<?php

function readCsv($filename = '', $delimeter = ',')
{
    if (!file_exists($filename) || !is_readable($filename))
        return false;

    $header = array();
    $data = array();
    if (($handle = fopen($filename, 'r')) !== false) {
        while (($row = fgetcsv($handle, 1000, $delimeter)) !== false) {
            if (!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }

    return $data;
}
