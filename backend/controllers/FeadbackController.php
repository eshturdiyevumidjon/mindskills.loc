<?php

namespace backend\controllers;

use Yii;
use backend\models\Feadback;
use backend\models\FeadbackSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\data\ActiveDataProvider;

/**
 * FeadbackController implements the CRUD actions for Feadback model.
 */
class FeadbackController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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
     * Lists all Feadback models.
     * @return mixed
     */
    public function actionIndex()
    {    
        if(Yii::$app->request->isAjax && $_POST['FeadbackSearch']['search'] == '1'){ 
        
            $searchModel = new FeadbackSearch();            
            $searchModel->attributes = $_POST['FeadbackSearch'];
            $dataProvider = $searchModel->filter($_POST);

            return $this->renderAjax('tbody', [
                'dataProvider' => $dataProvider,
                'post' => $_POST,
                'searchModel' => $searchModel
            ]);

        }

        $query = Feadback::find();
        $searchModel = new FeadbackSearch();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
            return  $this->render('index',[
                'searchModel'=>$searchModel,
                'dataProvider' => $dataProvider,
            ]);
    }


    /**
     * Displays a single Feadback model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Обратная связь",
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
     * Creates a new Feadback model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Feadback();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
             if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Обратная связи",
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
            Feadback::ColumnsFeadback($post);
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
     * Updates an existing Feadback model.
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
                    'title'=> "Обратная связи",
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
     * Delete an existing Feadback model.
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
     * Delete multiple existing Feadback model.
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
     * Finds the Feadback model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Feadback the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    protected function findModel($id)
    {
        if (($model = Feadback::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
