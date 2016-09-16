<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Problems;
use frontend\models\ProblemsSearch;
use frontend\models\Scaffolding;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\BaseUrl;
use yii\helpers\BaseFileHelper;

/**
 * ProblemsController implements the CRUD actions for Problems model.
 */
class ProblemsController extends Controller
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
     * Lists all Problems models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProblemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Problems model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Problems model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($courseID)
    {
        $model = new Problems();

        $scaffoldingModel = new Scaffolding();

        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post())) {
            $model->files_t = UploadedFile::getInstances($model, 'files');
            $filesName = [];

            // Save Files
            foreach($model->files_t as $file){
                    $filesName[] = $file->name;
            }

            // update 'Files' field and sabe model
            $model->files = implode(',' , $filesName);

            if($model->validate()){
                $model->save();
            }
            else{
                $errors = $model->errors;
                return var_dump($errors);
            }

            // Create directory
            $uploadPath = "upload/class_id_" . $model->courses_id . "/problem_id_" . $model->id ; 
            BaseFileHelper::createDirectory($uploadPath, 0777);

            // Save Files
            foreach($model->files_t as $file){
                $file->saveAs($uploadPath . "/" . $file->name);
            }

            //update scaffolding table
            if($scaffoldingModel->load(Yii::$app->request->post())){
                // create dir
                $scaffoldingPath = $uploadPath . "/Scaffolding";
                BaseFileHelper::createDirectory($scaffoldingPath, 0777);

                // scaff1
                $scaffoldingModel->scaff1_file = UploadedFile::getInstance($scaffoldingModel, 'scaff1');
                if(!empty($scaffoldingModel->scaff1_file)){
                    $scaffoldingModel->scaff1_file->saveAs($scaffoldingPath . "/" . $scaffoldingModel->scaff1_file->name);
                    $scaffoldingModel->scaff1 = $scaffoldingModel->scaff1_file->name;
                }

                // scaff2
                $scaffoldingModel->scaff2_file = UploadedFile::getInstance($scaffoldingModel, 'scaff2');
                if(!empty($scaffoldingModel->scaff2_file)){
                    $scaffoldingModel->scaff2_file->saveAs($scaffoldingPath . "/" . $scaffoldingModel->scaff2_file->name);
                    $scaffoldingModel->scaff2 = $scaffoldingModel->scaff2_file->name;
                }

                // scaff3
                $scaffoldingModel->scaff3_file = UploadedFile::getInstance($scaffoldingModel, 'scaff3');
                if(!empty($scaffoldingModel->scaff3_file)){
                    $scaffoldingModel->scaff3_file->saveAs($scaffoldingPath . "/" . $scaffoldingModel->scaff3_file->name);
                    $scaffoldingModel->scaff3 = $scaffoldingModel->scaff3_file->name;
                }

                // scaff4
                $scaffoldingModel->scaff4_file = UploadedFile::getInstance($scaffoldingModel, 'scaff4');
                if(!empty($scaffoldingModel->scaff4_file)){
                    $scaffoldingModel->scaff4_file->saveAs($scaffoldingPath . "/" . $scaffoldingModel->scaff4_file->name);
                    $scaffoldingModel->scaff4 = $scaffoldingModel->scaff4_file->name;
                }

                $scaffoldingModel->problems_id = $model->id;
                // save model
                if($scaffoldingModel->validate()){
                    $scaffoldingModel->save();
                }
                else{
                    return var_dump($scaffoldingModel->errors);
                }
            }

            // return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['site/classroom', 'courseID' => $model->courses_id]);
        } else {
            $model->created_date = date('Y-m-d');
            $model->courses_id = $courseID;
            return $this->render('create', [
                'model' => $model,
                'scaffoldingModel' => $scaffoldingModel,
            ]);
        }
    }

    /**
     * Updates an existing Problems model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$scaffoldingModel = Scaffolding::find()->where(['problems_id' => $id])->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			// Create directory
            $uploadPath = "upload/class_id_" . $model->courses_id . "/problem_id_" . $model->id ; 
            BaseFileHelper::createDirectory($uploadPath, 0777);
			
			//update scaffolding table
            if($scaffoldingModel->load(Yii::$app->request->post())){
                // create dir
                $scaffoldingPath = $uploadPath . "/Scaffolding";
                BaseFileHelper::createDirectory($scaffoldingPath, 0777);

                // scaff1
                $scaffoldingModel->scaff1_file = UploadedFile::getInstance($scaffoldingModel, 'scaff1');
                if(!empty($scaffoldingModel->scaff1_file)){
                    $scaffoldingModel->scaff1_file->saveAs($scaffoldingPath . "/" . $scaffoldingModel->scaff1_file->name);
                    $scaffoldingModel->scaff1 = $scaffoldingModel->scaff1_file->name;
                }

                // scaff2
                $scaffoldingModel->scaff2_file = UploadedFile::getInstance($scaffoldingModel, 'scaff2');
                if(!empty($scaffoldingModel->scaff2_file)){
                    $scaffoldingModel->scaff2_file->saveAs($scaffoldingPath . "/" . $scaffoldingModel->scaff2_file->name);
                    $scaffoldingModel->scaff2 = $scaffoldingModel->scaff2_file->name;
                }

                // scaff3
                $scaffoldingModel->scaff3_file = UploadedFile::getInstance($scaffoldingModel, 'scaff3');
                if(!empty($scaffoldingModel->scaff3_file)){
                    $scaffoldingModel->scaff3_file->saveAs($scaffoldingPath . "/" . $scaffoldingModel->scaff3_file->name);
                    $scaffoldingModel->scaff3 = $scaffoldingModel->scaff3_file->name;
                }

                // scaff4
                $scaffoldingModel->scaff4_file = UploadedFile::getInstance($scaffoldingModel, 'scaff4');
                if(!empty($scaffoldingModel->scaff4_file)){
                    $scaffoldingModel->scaff4_file->saveAs($scaffoldingPath . "/" . $scaffoldingModel->scaff4_file->name);
                    $scaffoldingModel->scaff4 = $scaffoldingModel->scaff4_file->name;
                }

                $scaffoldingModel->problems_id = $model->id;
                // save model
                if($scaffoldingModel->validate()){
                    $scaffoldingModel->save();
                }
                else{
                    return var_dump($scaffoldingModel->errors);
                }
            }
			
            return $this->redirect(['site/classroom', 'courseID' => $model->courses_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
				'scaffoldingModel' => $scaffoldingModel,
            ]);
        }
    }

    /**
     * Deletes an existing Problems model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $course_id = $model->courses_id;

        $model->delete();

        return $this->redirect(['site/classroom', 'courseID' => $course_id]);
        //return $this->redirect(['index']);
    }

    /**
     * Finds the Problems model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Problems the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Problems::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
