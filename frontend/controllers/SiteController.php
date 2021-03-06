<?php

namespace frontend\controllers;

use yii\web\Controller;
use backend\models\model\Categories;
use backend\models\model\Products;
use backend\models\model\News;

/**
 * Site controller
 */
class SiteController extends Controller {

    public function init() {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function actionIndex() {
        $this->layout = "@frontend/views/layouts/home";
        $categories = new Categories;
        $datas['categories'] = $categories->find()->asArray()->where(['status' => 1])->all();
        $products = new Products;
        $datas['products'] = $products->find()->asArray()->where(['status' => 1])->all();

        return $this->render('index', $datas);
    }

    public function actionContact($id) {
        $news = new News();
        $datas = $news->find()->asArray()->where(['status' => 1, 'id' => $id])->all();

        return $this->render('contact', [
                    'datas' => $datas
        ]);
    }

    public function actionAbout($id) {
        $categories = new Categories;
        $datas['categories'] = $categories->find()->asArray()->where(['status' => 1])->all();
        $products = new Products;
        $datas['products'] = $products->find()->asArray()->where(['status' => 1])->all();

        return $this->render('index', $datas);
    }

}
