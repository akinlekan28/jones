<?php
/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 07/11/2017
 * Time: 6:17 AM
 */
?>
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('generateRandomString'))
{

    function generateRandomString($length = 10) {
        $characters = '132923';
        $start = 'SKU';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $start.$randomString;
    }
}
