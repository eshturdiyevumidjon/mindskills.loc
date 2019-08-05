<?php

namespace backend\controllers;

use Yii;
use backend\models\ScheduleUsers;
use backend\models\ScheduleUsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\data\ActiveDataProvider;

/**
 * ScheduleUsersController implements the CRUD actions for ScheduleUsers model.
 */
class ScheduleUsersController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all ScheduleUsers models.
     * @return mixed
     */
    public function actionIndex()
    {    
        if(Yii::$app->request->isAjax && $_POST['ScheduleUsersSearch']['search'] == '1'){    
       
            $query = ScheduleUsers::find();
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
            $schedule_id=$_POST['ScheduleUsersSearch']['schedule_id'];
            $pupil_id=$_POST['ScheduleUsersSearch']['pupil_id'];
            $payed=$_POST['ScheduleUsersSearch']['payed'];
            $comment=$_POST['ScheduleUsersSearch']['comment'];
            $unsubscribe=$_POST['ScheduleUsersSearch']['unsubscribe'];

            if($_POST['ScheduleUsersSearch']['unsubscribe']) 
                if($_POST['ScheduleUsersSearch']['unsubscribe']=="Да")$unsubscribe=1;     
                if($_POST['ScheduleUsersSearch']['unsubscribe']=="Нет")$unsubscribe=2;

            if(isset($schedule_id) || isset($pupil_id) || isset($payed) || isset($comment) || isset($unsubscribe)){
                
                $query->joinWith('schedule');
                $query->joinWith('pupil');

                $query->andFilterWhere([
                    'schedule_users.payed' => $payed,
                    'schedule_users.comment' => $comment,
                    'schedule_users.unsubscribe' => $unsubscribe,
                ]);

                $query->andFilterWhere(['like', 'schedule.name', $schedule_id])
                        ->andFilterWhere(['like', 'user.fio', $pupil_id]);
                       
                return $this->renderAjax('tbody', [
                    'dataProvider' => $dataProvider,
                    'searchModel'=>$searchModel,
                ]);
            }
            else
                return $this->renderAjax('tbody', [
                    'dataProvider' => $dataProvider,
                    'searchModel'=>$searchModel,
                ]); 
        }
        $searchModel=new ScheduleUsersSearch();
        $query = ScheduleUsers::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
                return  $this->render('index',[
                    'searchModel'=>$searchModel,
                    'dataProvider' => $dataProvider,
                ]);
    }

    /**
     * Displays a single ScheduleUsers model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> " Посещаемости",
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Отмена',['class'=>'btn btn-default pull-left',
                        'data-dismiss'=>"modal"]).
                            Html::a('Изменить',['update','id'=>$id],['class'=>'btn btn-primary',
                                'role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new ScheduleUsers model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new ScheduleUsers();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> " Посещаемости",
                    'content'=>'<span class="text-success">Успешно выполнено</span>',
                    'footer'=> Html::button('Ок',['class'=>'btn btn-primary pull-left',
                        'data-dismiss'=>"modal"]).
                            Html::a('Создать ещё',['create'],['class'=>'btn btn-info',
                                'role'=>'modal-remote'])
                ];         
            }else{           
                return [
                    'title'=> "Создать",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Отмена',['class'=>'btn btn-default pull-left',
                        'data-dismiss'=>"modal"]).
                                Html::button('Сохранить',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }
    public function actionColumns()
    {
        $request = Yii::$app->request;
        Yii::$app->response->format = Response::FORMAT_JSON;
        $session = Yii::$app->session;
   
        if($request->post()){
            $post = $request->post();
            ScheduleUsers::ColumnsScheduleUsers($post);
            return [
                'forceReload'=>'#crud-datatable-pjax',
                'forceClose'=>true,
            ];          
        }
        else
        {           
            return [
                'title'=> "Сортировка с колонок",
                'size' => 'large',
                'content'=>$this->renderAjax('columns', [
                    'session' => $session,
                ]),
                'footer'=> Html::button('Отмена',['class'=>'btn btn-default pull-left',
                    'data-dismiss'=>"modal"]).
                           Html::button('Сохранить',['class'=>'btn btn-primary','type'=>"submit"])
            ];         
        }       
    }
    /**
     * Updates an existing ScheduleUsers model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Изменить",
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                   'footer'=> Html::button('Отмена',['class'=>'btn btn-default pull-left',
                    'data-dismiss'=>"modal"]).
                                Html::button('Сохранить',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Посещаемости",
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Отмена',['class'=>'btn btn-default pull-left',
                        'data-dismiss'=>"modal"]).
                            Html::a('Изменить',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Изменить",
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Отмена',['class'=>'btn btn-default pull-left',
                        'data-dismiss'=>"modal"]).
                                Html::button('Сохранить',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing ScheduleUsers model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */

    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }

     /**
     * Delete multiple existing ScheduleUsers model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */

    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the ScheduleUsers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ScheduleUsers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    
    protected function findModel($id)
    {
        if (($model = ScheduleUsers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
