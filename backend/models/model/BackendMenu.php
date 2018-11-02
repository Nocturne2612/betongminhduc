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
 * @property int $position
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class BackendMenu extends \common\models\User {

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
            [['name', 'url', 'created_at', 'updated_at'], 'required'],
            [['parent_id', 'position', 'status', 'created_at', 'updated_at'], 'integer'],
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
            'position' => 'Position',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function _formatMenus($menus, $result = []) {
        if (empty($menus)) {
            return $result;
        }
        foreach ($menus as $key => $val) {
                $menus[$key] = $val->getAttributes();
        }
        foreach ($menus as $key => $val) {
            if (empty($val['parent_id'])) {
                $result[$key] = $val;
                unset($menus[$key]);
            }
        }
        foreach ($result as $key => $val) {
            foreach ($menus as $temp) {
                if ($val['id'] == $temp['parent_id']) {
                    $result[$key]['child'][] = $temp;
                }
            }
        }
        return $result;
    }
    
}
