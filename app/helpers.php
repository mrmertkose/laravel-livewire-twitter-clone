<?php
if (!function_exists("hashtag")) {
    function hashtag($arg)
    {
        $value = "@#+([a-zA-Z0-9IıİiÖöĞğÜüÇç]+)@si";
        $url = '<a href="#?hashtag=$1" class="text-primary">$0</a>';
        $arg = preg_replace($value, $url, $arg);
        return $arg;
    }
}

if (!function_exists("hashtagDb")) {
    function hashtagDb($arg)
    {
        $pattern = "/#+([a-zA-Z0-9IıİiÖöĞğÜüÇç]+)/";
        if (preg_match_all($pattern, $arg, $matches))
        {
            return $matches[0];
        }
    }
}


