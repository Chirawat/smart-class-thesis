<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Topics;
use frontend\models\Replies;
use frontend\models\RepliesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\BaseUrl;
use yii\helpers\BaseFileHelper; 

/**
 * RepliesController implements the CRUD actions for Replies model.
 */
class RepliesController extends Controller
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
     * Lists all Replies models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RepliesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Replies model.
     * @param integer $id
     * @param integer $topics_id
     * @return mixed
     */
    public function actionView($id, $topics_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $topics_id),
        ]);
    }

    /**
     * Creates a new Replies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($topic_id)
    {
        $model = new Replies();

        $topicsModel = Topics::findOne($topic_id);

        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()){
                $model->file_t = UploadedFile::getInstance($model, 'file');
				if(!empty($model->file_t)){
					$model->file = $model->file_t->name;
				}
                if($model->validate()){
                    $model->save();
                }
                else{
                    var_dump($model->errors);
                }

                // Create directory
                $uploadPath = "upload/class_id_" . $model->topics->courses_id . "/topic_id_" . $model->topics->id ; 
                BaseFileHelper::createDirectory($uploadPath, 0777);

                // Save Files
				if(!empty($model->file_t)){
					$model->file_t->saveAs($uploadPath . "/" . $model->file_t->name);
				}
            }
            else{
                return var_dump($model->errors);
            }
            return $this->redirect(['replies/create', 'topic_id' => $model->topics_id]);
            //return $this->redirect(['view', 'id' => $model->id, 'topics_id' => $model->topics_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'topicsModel' => $topicsModel,
            ]);
        }
    }
    /**
     * Updates an existing Replies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $topics_id
     * @return mixed
     */
    public function actionUpdate($id, $topics_id)
    {
        $model = $this->findModel($id, $topics_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'topics_id' => $model->topics_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Replies model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $topics_id
     * @return mixed
     */
    public function actionDelete($id, $topics_id)
    {
        $this->findModel($id, $topics_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Replies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $topics_id
     * @return Replies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $topics_id)
    {
        if (($model = Replies::findOne(['id' => $id, 'topics_id' => $topics_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
