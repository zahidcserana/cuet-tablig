<?php
/*
 * Secret key and Site key get on https://www.google.com/recaptcha
 * */
return [
    'secret' => env('CAPTCHA_SECRET', '6LeigT4UAAAAAOt4kPBS9gNO01ipy7NJ05Gria__'),
    'sitekey' => env('CAPTCHA_SITEKEY', '6LeigT4UAAAAAJZssbeekJ76g49MKYhWarpOiktu')

];