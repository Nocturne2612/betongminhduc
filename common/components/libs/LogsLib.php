<?php

namespace common\components\libs;

use Yii;

class LogsLib {

    public static function log($msg) {
        try {
            $_dir_log = Yii::getAlias('@backend/runtime/logs/system.log');
            if (!file_exists($_dir_log)) {
                fopen($_dir_log, "w") or die("Unable to open file!");
            }
            if (filesize($_dir_log) > 1000000) {
                self::rollingLog();
            }
            $msg = "Log::" . print_r($msg, 1);
            $now = \DateTime::createFromFormat('U.u', microtime(true));
            $date = $now->format("[m-d-Y H:i:s.u]");
            error_log($date . $msg . "\n", 3, $_dir_log);
        } catch (\Exception $exc) {
            
        }
    }

    /**
     * File log lon hon 1MB(1000000) backup file cu -> create file moi
     */
    private static function rollingLog() {
        $ext = date("Y-m-d-H-i-s");
        $path = Yii::getAlias('@backend/runtime/logs/');
        $from = "{$path}system.log";
        $to = "{$path}system-{$ext}.log";
        if (!file_exists($to)) {
            rename($from, $to);
        }
    }

}
