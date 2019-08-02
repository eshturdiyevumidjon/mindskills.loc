<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use \yii\web\Response;
use yii\helpers\Html;
use yii\data\ActiveDataProvider;


/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {    
        return "";
    }
    public function actionTeacher()
    {    
        if(Yii::$app->request->isAjax && $_POST['search'] == '1')
       {    
            $query = User::find()->where(['type'=>2]);
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
            $birthday=($_POST['UserSearch']['birthday'])?\Yii::$app->formatter->asDate($_POST['UserSearch']['birthday'], 'php:Y-m-d'):"";
            $filial_id=$_POST['filial_id'];
            $company_id=$_POST['company_id'];
            $fio=$_POST['UserSearch']['fio'];
            $username=$_POST['UserSearch']['username'];
            $phone=$_POST['UserSearch']['phone'];
            $status=$_POST['status'];
            $balanc=$_POST['UserSearch']['balanc'];
           
            if(isset($birthday) || isset($status) || isset($filial_id) || isset($company_id)
                || isset($fio) || isset($username) ||isset($phone) || isset($balanc))
            {
                    $query->andFilterWhere([
                         
                        'balanc' => $balanc,
                        'status' => $status,
                        'filial_id' => $filial_id,
                        'company_id' => $company_id
                    ]);

                    $query->andFilterWhere(['like', 'fio', $fio])
                            ->andFilterWhere(['like', 'username', $username])
                            ->andFilterWhere(['like', 'birthday', $birthday])
                        ->andFilterWhere(['like', 'phone', $phone]);
                       
                     
                     return $this->renderAjax('tbody', [
                    'type'=>2,
                    'dataProvider' => $dataProvider,
                    
                    'searchModel'=>$searchModel,

                ]);
            }
            else
            return $this->renderAjax('tbody', [
            'type'=>2,
            'dataProvider' => $dataProvider,
            
            'searchModel'=>$searchModel,

        ]); 
        }


        $searchModel=new UserSearch();
        $query = User::find()->where(['type'=>2]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return  $this->render('index',[
            'type' => 2,
            'searchModel'=>$searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionAdmin()
    {    
       
        if(Yii::$app->request->isAjax && $_POST['UserSearch']['search'] == '1')
       {    
            
            $query = User::find()->where(['type'=>1]);
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
            $birthday=($_POST['UserSearch']['birthday'])?\Yii::$app->formatter->asDate($_POST['UserSearch']['birthday'], 'php:Y-m-d'):"";
            $filial_id=$_POST['filial_id'];
            $company_id=$_POST['company_id'];
            $fio=$_POST['UserSearch']['fio'];
            $username=$_POST['UserSearch']['username'];
            $phone=$_POST['UserSearch']['phone'];
            $status=$_POST['status'];
            $balanc=$_POST['UserSearch']['balanc'];
           
            if(isset($birthday) || isset($status) || isset($filial_id) || isset($company_id)
                || isset($fio) || isset($username) ||isset($phone) || isset($balanc))
            {
                    $query->andFilterWhere([
                         
                        'balanc' => $balanc,
                        'status' => $status,
                        'filial_id' => $filial_id,
                        'company_id' => $company_id
                    ]);

                    $query->andFilterWhere(['like', 'fio', $fio])
                            ->andFilterWhere(['like', 'username', $username])
                            ->andFilterWhere(['like', 'birthday', $birthday])
                        ->andFilterWhere(['like', 'phone', $phone]);
                       
                     
                     return $this->renderAjax('tbody', [
                    'type'=>1,
                    'dataProvider' => $dataProvider,
                    'searchModel'=>$_POST['UserSearch'],
                    'post'=>$_POST,
                ]);
            }
            else
            return $this->renderAjax('tbody', [
            'type'=>1,
            'dataProvider' => $dataProvider,
            'post'=>$_POST,
            'searchModel'=>$_POST['UserSearch'],

        ]); 
        }


        $searchModel=new UserSearch();
        $query = User::find()->where(['type'=>1]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return  $this->render('index',[
            'type' => 1,
            'searchModel'=>$searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
   
    public function actionPupil()
    {    
        if(Yii::$app->request->isAjax && $_POST['search'] == '1')
       {    
            $query = User::find()->where(['type'=>3]);
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
            $birthday=($_POST['UserSearch']['birthday'])?\Yii::$app->formatter->asDate($_POST['UserSearch']['birthday'], 'php:Y-m-d'):"";
            $filial_id=$_POST['filial_id'];
            $company_id=$_POST['company_id'];
            $fio=$_POST['UserSearch']['fio'];
            $username=$_POST['UserSearch']['username'];
            $phone=$_POST['UserSearch']['phone'];
            $status=$_POST['status'];
            $balanc=$_POST['UserSearch']['balanc'];
           
            if(isset($birthday) || isset($status) || isset($filial_id) || isset($company_id)
                || isset($fio) || isset($username) ||isset($phone) || isset($balanc))
            {
                    $query->andFilterWhere([
                         
                        'balanc' => $balanc,
                        'status' => $status,
                        'filial_id' => $filial_id,
                        'company_id' => $company_id
                    ]);

                    $query->andFilterWhere(['like', 'fio', $fio])
                            ->andFilterWhere(['like', 'username', $username])
                            ->andFilterWhere(['like', 'birthday', $birthday])
                        ->andFilterWhere(['like', 'phone', $phone]);
                       
                     
                     return $this->renderAjax('tbody', [
                    'type'=>3,
                    'dataProvider' => $dataProvider,
                    'searchModel'=>$searchModel,

                ]);
            }
            else
            return $this->renderAjax('tbody', [
            'type'=>3,
            'dataProvider' => $dataProvider,
            'searchModel'=>$searchModel,

        ]); 
        }


        $searchModel=new UserSearch();
        $query = User::find()->where(['type'=>3]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return  $this->render('index',[
            'type' => 3,
            'searchModel'=>$searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionChange($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       
        if ($model->birthday!=null) {
          $model->birthday=\Yii::$app->formatter->asDate($model->birthday, 'php:d.m.Y');
        }
        else{
            $model->birthday="";
        }
        
        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($model->load($request->post()) && $model->save()){
                
                $model->photoOfUser = UploadedFile::getInstance($model,'photoOfUser');
                if(!empty($model->photoOfUser))
                {
                    if($model->image!=""&&$model->image!=null)
                    {
                        unlink("uploads/avatar/" . $model->image);
                    }
                    $model->photoOfUser->saveAs('uploads/avatar/' . $model->id.'.'.$model->photoOfUser->extension);
                    Yii::$app->db->createCommand()->update('user', ['image' => $model->id.'.'.$model->photoOfUser->extension], [ 'id' => $model->id ])->execute();
                }
                
                return [
                    'forceReload'=>'#profile-pjax',
                    'forceClose'=>true
                ];    
            }else{
                 return [
                    'title'=> "Профиль",
                    'size' => "large",
                    'content'=>$this->renderAjax('change', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Отмена',['class'=>'btn btn-primary pull-left','data-dismiss'=>"modal"]).
                                Html::button('Сохранить',['class'=>'btn btn-info','type'=>"submit"])
                ];        
            }
        }
        else{
            echo "ddd";
        }
    }
    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Пользователь",
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
    public function actionProfile()
    {
        $user=$this->findModel(Yii::$app->user->identity->id);
        return $this->render('profile',['user'=>$user]);
    }
    /**
     * Creates a new User model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($type)
    {
        $request = Yii::$app->request;
        $model = new User();  
        $model->type=$type;
        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($model->load($request->post()) && $model->save()){
                $model->photoOfUser = UploadedFile::getInstance($model,'photoOfUser');
                if(!empty($model->photoOfUser))
                {
                    $model->photoOfUser->saveAs('uploads/avatar/' . $model->id.'.'.$model->photoOfUser->extension);
                    Yii::$app->db->createCommand()->update('user', ['image' => $model->id.'.'.$model->photoOfUser->extension], [ 'id' => $model->id ])->execute();
                }
                 return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Пользователь",
                    'content'=>'<span class="text-success">Успешно выполнено</span>',
                    'footer'=> Html::button('Ок',['class'=>'btn btn-primary pull-left','data-dismiss'=>"modal"]).
                            Html::a('Создать ещё',['create','type'=>$type],['class'=>'btn btn-info','role'=>'modal-remote'])
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
  
    public function actionColumns()
    {
        $request = Yii::$app->request;
        
        Yii::$app->response->format = Response::FORMAT_JSON;
        $session = Yii::$app->session;
        
        if($request->post()){
            $post = $request->post();
            User::ColumnsUser($post);
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
     * Updates an existing User model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       
        
        if ($model->birthday!=null) {
          $model->birthday=\Yii::$app->formatter->asDate($model->birthday, 'php:d.m.Y');
        }
        else{
            $model->birthday="";
        }
        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
           if($model->load($request->post()) && $model->save()){
                $model->photoOfUser = UploadedFile::getInstance($model,'photoOfUser');
                if(!empty($model->photoOfUser))
                {
                    if($model->image!=""&&$model->image!=null)
                    {
                        unlink("uploads/avatar/" . $model->image);
                    }
                    $model->photoOfUser->saveAs('uploads/avatar/' . $model->id.'.'.$model->photoOfUser->extension);
                    Yii::$app->db->createCommand()->update('user', ['image' => $model->id.'.'.$model->photoOfUser->extension], [ 'id' => $model->id ])->execute();
                }
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Пользователь",
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Отмена',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Изменить',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Изменить",
                    'size'=>'large',
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
     * Delete an existing User model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        if ($id != 1)
            {
                $model=$this->findModel($id);
                 if($model->image!=""&&$model->image!=null)
                {
                    unlink("uploads/avatar/" . $model->image);
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

     /**
     * Delete multiple existing User model.
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
            if ($pk != 1)
                {
                    $model = $this->findModel($pk);
                    if($model->image!=""&&$model->image!=null)
                    {
                        unlink("uploads/avatar/" . $model->image);
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
