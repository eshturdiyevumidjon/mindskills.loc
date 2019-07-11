<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class PageController extends Controller{

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

     public function actionCarousel()
    {   
            return $this->render('carousel');
    }
     public function actionMedia()
    {   
            return $this->render('media');
    }
     public function actionModal()
    {   
            return $this->render('modals');
    }
    public function actionColapsble()
    {   
            return $this->render('colapsble');
    }
    public function actionHover()
    {   
            return $this->render('hovereffect');
    }
    public function actionGalery()
    {   
            return $this->render('galery');
    }
    public function actionTodo()
    {   
            return $this->render('todo');
    }
    public function actionBlog()
    {   
            return $this->render('blog');
    }
    public function actionNets()
    {   
            return $this->render('nets');
    }
    public function actionCalendar()
    {   
            return $this->render('calendar');
    }

}