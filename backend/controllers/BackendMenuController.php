<?php

namespace backend\controllers;

use backend\controllers\SiteController;
use Yii;
use backend\models\model\BackendMenu;
use backend\models\search\BackendMenuSearch;
use yii\web\NotFoundHttpException;
use common\models\Option;
use yii\helpers\Url;

/**
 * BackendMenuController implements the CRUD actions for BackendMenu model.
 */
class BackendMenuController extends SiteController {

    /**
     * Lists all BackendMenu models.
     * @return mixed
     */
    public function actionIndex() {
        $params = Yii::$app->request->queryParams;
        if (isset($params['button']) && $params['button'] == 'reset') {
            $this->redirect('index');
        }
        $searchModel = new BackendMenuSearch();
        $dataProvider = $searchModel->search($params);
        $datas = $dataProvider->query->all();
        echo "<pre>";
        print_r($datas);
        die;
        $totalCount = $dataProvider->getTotalCount();
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'datas' => $datas,
                    'totalCount' => $totalCount,
                    'action' => $this->getIndexAction($datas),
        ]);
    }

    /**
     * Displays a single BackendMenu model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BackendMenu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new BackendMenu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing BackendMenu model.
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
     * Deletes an existing BackendMenu model.
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
     * Finds the BackendMenu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BackendMenu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = BackendMenu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function getIndexAction($datas, $result = []) {
        foreach ($datas as $dat) {
//        if ($datas['status'] == 1) {
            $option = new Option();
            $option->name = 'Chi tiết';
            $option->action = Url::base(true) . '/backend-menu/view?id=' . $datas['id'];
            $result[] = $option;
//        }
            if ($datas['status'] == 1) {
                $option = new Option();
                $option->name = 'Sửa';
                $option->action = Url::base(true) . '/backend-menu/update?id=' . $datas['id'];
                $result[] = $option;
            }
//        if ($datas['status'] == 1) {
            $option = new Option();
            $option->name = 'Xóa';
            $option->action = Url::base(true) . '/backend-menu/delete?id=' . $datas['id'];
            $result[] = $option;
//        }
            if ($datas['status'] == 1) {
                $option = new Option();
                $option->name = 'Khóa';
                $option->action = Url::base(true) . '/backend-menu/lock';
                $result[] = $option;
            }
            if ($datas['status'] == 0) {
                $option = new Option();
                $option->name = 'Mở khóa';
                $option->action = Url::base(true) . '/backend-menu/unlock';
                $result[] = $option;
            }
        }
        return $result;
    }

    private function getViewAction($datas, $result = []) {
        if ($datas['status'] == 1) {
            $option = new Option();
            $option->name = 'Sửa';
            $option->class = 'btn btn-primary';
            $option->action = Url::base(true) . '/backend-menu/update?id=' . $datas['id'];
            $result[] = $option;
        }
//        if ($datas['status'] == 1) {
        $option = new Option();
        $option->name = 'xóa';
        $option->class = 'btn btn-danger';
        $option->action = Url::base(true) . '/backend-menu/delete?id=' . $datas['id'];
        $result[] = $option;
//        }
        if ($datas['status'] == 1) {
            $option = new Option();
            $option->name = 'Khóa';
            $option->class = 'btn btn-danger';
            $option->action = Url::base(true) . '/backend-menu/lock';
            $result[] = $option;
        }
        if ($datas['status'] == 0) {
            $option = new Option();
            $option->name = 'Mở khóa';
            $option->class = 'btn btn-primary';
            $option->action = Url::base(true) . '/backend-menu/unlock';
            $result[] = $option;
        }
        return $result;
    }

}
