<?php

namespace backend\models\model;

use Yii;

/**
 * This is the model class for table "backend_menu".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property string $icon
 * @property int $parent_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class BackendMenu extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'backend_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'url', 'parent_id', 'created_at', 'updated_at'], 'required'],
            [['parent_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'url', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'icon' => 'Icon',
            'parent_id' => 'Parent ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
