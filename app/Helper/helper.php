<?php

use Illuminate\Support\Str;

if (!function_exists('sanitizeQueryStringFiled')) {
    function sanitizeQueryStringFiled(string $query): string
    {
        $query = trim($query);
        // $query = Str::squish($query);
        $query = strip_tags($query);
        $query = stripslashes($query);
        return htmlspecialchars($query, ENT_QUOTES, 'UTF-8');
    }
}
