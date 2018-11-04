<?php

namespace backend\controllers;

use Yii;
use backend\models\model\User;
use backend\models\form\UserForm;
use backend\models\search\UserSearch;
use backend\controllers\SiteController;
use yii\web\NotFoundHttpException;
use common\models\Option;
use yii\helpers\Url;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends SiteController {

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex() {
        $params = Yii::$app->request->queryParams;
        if (isset($params['button']) && $params['button'] == 'reset') {
            $this->redirect('index');
        }
        $searchModel = new UserSearch();
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
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new UserForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->createUser()) {
                return $this->redirect(['view', 'id' => $user->id]);
            }
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
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

    public function actionResetPassword($id) {
        $model = new \backend\models\form\ResetPasswordForm();
        
        if ($model->load(Yii::$app->request->post())) {
            if ($model->resetPassword($id)) {
                return $this->redirect(['view', 'id' => $id]);
            }
        }
        return $this->render('reset-password', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function getIndexAction($data) {
        //Xem chi tiết
        $option = new Option();
        $option->name = 'Chi tiết';
        $option->action = Url::base(true) . '/user/view?id=' . $data['id'];
        $data['option'][] = $option;
        //Sửa
        $option = new Option();
        $option->name = 'Sửa';
        $option->action = Url::base(true) . '/user/update?id=' . $data['id'];
        $data['option'][] = $option;
        //Xóa
        $option = new Option();
        $option->name = 'Reset mật khẩu';
        $option->action = Url::base(true) . '/user/reset-password?id=' . $data['id'];
        $data['option'][] = $option;
        //Xóa
        $option = new Option();
        $option->name = 'Xóa';
        $option->action = Url::base(true) . '/user/delete?id=' . $data['id'];
        $data['option'][] = $option;
        return $data;
    }

    private function getViewAction($data) {
        //Sửa
        $option = new Option();
        $option->name = 'Sửa';
        $option->class = 'btn btn-primary';
        $option->action = Url::base(true) . '/user/update?id=' . $data['id'];
        $data['option'][] = $option;
        //Xóa
        $option = new Option();
        $option->name = 'Reset mật khẩu';
        $option->class = 'btn btn-info';
        $option->action = Url::base(true) . '/user/reset-password?id=' . $data['id'];
        $data['option'][] = $option;
        //xóa
        $option = new Option();
        $option->name = 'xóa';
        $option->class = 'btn btn-danger';
        $option->action = Url::base(true) . '/user/delete?id=' . $data['id'];
        $data['option'][] = $option;
        return $data;
    }

}
