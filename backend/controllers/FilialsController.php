<?php

namespace backend\controllers;

use Yii;
use backend\models\Filials;
use backend\models\FilialsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\web\UploadedFile;
use yii\helpers\Html;
use backend\models\Districts;
use backend\models\Regions;
/**
 * FilialsController implements the CRUD actions for Filials model.
 */
class FilialsController extends Controller
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
     * Lists all Filials models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new FilialsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Filials model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Филиал",
                    'size'=>'large',
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Отмена',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Изменить',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }
     public function actionColumns()
    {
        $request = Yii::$app->request;
        Yii::$app->response->format = Response::FORMAT_JSON;
        $session = Yii::$app->session;
   
        if($request->post()){
            $post = $request->post();
            Filials::ColumnsFilials($post);
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
                'footer'=> Html::button('Отмена',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                           Html::button('Сохранить',['class'=>'btn btn-primary','type'=>"submit"])
            ];         
        }       
    }

    /**
     * Creates a new Filials model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Filials();  
        $model->company_id=Yii::$app->user->identity->company_id;
        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
           if($model->load($request->post()) && $model->save()){
                $model->image = UploadedFile::getInstance($model,'image');
                if(!empty($model->image))
                {
                    $model->image->saveAs('uploads/filial_logos/' . $model->id.'.'.$model->image->extension);
                    Yii::$app->db->createCommand()->update('filials', ['logo' => $model->id.'.'.$model->image->extension], [ 'id' => $model->id ])->execute();
                }
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Филиалы",
                    'content'=>'<span class="text-success">Успешно выполнено</span>',
                    'footer'=> Html::button('Ок',['class'=>'btn btn-primary pull-left','data-dismiss'=>"modal"]).
                            Html::a('Создать ещё',['create'],['class'=>'btn btn-info','role'=>'modal-remote'])
                ];
                // return [
                //     'forceReload'=>'#crud-datatable-pjax',
                //     'forceClose'=>true
        
                // ];         
            }else{           
                return [
                    'title'=> "Создать",
                    'size'=>'large',
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Отмена',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
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

    /**
     * Updates an existing Filials model.
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
            if($model->load($request->post()) && $model->save()){
                $model->image = UploadedFile::getInstance($model,'image');
                if(!empty($model->image))
                {
                    if($model->logo!=""&&$model->logo!=null)
                    {
                        unlink("uploads/filial_logos/" . $model->logo);
                    }
                    $model->image->saveAs('uploads/filial_logos/' . $model->id.'.'.$model->image->extension);
                    Yii::$app->db->createCommand()->update('filials', ['logo' => $model->id.'.'.$model->image->extension], [ 'id' => $model->id ])->execute();
                }
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'size'=>'large',
                    'title'=> "Филиал #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Отмена',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Изменить',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Изменить",
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Отмена',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
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
     * Delete an existing Filials model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        if($id!=1)
        {
            $model=$this->findModel($id);
            if($model->logo!=""&&$model->logo!=null)
            {
                unlink("uploads/filial_logos/" . $model->logo);
            }
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
    public function actionDistricts($id)
    {  
        $datas = Regions::find()->where(['id' => $id])->one();
        $district = Districts::find()->where(['region_id' => $datas->id])->all();
        foreach ($district as $value) { 
            echo "<option value = '".$value->id."'>".$value->name."</option>" ;            
        }
    }
     /**
     * Delete multiple existing Filials model.
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
            if($pk!=1)
            {
                $model = $this->findModel($pk);
                if($model->logo!=""&&$model->logo!=null)
                {
                    unlink("uploads/filial_logos/" . $model->logo);
                }
                $model->delete();
            }
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
     * Finds the Filials model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Filials the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Filials::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
