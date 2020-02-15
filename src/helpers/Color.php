<?php

namespace diecoding\helpers;

use diecoding\base\BaseDiecoding;
use yii\helpers\Json;

/**
 * 
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright 2019 Die Coding
 * @license BSD-3-Clause
 * @link https://www.diecoding.com
 * @since 2.0.14
 */
class Color extends BaseDiecoding
{
    private static $_materialColor;

    /**
     * Material Color HEX
     *
     * @param string $color RED - BLUEGREY
     * @param string $shade 50 - A700
     * @return void
     */
    public static function material($color, $shade)
    {
        $color = strtolower($color);
        $shade = strtolower($shade);

        if (static::$_materialColor === null) {
            $json = file_get_contents("material.color.json");
            static::$_materialColor = Json::decode($json);
        }

        return static::$_materialColor[$color][$shade];
    }
}
