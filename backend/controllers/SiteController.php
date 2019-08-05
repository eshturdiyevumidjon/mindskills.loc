<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Register;
use backend\models\Companies;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function actions()
    {
           return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */ 

    public function actionIndex()
    {
         if (Yii::$app->user->isGuest) {
            return $this->redirect(['/site/login']);
        }
            return $this->render('index');
    }
    public function actionRegister()
    {
        $model = new Register();
      
        if($model->load(Yii::$app->request->post()) && $model->register()){
            
                $modelForm=new LoginForm();
                $modelForm->username=$model->Companiesname;
                $modelForm->password=$model->password;
                $modelForm->login();

            return $this->redirect(['/site/index']);
        }
        else
        {
            return $this->render('register', ['model' => $model]); 
        }
          
    }

    /**
     * Login action.
     *
     * @return string
     */

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    public function actionLock()
    {
        
    }
    /**
     * Logout action.
     *
     * @return string
     */
    
    public function actionLogout()
    {
        Yii::$app->user->logout();

       return $this->redirect(['login']);
    }
     public function actionSetThemeValues()
    {
        $session = Yii::$app->session;
        if (isset($_GET['dark_theme'])) $session['dark_theme'] = $_GET['dark_theme'];
        if (isset($_GET['semi_dark'])) $session['semi_dark'] = $_GET['semi_dark'];
        if (isset($_GET['light'])) $session['light'] = $_GET['light'];
        if (isset($_GET['foot'])) $session['foot'] = $_GET['foot'];
        if (isset($_GET['asside'])) $session['asside'] = $_GET['asside'];
    }

    public function actionDarkTheme()
    {
        $session = Yii::$app->session;
        if($session['dark_theme'] != null) return $session['dark_theme'];
        else return 0;
    }
    public function actionSemiTheme()
    {
        $session = Yii::$app->session;
        if($session['semi_dark'] != null) return $session['semi_dark'];
        else return 0;
    }
    public function actionLight()
    {
        $session = Yii::$app->session;
        if($session['light'] != null) return $session['light'];
        else return 0;
    }
    public function actionFoot()
    {
        $session = Yii::$app->session;
        if($session['foot'] != null) return $session['foot'];
        else return 0;
    }
    public function actionAsside()
    {
        $session = Yii::$app->session;
        if($session['asside'] != null) return $session['asside'];
        else return 0;
    }
}
