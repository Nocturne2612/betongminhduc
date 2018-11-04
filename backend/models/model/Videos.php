<?php

namespace backend\models\model;

use Yii;

/**
 * This is the model class for table "videos".
 *
 * @property int $id
 * @property string $name
 * @property string $decrition
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Videos extends \common\models\User
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'videos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'decrition'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'decrition' => 'Decrition',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
