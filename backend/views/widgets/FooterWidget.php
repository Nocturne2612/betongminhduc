<?php

namespace backend\views\widgets;

use yii\base\Widget;

class FooterWidget extends Widget {

    public function run() {
        return $this->render('footer');
    }

}
