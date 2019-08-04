<?php

namespace backend\controllers;

use Yii;
use backend\models\Courses;
use backend\models\CoursesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use common\models\User;
use yii\data\ActiveDataProvider;

/**
 * CoursesController implements the CRUD actions for Courses model.
 */
class CoursesController extends Controller
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
     * Lists all Courses models.
     * @return mixed
     */
    public function actionIndex()
    {    
         if(Yii::$app->request->isAjax && $_POST['CoursesSearch']['search'] == '1')
       {    
        
            $query = Courses::find();
            $dataProvider = new ActiveDataProvider([
            'query' => $query,
            ]);
            $name=$_POST['CoursesSearch']['name'];
            $subject_id=$_POST['CoursesSearch']['subject_id'];
            $user_id=$_POST['CoursesSearch']['user_id'];
            $company_id=$_POST['CoursesSearch']['company_id'];
            $begin_date=($_POST['CoursesSearch']['begin_date'])?\Yii::$app->formatter->asDate($_POST['CoursesSearch']['begin_date'], 'php:Y-m-d'):"";;
            $end_date=($_POST['CoursesSearch']['end_date'])?\Yii::$app->formatter->asDate($_POST['CoursesSearch']['end_date'], 'php:Y-m-d'):"";;
            $prosent_for_teacher=$_POST['CoursesSearch']['prosent_for_teacher'];
            $cost=$_POST['CoursesSearch']['cost'];
            $filial_id=$_POST['CoursesSearch']['filial_id'];
           

            if(isset($name) || isset($subject_id) || isset($user_id) || isset($company_id)
                || isset($begin_date) || isset($end_date) || isset($prosent_for_teacher) || isset($cost) ||isset($filial_id) ||isset($user_id))
            {
                $query->joinWith('company');                
                $query->joinWith('subject');
                $query->joinWith('filial');
                $query->joinWith('user');

                $query->andFilterWhere(['like', 'courses.name', $name])
                        ->andFilterWhere(['like', 'subjects.name', $subject_id])
                        ->andFilterWhere(['like', 'user.fio', $user_id])
                        ->andFilterWhere(['like', 'courses.begin_date', $begin_date])
                        ->andFilterWhere(['like', 'courses.end_date', $end_date])
                        ->andFilterWhere(['like', 'courses.prosent_for_teacher', $prosent_for_teacher])
                        ->andFilterWhere(['like', 'courses.cost', $cost])
                        ->andFilterWhere(['like', 'filials.filial_name', $filial_id])
                        ->andFilterWhere(['like', 'companies.name', $company_id]);

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
        $searchModel=new CoursesSearch();
        $query = Courses::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return  $this->render('index',[
            'searchModel'=>$searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Courses model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Курсы ",
                    'content'=>$this->renderAjax('view', [
                    'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Отмена',['class'=>'btn btn-default pull-left',
                                'data-dismiss'=>"modal"]).
                            Html::a('Зарегистрируйтесь!',['update','id'=>$id],['class'=>'btn btn-primary',
                                'role'=>'modal-remote'])
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
            Courses::ColumnsCourses($post);
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
     * Creates a new Courses model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Courses();  
        $model->company_id=Yii::$app->user->identity->company_id;
        $model->filial_id=Yii::$app->user->identity->filial_id;
        $model->user_id=Yii::$app->user->identity->id;
        
        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Курсы",
                    'content'=>'<span class="text-success">Успешно выполнено</span>',
                    'footer'=> Html::button('Ок',['class'=>'btn btn-primary pull-left',
                        'data-dismiss'=>"modal"]).
                            Html::a('Создать ещё',['create'],['class'=>'btn btn-info',
                                'role'=>'modal-remote'])
                ];
                // return [
                //     'forceReload'=>'#crud-datatable-pjax',
                //     'forceClose'=>true
                // ];         
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

    /**
     * Updates an existing Courses model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       
        $model->begin_date=User::getDAte($model->begin_date);
        $model->end_date=User::getDAte($model->end_date);
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
                        'data-dismiss'=>"modal"]).Html::button('Сохранить',['class'=>'btn btn-primary',
                        'type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Курсы #".$id,
                    'content'=>$this->renderAjax('view', [
                    'model' => $model,
                    ]),
                    'footer'=> Html::button('Отмена',['class'=>'btn btn-default pull-left',
                        'data-dismiss'=>"modal"]).
                                Html::a('Изменить',['update','id'=>$id],['class'=>'btn btn-primary',
                        'role'=>'modal-remote'])
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
     * Delete an existing Courses model.
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
     * Delete multiple existing Courses model.
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
     * Finds the Courses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Courses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Courses::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
