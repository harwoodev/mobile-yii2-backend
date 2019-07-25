<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\rest\Controller;
use yii\web\Response;
use yii\helpers\Json;
use yii\filters\VerbFilter;

use sizeg\jwt\Jwt;
use sizeg\jwt\JwtHttpBearerAuth;

use app\models\User;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'authenticator' => [
                'class' => JwtHttpBearerAuth::class,
                'optional' => [
                    'login', 'error'
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'login' => ['POST'],
                ],
            ]
        ];
    }

    public function actions(){
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionLogin()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $req = Yii::$app->request;
        $data = Json::decode($req->getRawBody());

        $username = $data['username'];
        $password = $data['password'];

        if (empty($username) || empty($password)) {
            throw new \yii\base\UserException("Invalid data submitted");
        }

        $user = User::login($username, $password);
        $emp = $user->emp;

        return [
            'username' => $user->username,
            'token' => $user->jwtToken,
            'fullname' => $emp->fullname,
            'firstname' => trim($emp->emp_firstname),
            'lastname' => trim($emp->emp_lastname),
            'imgUrl' => $emp->image
        ];
    }

    public function actionSuccess()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'success' => true
        ];
    }
}
