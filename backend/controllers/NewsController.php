<?php

namespace backend\controllers;

use Yii;
use backend\models\model\News;
use backend\models\search\NewsSearch;
use backend\controllers\SiteController;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use common\models\Option;
use yii\helpers\Url;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends SiteController {

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex() {
        $params = Yii::$app->request->queryParams;
        if (isset($params['button']) && $params['button'] == 'reset') {
            $this->redirect('index');
        }
        $searchModel = new NewsSearch();
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
                    'cateParent' => $searchModel->getNewsCateParent(),
//                    'totalCount' => $totalCount,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new News();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->files = UploadedFile::getInstance($model, 'files');
            if ($model->files) {
                $model->files->saveAs('../../images/' . 'product-' . $model->id . '.jpg', true);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
                    'cateParent' => $model->getNewsCateParent(),
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->files = UploadedFile::getInstance($model, 'files');
            if ($model->files) {
                $model->files->saveAs('../../images/' . 'product-' . $model->id . '.jpg', true);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
                    'cateParent' => $model->getNewsCateParent(),
        ]);
    }

    /**
     * Deletes an existing News model.
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
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function getIndexAction($data) {
        //Xem chi tiết
        $option = new Option();
        $option->name = 'Chi tiết';
        $option->action = Url::base(true) . '/news/view?id=' . $data['id'];
        $data['option'][] = $option;
        //Sửa
        $option = new Option();
        $option->name = 'Sửa';
        $option->action = Url::base(true) . '/news/update?id=' . $data['id'];
        $data['option'][] = $option;
        //Xóa
        $option = new Option();
        $option->name = 'Xóa';
        $option->action = Url::base(true) . '/news/delete?id=' . $data['id'];
        $data['option'][] = $option;
        return $data;
    }

    private function getViewAction($data) {
        //Sửa
        $option = new Option();
        $option->name = 'Sửa';
        $option->class = 'btn btn-primary';
        $option->action = Url::base(true) . '/news/update?id=' . $data['id'];
        $data['option'][] = $option;
        //xóa
        $option = new Option();
        $option->name = 'xóa';
        $option->class = 'btn btn-danger';
        $option->action = Url::base(true) . '/news/delete?id=' . $data['id'];
        $data['option'][] = $option;
        return $data;
    }

}
