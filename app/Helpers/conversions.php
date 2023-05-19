<?php

if (!function_exists('displayRouteName')) {
    function displayRouteName(string $routeName)
    {
        $explodeRouteName = explode('.', $routeName);

        if ($explodeRouteName[1] == 'index') {
            return $explodeRouteName[0];
        } else {
            return $explodeRouteName[1] . " " . $explodeRouteName[0];
        }
    }
}
