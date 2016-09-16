<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Coach;
use frontend\models\CoachSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\BaseUrl;
use yii\helpers\BaseFileHelper;

/**
 * CoachController implements the CRUD actions for Coach model.
 */
class CoachController extends Controller
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
     * Lists all Coach models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new CoachSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // $course_id = Yii::$app->request->get('course_id');

        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        //     'course_id' => $course_id,
        // ]);

        $course_id = Yii::$app->request->get('course_id');

        $model = Coach::find()->where(['courses_id' => $course_id])->all();

        return $this->render('index', [
                'model' => $model,
                'course_id' => $course_id,
            ]);
    }

    /**
     * Displays a single Coach model.
     * @param integer $id
     * @param integer $courses_id
     * @return mixed
     */
    public function actionView($id, $courses_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $courses_id),
        ]);
    }

    /**
     * Creates a new Coach model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Coach();

        if ($model->load(Yii::$app->request->post())) {
            //return $this->redirect(['view', 'id' => $model->id, 'courses_id' => $model->courses_id]);
            $model->pic_t = UploadedFile::getInstance($model, 'pic');

            if(!empty($model->pic_t)):
                $uploadPath = "upload/class_id_" . $model->courses_id . "/coach_pic"; 
                BaseFileHelper::createDirectory($uploadPath, 0777);
                $model->pic_t->saveAs($uploadPath . "/" . $model->pic_t->name);

                // file name
                $model->pic = $model->pic_t->name;
            endif;

            // save model
            if($model->validate()):
                $model->save();
            else:
                var_dump($model->errors);
            endif;


            return $this->redirect(['index', 'course_id' => $model->courses_id]);
        } else {
            if(Yii::$app->request->get('course_id')){
                $course_id = Yii::$app->request->get('course_id');         
                $model->courses_id = $course_id;
                //return var_dump($course_id);
            }
            return $this->render('create', [
                //'course_id' => $course_id,
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Coach model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $courses_id
     * @return mixed
     */
    public function actionUpdate($id, $courses_id)
    {
        $model = $this->findModel($id, $courses_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['view', 'id' => $model->id, 'courses_id' => $model->courses_id]);
            return $this->redirect(['index', 'course_id' => $model->courses_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Coach model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $courses_id
     * @return mixed
     */
    public function actionDelete($id, $courses_id)
    {
        $this->findModel($id, $courses_id)->delete();

        //return $this->redirect(['index']);
        return $this->redirect(['index', 'course_id' => $courses_id]);
    }

    /**
     * Finds the Coach model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $courses_id
     * @return Coach the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $courses_id)
    {
        if (($model = Coach::findOne(['id' => $id, 'courses_id' => $courses_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
