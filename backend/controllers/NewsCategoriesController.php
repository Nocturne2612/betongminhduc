<?php

namespace backend\controllers;

use Yii;
use backend\models\model\NewsCategories;
use backend\models\search\NewsCategoriesSearch;
use backend\controllers\SiteController;
use yii\web\NotFoundHttpException;
use common\models\Option;
use yii\helpers\Url;

/**
 * NewsCategoriesController implements the CRUD actions for NewsCategories model.
 */
class NewsCategoriesController extends SiteController {

    /**
     * Lists all NewsCategories models.
     * @return mixed
     */
    public function actionIndex() {
        $params = Yii::$app->request->queryParams;
        if (isset($params['button']) && $params['button'] == 'reset') {
            $this->redirect('index');
        }
        $searchModel = new NewsCategoriesSearch();
        $dataProvider = $searchModel->search($params);
        $datas = $dataProvider->query->all();
        if (!empty($datas)) {
            foreach ($datas as $key => $value) {
                $datas[$key] = $this->getIndexAction($value->getAttributes());
            }
        }
//        $totalCount = $dataProvider->getTotalCount();
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'datas' => $datas,
//                    'totalCount' => $totalCount,
        ]);
    }

    /**
     * Displays a single NewsCategories model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'data' => $this->getViewAction($this->findModel($id)->getAttributes()),
        ]);
    }

    /**
     * Creates a new NewsCategories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new NewsCategories();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing NewsCategories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing NewsCategories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NewsCategories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NewsCategories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = NewsCategories::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function getIndexAction($data) {
        //Xem chi tiết
        $option = new Option();
        $option->name = 'Chi tiết';
        $option->action = Url::base(true) . '/news-categories/view?id=' . $data['id'];
        $data['option'][] = $option;
        //Sửa
        $option = new Option();
        $option->name = 'Sửa';
        $option->action = Url::base(true) . '/news-categories/update?id=' . $data['id'];
        $data['option'][] = $option;
        //Xóa
        $option = new Option();
        $option->name = 'Xóa';
        $option->action = Url::base(true) . '/news-categories/delete?id=' . $data['id'];
        $data['option'][] = $option;
        return $data;
    }

    private function getViewAction($data) {
        //Sửa
        $option = new Option();
        $option->name = 'Sửa';
        $option->class = 'btn btn-primary';
        $option->action = Url::base(true) . '/news-categories/update?id=' . $data['id'];
        $data['option'][] = $option;
        //xóa
        $option = new Option();
        $option->name = 'xóa';
        $option->class = 'btn btn-danger';
        $option->action = Url::base(true) . '/news-categories/delete?id=' . $data['id'];
        $data['option'][] = $option;
        return $data;
    }

}
