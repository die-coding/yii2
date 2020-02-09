<?php

namespace diecoding\helpers;

use diecoding\base\BaseDiecoding;
use yii\helpers\VarDumper;

/**
 * 
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright 2019 Die Coding
 * @license BSD-3-Clause
 * @link https://www.diecoding.com
 * @since 2.0.14
 */
class Dump extends BaseDiecoding
{
    /**
     * Extends VarDumper::dump() yii2
     *
     * @param Type $var
     * @return void
     */
    public function __construct($var)
    {
        return VarDumper::dump($var, $depth = 10, $highlight = true);
    }
}
