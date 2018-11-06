
<?php

namespace frontend\controllers;

use yii\web\Controller;
use backend\models\model\Categories;
use backend\models\model\Products;

/**
 * Site controller
 */
class ProductController extends Controller {

    public function actionIndex() {
        $categories = new Categories;
        $datas['categories'] = $categories->find()->asArray()->where(['status' => 1])->all();
//        $products = new Products;
//        $datas['products'] = $products->find()->asArray()->where(['status' => 1])->all();

        return $this->render('index', $datas);
    }
    
}
