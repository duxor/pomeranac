<?php
/**
 * Created by PhpStorm.
 * User: Dušan
 * Date: 2/18/2015
 * Time: 8:10 AM
 */

namespace App;


class TextEditor {
    private $readZnak = '<!--read more-->';
    public static function readMore($text){
        $position = strpos($text, '<!--read more-->');
        return $position != 0 ? strstr($text, $position) : $text;
    }
}