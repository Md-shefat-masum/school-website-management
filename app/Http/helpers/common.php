<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
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
    // dd($source->getClientMimeType(), $source->getClientOriginalExtension(), $source->getClientOriginalName());
    $mime_type = $source->getClientMimeType();

    $types = ["image/png","image/jpg","image/jpeg"];

    if (!array_search($mime_type, $types)) {
        $path = Storage::putFile($path, $source);
        return $path;
    }

    if (array_search($mime_type, $types)) {
        $image = Image::make($source);
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
            $image->fit($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        $full_name = $path . '/' . $file_name;
        $image->save(public_path($full_name));
        return $full_name;
    }
}

function numercToAlphabet($number)
{

    //A function to convert numbers into Indian readable words with Cores, Lakhs and Thousands.
    $words = array(
        '0' => '', '1' => 'one', '2' => 'two', '3' => 'three', '4' => 'four', '5' => 'five',
        '6' => 'six', '7' => 'seven', '8' => 'eight', '9' => 'nine', '10' => 'ten',
        '11' => 'eleven', '12' => 'twelve', '13' => 'thirteen', '14' => 'fouteen', '15' => 'fifteen',
        '16' => 'sixteen', '17' => 'seventeen', '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty',
        '30' => 'thirty', '40' => 'fourty', '50' => 'fifty', '60' => 'sixty', '70' => 'seventy',
        '80' => 'eighty', '90' => 'ninty'
    );

    //First find the length of the number
    $number_length = strlen($number);
    //Initialize an empty array
    $number_array = array(0, 0, 0, 0, 0, 0, 0, 0, 0);
    $received_number_array = array();

    //Store all received numbers into an array
    for ($i = 0; $i < $number_length; $i++) {
        $received_number_array[$i] = substr($number, $i, 1);
    }

    //Populate the empty array with the numbers received - most critical operation
    for ($i = 9 - $number_length, $j = 0; $i < 9; $i++, $j++) {
        $number_array[$i] = $received_number_array[$j];
    }

    $number_to_words_string = "";
    //Finding out whether it is teen ? and then multiply by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
    for ($i = 0, $j = 1; $i < 9; $i++, $j++) {
        //"01,23,45,6,78"
        //"00,10,06,7,42"
        //"00,01,90,0,00"
        if ($i == 0 || $i == 2 || $i == 4 || $i == 7) {
            if ($number_array[$j] == 0 || $number_array[$i] == "1") {
                $number_array[$j] = intval($number_array[$i]) * 10 + $number_array[$j];
                $number_array[$i] = 0;
            }
        }
    }

    $value = "";
    for ($i = 0; $i < 9; $i++) {
        if ($i == 0 || $i == 2 || $i == 4 || $i == 7) {
            $value = $number_array[$i] * 10;
        } else {
            $value = $number_array[$i];
        }
        if ($value != 0) {
            $number_to_words_string .= $words["$value"] . " ";
        }
        if ($i == 1 && $value != 0) {
            $number_to_words_string .= "Crores ";
        }
        if ($i == 3 && $value != 0) {
            $number_to_words_string .= "Lakhs ";
        }
        if ($i == 5 && $value != 0) {
            $number_to_words_string .= "Thousand ";
        }
        if ($i == 6 && $value != 0) {
            $number_to_words_string .= "Hundred ";
        }
    }
    if ($number_length > 9) {
        $number_to_words_string = "Sorry This does not support more than 99 Crores";
    }
    return ucwords(strtolower($number_to_words_string));
}
