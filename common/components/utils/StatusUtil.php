<?php

namespace common\components\utils;

use yii\helpers\Url;

class StatusUtil {

    /**
     * Get path url param
     * @param type $condition
     * @return string
     */
    public static function mappingstatus($val = 0) {
        $param = [
            'class' => '',
            'value' => '',
        ];
        if ($val == 1) {
            $param['class'] = 'badge bg-green';
            $param['value'] = 'Đang hoạt động';
        } elseif ($val == 0) {
            $param['class'] = 'badge bg-red';
            $param['value'] = 'Đang khóa';
        }
        return $param;
    }

}
