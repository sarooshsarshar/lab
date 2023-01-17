<?php
// if (!function_exists('constants')) {
function constants($key)
{
    die;
    return config('constants.' . $key);
}
// }
