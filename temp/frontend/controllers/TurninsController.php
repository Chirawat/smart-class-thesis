<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Turnins;
use frontend\models\TurninsSearch;
use frontend\models\Scaffolding;
use frontend\models\Enrolment;
use frontend\models\Problems;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;
/**
 * TurninsController implements the CRUD actions for Turnins model.
 */
class TurninsController extends Controller
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
     * Lists all Turnins models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TurninsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Turnins model.
     * @param integer $id
     * @param integer $problems_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionView($id, $problems_id, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $problems_id, $user_id),
        ]);
    }

    /**
     * Creates a new Turnins model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($problem_id)
    {
        $model = new Turnins();

        $scaffoldingModel = Scaffolding::findOne($problem_id);

        $turninsHistory = Turnins::find()->where(['problems_id' => $problem_id, 'user_id' => Yii::$app->user->identity->id])->all();

        if ($model->load(Yii::$app->request->post())) {
            $filesName = [];
            
            $uploadPath = "upload/class_id_" . $model->problems->courses->id . "/problem_id_" . $model->problems->id . "/turnins/" ; 
            BaseFileHelper::createDirectory($uploadPath, 0777);

            $model->files_t = UploadedFile::getInstances($model, 'files');

            // return var_dump(iconv_get_encoding('all')); returned : ISO-8859-1

            foreach($model->files_t as $file){
                //$file->saveAs($uploadPath . "/" . $file->name);

                $utf8FileName = iconv(mb_detect_encoding($file->name, mb_detect_order(), true), "windows-874", $file->name);
                $file->saveAs($uploadPath . "/" . $utf8FileName);

                $filesName[] = $file->name;
            }

            $model->files = implode(',' , $filesName);

            if($model->validate()){
                $model->save();
            }
            else{
                return var_dump($model->errors);
            }

            // return $this->redirect(['view', 'id' => $model->id, 'problems_id' => $model->problems_id, 'user_id' => $model->user_id]);
            return $this->redirect(['turnins/create', 'problem_id' => $model->problems->id]);
        } else {
            // initial condition
            $model->problems_id = $problem_id; 
            $model->user_id = Yii::$app->user->identity->id; 
            $model->date = date('Y-m-d');
            return $this->render('create', [
                'model' => $model,
                'turninsHistory' => $turninsHistory,
                'scaffoldingModel' => $scaffoldingModel,
            ]);
        }
    }

    public function actionGradding($problem_id){
        // turnins
        $model = null;

        if(Yii::$app->request->post()){
            $turnin = Yii::$app->request->post('Turnins');
            $turninModel = Turnins::findOne($turnin['id']);
            $turninModel->score = $turnin['score'];

            if($turninModel->validate()){
                $turninModel->save();
            }
            else{
                return var_dump($turninModel->errors);
            }
        }

        $user_id = null;
        if(Yii::$app->request->get('user_id')){
            $user_id = Yii::$app->request->get('user_id');
            $model = Turnins::find()->where(['problems_id' => $problem_id, 'user_id' => $user_id])->all();
        }

        //all students
        $problem = Problems::findOne($problem_id);

        $enrolmentModel = Enrolment::find()->where(['course_id' => $problem->courses_id])->all();

        return $this->render('gradding', [
                'model' => $model,
                'enrolmentModel' => $enrolmentModel,
                'problem_id' => $problem_id,
                'user_id' => $user_id,
                'course_id' => $problem->courses->id,
            ]);
    }

    /**
     * Updates an existing Turnins model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $problems_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionUpdate($id, $problems_id, $user_id)
    {
        $model = $this->findModel($id, $problems_id, $user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'problems_id' => $model->problems_id, 'user_id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Turnins model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $problems_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($id, $problems_id, $user_id)
    {
        $this->findModel($id, $problems_id, $user_id)->delete();

        return $this->redirect(['index']);
    }
    /**
     * Finds the Turnins model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $problems_id
     * @param integer $user_id
     * @return Turnins the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $problems_id, $user_id)
    {
        if (($model = Turnins::findOne(['id' => $id, 'problems_id' => $problems_id, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
