<?php

namespace backend\models\model;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keyword
 * @property int $cate_id
 * @property int $user_id
 * @property int $attention
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Products extends \common\models\User {

    public $files;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title', 'description', 'content', 'cate_id', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['description', 'content'], 'string'],
            [['cate_id', 'user_id', 'attention', 'status', 'created_at', 'updated_at'], 'integer'],
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
            'description' => 'Description',
            'content' => 'Content',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keyword' => 'Meta Keyword',
            'cate_id' => 'Cate ID',
            'user_id' => 'User ID',
            'attention' => 'Attention',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public $datas;

    public function getCateParent($parent = null, $level = '') {
        $result = Categories::find()->asArray()->where(['status' => 1, 'parent_id' => $parent])->all();

        $level .= '|--';
        if (empty($result)) {
            return $this->datas;
        }
        foreach ($result as $key => $value) {
            if ($parent == null) {
                $level = '';
            }
            $this->datas[$value['id']] = $level . $value['title'];
            $this->getCateParent($value['id'], $level);
        }
        return $this->datas;
    }

}
