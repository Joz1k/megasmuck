<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;

class CookieService {
    public function setCookie(string $name, string $value, int $lifetime = 0)
    {
        return setcookie($name, $value, $lifetime);
    }

    public function getCartData($name)
    {
        return json_decode(Cookie::get($name));
    }
}