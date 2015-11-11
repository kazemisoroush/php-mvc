<?php

class ControllerHelper
{
    public static function extractAttribute($serialized, $extract) {
        $arr = array();

        foreach(explode('&', $serialized) as $attr) {
            if(ControllerHelper::startsWith($attr, $extract)) {
                $val = explode('=', $attr);
                array_push($arr, $val[1]);
            }
        }

        return $arr;
    }

    private static function startsWith($haystack, $needle) {
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
    }
}