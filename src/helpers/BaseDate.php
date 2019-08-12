<?php

namespace diecoding\yii2\helpers;

use Yii;
use yii\db\Connection;
use yii\db\Expression;
use yii\db\Query;

/**
 * BaseDate provides concrete implementation for [[Date]].
 * 
 * Do not use BaseDate. Use [[Date]] instead.
 * 
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright 2019 Die Coding
 * @license BSD-3-Clause
 * @link https://www.diecoding.com
 * @since 2.0.14
 */
class BaseDate
{
    /**
     * @var array
     */
    public static $translate = [
        'April' => 'April',
        'August' => 'Agustus',
        'December' => 'Desember',
        'February' => 'Februari',
        'Friday' => 'Jumat',
        'January' => 'Januari',
        'July' => 'Juli',
        'June' => 'Juni',
        'March' => 'Maret',
        'May' => 'Mei',
        'Monday' => 'Senin',
        'November' => 'November',
        'October' => 'Oktober',
        'Saturday' => 'Sabtu',
        'September' => 'September',
        'Sunday' => 'Minggu',
        'Thursday' => 'Kamis',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
    ];

    /**
     * @var int
     */
    private static $_currentDate;

    /**
     * Gets current date from database
     *
     * @param  string          $format Date Format. Please refer to `date()` documentation.
     * @param  Connection|null $db     the database connection used to generate the SQL statement.
     *                                 If this parameter is not given, the `db` application
     *                                 component will be used.
     * @return string
     */
    public static function format($format = 'Y-m-d', $date)
    {
        $time = strtotime($date);
        $date = date($format, $time);

        return strtr($date, static::$translate);
    }

    /**
     * Gets current date from database
     *
     * @param  string          $format Date Format. Please refer to `date()` documentation.
     * @param  Connection|null $db     the database connection used to generate the SQL statement.
     *                                 If this parameter is not given, the `db` application
     *                                 component will be used.
     * @return string
     */
    public static function currentDate($format = 'Y-m-d', Connection $db = null)
    {
        if (!static::$_currentDate) {
            $expression = new Expression('CURDATE()');
            $now        = (new Query)->select($expression)->scalar($db);

            static::$_currentDate = strtotime($now);
        }
        $date = date($format, static::$_currentDate);

        return $date;
    }

    /**
     * Gets current time from database
     *
     * @param string          $format Datetime Format. Please refer to `date()` documentation.
     * @param Connection|null $db     the database connection used to generate the SQL statement.
     *                                If this parameter is not given, the `db` application
     *                                component will be used.
     * @return string
     */
    public static function currentDateTime($format = 'Y-m-d H:i:s', Connection $db = null)
    {
        $expression = new Expression('NOW()');
        $now        = (new Query)->select($expression)->scalar($db);

        $time = strtotime($now);
        $date = date($format, $time);

        return strtr($date, static::$translate);
    }
}
