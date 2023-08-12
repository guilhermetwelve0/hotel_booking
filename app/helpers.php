<?php

function ordinal($number) {
    if ($number % 100 >= 11 && $number % 100 <= 13) {
        return $number . 'th';
    }

    $suffix = 'th';
    switch ($number % 10) {
        case 1:
            $suffix = 'st';
            break;
        case 2:
            $suffix = 'nd';
            break;
        case 3:
            $suffix = 'rd';
            break;
    }

    return $number . $suffix;
}

function leadZero($num){
    return str_pad($num, 2, '0', STR_PAD_LEFT);
}

function dateFormat($date, $format){
    return \Carbon\Carbon::parse($date)->format($format);
}

