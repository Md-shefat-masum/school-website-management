<?php

use Carbon\Carbon;

function set_token_coockie($token)
{
    $from = Carbon::now();
    $to = Carbon::now()->addMinutes(10);
    $min = $to->diffInMinutes($from);
    $token_c = cookie("AXRF-TOKEN", $token, $min, '/', null, null, false, true);
    return $token_c;
}


function setting($key, $multiple = false)
{
    try {
        if (!$multiple) {
            $vlaue = $GLOBALS['app_settings']->where("setting_title", $key)->first();
            if ($vlaue) {
                return $vlaue->value;
            } else {
                return '';
            }
        } else {
            $vlaues = $GLOBALS['app_settings']->where("setting_title", $key)->all();
            return $vlaues;
        }
    } catch (\Throwable $th) {
        var_dump($th->getMessage());
    }
}
