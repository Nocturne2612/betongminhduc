<?php

namespace backend\models\model;

use Yii;

/**
 * This is the model class for table "frontend_menu".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property int $parent_id
 * @property int $position
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class FrontendMenu extends \common\models\User {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'frontend_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'url', 'created_at', 'updated_at'], 'required'],
            [['parent_id', 'position', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'url'], 'string', 'max' => 255],
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
            'parent_id' => 'Parent ID',
            'position' => 'Position',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
