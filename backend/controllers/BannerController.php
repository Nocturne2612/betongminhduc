<?php

namespace backend\controllers;

use Yii;
use backend\models\model\Banner;
use backend\models\search\BannerSearch;
use backend\controllers\SiteController;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use common\models\Option;
use yii\helpers\Url;

/**
 * BannerController implements the CRUD actions for Banner model.
 */
class BannerController extends SiteController {

    /**
     * Lists all Banner models.
     * @return mixed
     */
    public function actionIndex() {
        $params = Yii::$app->request->queryParams;
        if (isset($params['button']) && $params['button'] == 'reset') {
            $this->redirect('index');
        }
        $searchModel = new BannerSearch();
        $dataProvider = $searchModel->search($params);
        $datas = $dataProvider->query->all();
        foreach ($datas as $key => $value) {
            $datas[$key] = $this->getIndexAction($value->getAttributes());
        }
//        $totalCount = $dataProvider->getTotalCount();
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'datas' => $datas,
//                    'totalCount' => $totalCount,
        ]);
    }

    /**
     * Displays a single Banner model.
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
     * Creates a new Banner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Banner();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->files = UploadedFile::getInstance($model, 'files');
            if ($model->files) {
                $upload = move_uploaded_file($model->files->tempName, \Yii::getAlias('@frontend') . '/web/images/banner/banner-' . $model->id . '.jpg');
                if ($upload) {
                    $model->files->saveAs('/images/banner/banner-' . $model->id . '.jpg', true);
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Banner model.
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
                $upload = move_uploaded_file($model->files->tempName, \Yii::getAlias('@frontend') . '/web/images/banner/banner-' . $model->id . '.jpg');
                if ($upload) {
                    $model->files->saveAs('/images/banner/banner-' . $id . '.jpg', true);
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Banner model.
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
     * Finds the Banner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Banner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Banner::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function getIndexAction($data) {
        //Xem chi tiết
        $option = new Option();
        $option->name = 'Chi tiết';
        $option->action = Url::base(true) . '/banner/view?id=' . $data['id'];
        $data['option'][] = $option;
        //Sửa
        $option = new Option();
        $option->name = 'Sửa';
        $option->action = Url::base(true) . '/banner/update?id=' . $data['id'];
        $data['option'][] = $option;
        //Xóa
        $option = new Option();
        $option->name = 'Xóa';
        $option->action = Url::base(true) . '/banner/delete?id=' . $data['id'];
        $data['option'][] = $option;
        return $data;
    }

    private function getViewAction($data) {
        //Sửa
        $option = new Option();
        $option->name = 'Sửa';
        $option->class = 'btn btn-primary';
        $option->action = Url::base(true) . '/banner/update?id=' . $data['id'];
        $data['option'][] = $option;
        //xóa
        $option = new Option();
        $option->name = 'xóa';
        $option->class = 'btn btn-danger';
        $option->action = Url::base(true) . '/banner/delete?id=' . $data['id'];
        $data['option'][] = $option;
        return $data;
    }

}
