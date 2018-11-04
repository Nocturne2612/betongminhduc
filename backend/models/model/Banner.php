<?php

namespace backend\models\model;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property int $id
 * @property string $title
 * @property string $link
 * @property string $description
 * @property int $position
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Banner extends \common\models\User
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'link', 'created_at', 'updated_at'], 'required'],
            [['position', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'link', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'link' => 'Link',
            'description' => 'Description',
            'position' => 'Position',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
