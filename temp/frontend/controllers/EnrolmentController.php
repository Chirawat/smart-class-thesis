<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Enrolment;
use frontend\models\EnrolmentSearch;
use frontend\models\Courses;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EnrolmentController implements the CRUD actions for Enrolment model.
 */
class EnrolmentController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Enrolment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EnrolmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Enrolment model.
     * @param integer $user_id
     * @param integer $course_id
     * @return mixed
     */
    public function actionView($user_id, $course_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($user_id, $course_id),
        ]);
    }

    /**
     * Creates a new Enrolment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Enrolment();

        $courses = Courses::find()->where(['status' => "active"])->all();

        //if ($model->load(Yii::$app->request->get())) {
        if(Yii::$app->request->get('course_id')){
            $model->user_id = Yii::$app->user->identity->id;
            $model->dated = date('Y-m-d');
            $model->course_id = Yii::$app->request->get('course_id');

            if($model->validate()){
                $model->save();
            }
            else{
                return var_dump($model->errors);
            }

            return $this->redirect(['site/classes']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'courses' => $courses
                //'user_id' => Yii::$app->user->identity->id,
            ]);
        }
    }

    /**
     * Updates an existing Enrolment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $user_id
     * @param integer $course_id
     * @return mixed
     */
    public function actionUpdate($user_id, $course_id)
    {
        $model = $this->findModel($user_id, $course_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id, 'course_id' => $model->course_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Enrolment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $user_id
     * @param integer $course_id
     * @return mixed
     */
    public function actionDelete($user_id, $course_id)
    {
        $this->findModel($user_id, $course_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Enrolment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $user_id
     * @param integer $course_id
     * @return Enrolment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_id, $course_id)
    {
        if (($model = Enrolment::findOne(['user_id' => $user_id, 'course_id' => $course_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
