<?php

namespace backend\models\model;

use Yii;

/**
 * This is the model class for table "news_categories".
 *
 * @property int $id
 * @property string $title
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keyword
 * @property int $parent_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class NewsCategories extends \common\models\User {

    public $files;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'news_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title', 'created_at', 'updated_at'], 'required'],
            [['parent_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'meta_title', 'meta_description', 'meta_keyword'], 'string', 'max' => 255],
            [['files'], 'file', 'extensions' => 'jpg,png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keyword' => 'Meta Keyword',
            'parent_id' => 'Parent ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
