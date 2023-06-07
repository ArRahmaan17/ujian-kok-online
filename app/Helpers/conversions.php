<?php

use Carbon\Carbon;

if (!function_exists('displayRouteName')) {
    function displayRouteName(string $routeName)
    {
        $explodeRouteName = explode('.', $routeName);
        if (isset($explodeRouteName[1])) {
            if ('index' == $explodeRouteName[1]) {
                return $explodeRouteName[0];
            } else {
                return $explodeRouteName[1] . ' ' . $explodeRouteName[0];
            }
        } else {
            return $explodeRouteName[0];
        }
    }
}

function convertDateTimeToDiff(string $date): string
{
    return Carbon::parse($date)->add(-7, 'hours')->diffForHumans();
}
