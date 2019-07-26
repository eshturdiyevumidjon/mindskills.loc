<?php

namespace backend\controllers;

use Yii;
use backend\models\Inbox;
use backend\models\InboxSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\web\HttpException;
use backend\models\Rules;
use backend\models\Alerts;
/**
 * InboxController implements the CRUD actions for Inbox model.
 */
class InboxController extends Controller
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

    // public function beforeAction($action)
    // {
    //     if(Yii::$app->user->identity->id === null) return $this->redirect(['/site/login']);
    //     $rules = Rules::find()->where(['user_id' => Yii::$app->user->identity->id])->one();
    //     if($action->id =='index' || $action->id =='view')
    //     {
    //         if($rules->inbox_view !== 1) throw new HttpException(403,'У вас нет разрешения на доступ к этому действию.');
    //     }
    //     if($action->id =='create')
    //     {
    //         if($rules->inbox_create !== 1) throw new HttpException(403,'У вас нет разрешения на доступ к этому действию.');
    //     }
    //     if($action->id =='update')
    //     {
    //         if($rules->inbox_update !== 1) throw new HttpException(403,'У вас нет разрешения на доступ к этому действию.');
    //     }
    //     if($action->id =='delete')
    //     {
    //         if($rules->inbox_delete !== 1) throw new HttpException(403,'У вас нет разрешения на доступ к этому действию.');
    //     }
    //     //throw new NotFoundHttpException('The requested page does not exist.');
    //     //throw new HttpException(403,'У вас нет разрешения на доступ к этому действию.');
    //     $this->enableCsrfValidation = false;
    //     return parent::beforeAction($action);
    // }

    /**
     * Lists all Inbox models.
     * @return mixed
     */
    public function actionIndex($date_cr = null)
    {    
        $userId = Yii::$app->user->identity->id;

        if($date_cr !== null)
        {
            $query = Inbox::find()
                ->where(['to' => $userId, 'deleted' => 0])
                ->andFilterWhere(['between', 'date_cr', $date_cr . ' 00:00:00', $date_cr . ' 23:59:59' ]);
        }
        else $query = Inbox::find()->where(['to' => $userId, 'deleted' => 0]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 10),
            'sort'=> ['defaultOrder' => ['date_cr'=>SORT_DESC]]
        ]);

        $inbox = Inbox::find()
            ->where(['to' => $userId,])
            ->andWhere(['not', ['deleted' => 1]])
            ->andWhere(['not', ['is_read' => 1]])
            ->count();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'inbox' => $inbox,
            'date_cr' => $date_cr,
        ]);
    }
    public function actionFavorites($date_cr = null)
    {    
        $userId = Yii::$app->user->identity->id;

        if($date_cr !== null)
        {
            $query = Inbox::find()
                ->where(['starred' => 1, 'deleted' => 0,])
                ->andWhere(['or',
                   ['LIKE', 'from', $userId],
                   ['LIKE', 'to', $userId],
                ])
                ->andFilterWhere(['between', 'date_cr', $date_cr . ' 00:00:00', $date_cr . ' 23:59:59' ]);
        }
        else $query = Inbox::find()
            ->where(['starred' => 1,'deleted' => 0])
            ->andWhere(['or',
               ['LIKE', 'from', $userId],
               ['LIKE', 'to', $userId],
            ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 10),
            'sort'=> ['defaultOrder' => ['date_cr'=>SORT_DESC]]
        ]);

        $inbox = Inbox::find()
            ->where(['to' => $userId,])
            ->andWhere(['not', ['deleted' => 1]])
            ->andWhere(['not', ['is_read' => 1]])
            ->count();

        return $this->render('favorites', [
            'dataProvider' => $dataProvider,
            'inbox' => $inbox,
            'date_cr' => $date_cr,
        ]);
    }
    public function actionSends($date_cr = null)
    {    
        $userId = Yii::$app->user->identity->id;

        if($date_cr !== null)
        {
            $query = Inbox::find()
                ->where(['from' => $userId])->andWhere(['not', ['deleted' => 1]])
                ->andFilterWhere(['between', 'date_cr', $date_cr . ' 00:00:00', $date_cr . ' 23:59:59' ]);
        }
        else $query = Inbox::find()->where(['from' => $userId])->andWhere(['not', ['deleted' => 1]]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 10),
            'sort'=> ['defaultOrder' => ['date_cr'=>SORT_DESC]]
        ]);

        $inbox = Inbox::find()
            ->where(['to' => $userId,])
            ->andWhere(['not', ['deleted' => 1]])
            ->andWhere(['not', ['is_read' => 1]])
            ->count();

        return $this->render('sends', [
            'dataProvider' => $dataProvider,
            'inbox' => $inbox,
            'date_cr' => $date_cr,
        ]);
    }

     public function actionDeleting($date_cr = null)
    {    
        $userId = Yii::$app->user->identity->id;

        if($date_cr !== null)
        {
            $query = Inbox::find()
                ->where(['deleted' => 1,])
                ->andWhere(
                ['or',
                   ['LIKE', 'from', $userId],
                   ['LIKE', 'to', $userId],
                ])
                ->andFilterWhere(['between', 'date_cr', $date_cr . ' 00:00:00', $date_cr . ' 23:59:59' ]);
        }
        else $query = Inbox::find()
            ->where(['deleted' => 1,])
            ->andWhere(
            ['or',
               ['LIKE', 'from', $userId],
               ['LIKE', 'to', $userId],
            ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 10),
            'sort'=> ['defaultOrder' => ['date_cr'=>SORT_DESC]]
        ]);

        $inbox = Inbox::find()
            ->where(['to' => $userId,])
            ->andWhere(['not', ['deleted' => 1]])
            ->andWhere(['not', ['is_read' => 1]])
            ->count();

        return $this->render('deleting', [
            'dataProvider' => $dataProvider,
            'inbox' => $inbox,
            'date_cr' => $date_cr,
        ]);
    }

    /**
     * Displays a single Inbox model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $model->is_read = 1;
        $model->save(false);
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> $model->title,
                    'forceReload'=>'#inbox-pjax',
                    'content'=>$this->renderAjax('view', [
                        'model' =>$model ,
                    ]),
                    'footer'=> Html::button('Закрыть',['class'=>'btn btn-info pull-right','data-dismiss'=>"modal"])
                    
                            
                ];  
        
        }else{
            return $this->render('view', [
                'model' => $model,
            ]);
        }
    }

    public function actionView1($id)
    {   
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Сообщения",
                    'forceReload'=>'#inbox-pjax',
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Закрыть',['class'=>'btn btn-info pull-right','data-dismiss'=>"modal"])
                            
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }
    public function actionSetStar($id)
    {   
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        if($model->starred === 1) $model->starred = 0;
        else $model->starred = 1;
        $model->save(false);
    }

    /**
     * Creates a new Inbox model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Inbox();
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
        if ($model->load($request->post()) && $model->validate()) {
               foreach ($request->post()['Inbox']['users'] as $user) 
                {
                    $inbox = new Inbox();
                    $inbox->title = $model->title;
                    $inbox->text = $model->text;
                    $inbox->to = $user;
                    if($inbox->save(false))
                    {
                        $model->files = UploadedFile::getInstance($model, 'files');
                        if(!empty($model->files)) {
                            $model->files->saveAs('uploads/inbox/'.$inbox->id.'.'.$model->files->extension);
                            Yii::$app->db->createCommand()->update('inbox', 
                                [ 'file' => $inbox->id.'.'.$model->files->extension ], 
                                [ 'id' => $inbox->id ])
                            ->execute();
                        }                    
                    }                
                }

                 return [
                    'title'=> "Курсы",
                    'content'=>'<span class="text-success">Успешно выполнено</span>',
                    'footer'=> Html::button('Ок',['class'=>'btn btn-primary pull-left','data-dismiss'=>"modal"]).
                            Html::a('Создать ещё',['create'],['class'=>'btn btn-info','role'=>'modal-remote'])
                ];
            } else 
               return [
                    'title'=> "Update Inbox #".$id,
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ]; 
            } 
       
        else
        {
           return $this->render('create', [
                    'model' => $model,
                ]); 
        }
    }

    /**
     * Updates an existing Inbox model.
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
                    'title'=> "Update Inbox #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Inbox #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update Inbox #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
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

    //Скачать документы
    public function actionDownloadFile($id)
    {
        $model = Inbox::findOne($id);
        return \Yii::$app->response->sendFile('uploads/inbox/'.$model->file);
    }

    /**
     * Delete an existing Inbox model.
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
            return ['forceClose'=>true,'forceReload'=>'#inbox-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }

    public function actionCheckDelete($id)
    {
        $request = Yii::$app->request;
        $inbox = Inbox::findOne($id);
        $inbox->is_read = 1;
        $inbox->deleted = 1;
        $inbox->save(false);
        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#inbox-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
    }

     /**
     * Delete multiple existing Inbox model.
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
     * Finds the Inbox model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inbox the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inbox::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAlerts()
    {    
        $userId = Yii::$app->user->identity->id;
        $query = Alerts::find()->where([/*'status' => 1,*/ 'user_id' => $userId]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
        ]);

        return $this->render('alerts', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewAlert($id)
    {
        $request = Yii::$app->request;
        $alert = Alerts::findOne($id);
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'title'=> "Уведомления",
            'size' => 'normal',
            'content'=>$this->renderAjax('view-alert', [
                'model' => $alert,
            ]),
            //'footer'=> Html::button('OK',['class'=>'btn btn-primary','data-dismiss'=>"modal"])
            'footer'=>Html::a('Просмотр',['/orders/view','id'=>$alert->order_id],['class'=>'btn btn-info', /*'data-dismiss'=>"modal",*/ 'data-pjax'=>'0'])
        ];
    }

    public function actionDeleteAlert($id)
    {
        $request = Yii::$app->request;
        Alerts::findOne($id)->delete();
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
    }
}