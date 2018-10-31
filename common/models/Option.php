<?php

namespace common\models;

use yii\base\Model;

class Option extends Model {

    public $name;
    public $type;
    public $icon;
    public $class;
    public $action;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'type', 'icon', 'class', 'action'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'name' => 'Tên hiển thị',
            'type' => 'Loại',
            'icon' => 'Icon',
            'class' => 'Style',
            'action' => 'Thao tác'
        ];
    }
}
