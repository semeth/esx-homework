<?php

function isLogged()
{
    $ci = &get_instance();
    return ($ci->session->userdata('logged_in')) ? true : false;
}

function isAdmin()
{
    $ci = &get_instance();
    return ($ci->session->userdata('privilege') == 1) ? true : false;
}

function dnd($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    exit;
}

function user($param = '')
{
    $output = '';
    $ci = &get_instance();
    if ($param != '' && array_key_exists($param, $ci->session->userdata())) {
        $output = $ci->session->userdata()[$param];
    } else if ($param == '') {
        $output = $ci->session->userdata();
    }

    return $output;
}

function generateToken($type = '', $length = 16)
{
    if ($type == 'number') {
        $characters = '0123456789';
    } else if ($type == 'letter') {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    } else {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

//function formatBytes($size, $precision = 2){
//    $base = log($size, 1024);
//    $suffixes = array('', 'KB', 'MB', 'GB', 'TB');   
//
//    return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
//}

function formatBytes($size)
{
    if (is_numeric($size)) {
        $filesizename = array(" MB", " GB", " TB");
        $size = round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . $filesizename[$i];

    }
    return $size;
}

function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}