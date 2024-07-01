<?php

namespace App\Helpers;

class UrlHelper
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {}

    /**
     * Check if is an url or not
     *
     * @param string $url
     * @return boolean
     */
    public static function isUrl(?string $url)
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
}
