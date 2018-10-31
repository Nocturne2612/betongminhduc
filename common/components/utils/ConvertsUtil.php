<?php

namespace common\components\utils;

use common\models\enum\DefaultEnum;
use Yii;

class ConvertsUtil {

    public static function imgHeaderFormat($data) {
        $img = preg_replace('#^data:image/[^;]+;base64,#', '', $data);

        return $img;
    }

    /**
     * Format number to string
     * @param type $number
     * @param type $decimals (0 or 2)
     * @param type $type
     * @return string
     */
    public static function numberFormat($number, $decimals = 0, $type = false) {
        if (empty($number) || $number <= 0) {
            return 0;
        }
        if ($type) {
            return number_format($number, $decimals, ',', '.'); // ex: 100.000,00
        }
        return number_format($number, $decimals, '.', ','); // ex: 100,000.00
    }

    /**
     * Generate authorization
     * @param type $username
     * @param type $password
     * @return string Authorization
     */
    public static function generateAuthorization($username, $password) {
        return 'Basic ' . base64_encode($username . ":" . $password);
    }

    /**
     * 
     * @param int $timestamp
     * @return string
     */
    public static function convertIntToDate($timestamp, $isDate = false) {
        if (empty($timestamp)) {
            return '';
        }
        $date = new \DateTime();
        $date->setTimezone(new \DateTimeZone(Yii::$app->params['gmt']['timeZone']));
        $date->setTimestamp($timestamp);
        if ($isDate) {
            return $date->format(DefaultEnum::DATE_FORMAT_BIRTDAY);
        }
        return $date->format(DefaultEnum::DATE_FORMAT);
    }

    /**
     * 
     * @param type $str
     * @return int
     */
    public static function convertDateToInt($str, $isDate = false) {
        if (empty($str)) {
            return 0;
        }
        $date = null;
        if ($isDate) {
            $date = \DateTime::createFromFormat(DefaultEnum::DATE_FORMAT_BIRTDAY, $str, new \DateTimeZone(Yii::$app->params['gmt']['timeZone']));
        } else {
            $date = \DateTime::createFromFormat(DefaultEnum::DATE_FORMAT_SEARCH, $str, new \DateTimeZone(Yii::$app->params['gmt']['timeZone']));
        }
        return Yii::$app->formatter->asTimestamp($date);
    }

}
