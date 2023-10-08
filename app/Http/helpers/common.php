<?php

use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\support\Str;

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
            $value = $GLOBALS['app_settings']->where("title", $key)->first();
            if ($value) {
                return $value->value;
            } else {
                return '';
            }
        } else {
            $value = $GLOBALS['app_settings']->where("title", $key)->all();
            return $value;
        }
    } catch (\Throwable $th) {
        var_dump($th->getMessage());
    }
}

/**
 ```js
    upload(
    request()->file('file'), // single file source
        "uploads/banners", // only folder name
        400,
        300,
        "banner1", // file name without extension
    )
 */
function upload($source, $path, $width = null, $height = null, $file_name = null)
{
    $image = Image::make($source);
    // dd($source->getClientOriginalExtension(), $source->getClientOriginalName());
    if (!$path) {
        $path = public_path('uploads');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    } else {
        if (!file_exists(public_path($path))) {
            mkdir(public_path($path), 0777, true);
        }
    }

    if (!$file_name) {
        $file_name = Carbon::now()->toDateTimeString();
        $file_name = Str::slug($file_name);
        $file_name .= "." . $source->getClientOriginalExtension();
    } else {
        $file_name = Str::slug($file_name);
    }

    if ($width || $height) {
        $image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
    }

    $full_name = $path . '/' . $file_name;
    $image->save(public_path($full_name));

    return $full_name;
}
