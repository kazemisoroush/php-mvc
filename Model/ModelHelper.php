<?php

class ModelHelper {

    /**
     * Creates random string by proper string length.
     *
     * @param int
     * @return string
     */
    public static function generateRandomString($length = 10) {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    /**
     * Removes extra key/value pairs with numeric key. This is because of PDO query result.
     * PDO results has two version of each value. One with numeric value and one with
     * string value.
     *
     * @param $row
     * @return mixed
     */
    public static function removeNumericKeys($row)
    {
        foreach ($row as $key => $value) {
            if (!is_int($key)) {
                continue;
            }

            unset($row[$key]);
        }

        return $row;
    }

} 