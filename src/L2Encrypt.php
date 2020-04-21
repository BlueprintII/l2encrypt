<?php

namespace BlueprintII\L2Encrypt;

class L2Encrypt
{
    /**
     * LineageII Encryption Master method.
     *
     * @param $value
     * @return string
     *
     * @author Unknown
     */
    public static function encrypt($value) : string
    {
        $array_mul = [0 => 213119, 1 => 213247, 2 => 213203, 3 => 213821];
        $array_add = [0 => 2529077, 1 => 2529089, 2 => 2529589, 3 => 2529997];
        $dst = $key = [0 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0,
            8 => 0, 9 => 0, 10 => 0, 11 => 0, 12 => 0, 13 => 0, 14 => 0, 15 => 0];

        for ($i = 0; $i < strlen ($value); $i++) {
            $dst[$i] = $key[$i] = ord (substr ($value, $i, 1));
        }

        for ($i = 0; $i <= 3; $i++) {
            $val[$i] = fmod(($key [$i * 4 + 0] + $key [$i * 4 + 1] * 0x100 + $key [$i * 4 + 2]
                    * 0x10000 + $key [$i * 4 + 3] * 0x1000000) * $array_mul [$i] + $array_add [$i], 4294967296);
        }

        for ($i = 0; $i <= 3; $i++) {
            $key[$i * 4 + 1] = $val[$i] / 0x100 & 0xff;
            $key[$i * 4 + 0] = $val[$i] & 0xff;
            $key[$i * 4 + 2] = $val[$i] / 0x10000 & 0xff;
            $key[$i * 4 + 3] = $val[$i] / 0x1000000 & 0xff;
        }

        $dst[0] = $dst[0] ^ $key[0];
        for ($i = 1; $i <= 15; $i++) {
            $dst[$i] = $dst[$i] ^ $dst[$i - 1] ^ $key[$i];
        }

        for ($i = 0; $i <= 15; $i++) {
            if ($dst[$i] == 0) {
                $dst[$i] = 0x66;
            }
        }

        $encrypted = "0x";
        for ($i = 0; $i <= 15; $i++) {
            if ($dst[$i] < 16) {
                $encrypted .= "0";
            }
            $encrypted .= dechex($dst[$i]);
        }
        return $encrypted;
    }

    /**
     * Alias for the Master method.
     *
     * @param $password
     * @return string
     */
    public static function userPassword($password) : string
    {
        return self::encrypt($password);
    }

    /**
     * Alias for the Master method.
     *
     * @param $answer
     * @return string
     */
    public static function userAnswer($answer) : string
    {
        return self::encrypt($answer);
    }
}
