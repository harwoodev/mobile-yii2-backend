<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\rest\Controller;
use yii\web\Response;
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
                    'login',
                ],
            ],
        ];
    }

    public function actionLogin()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $req = Yii::$app->request;
        if ($req->isPost) {
            // sanitize input -- not implemented
            $username = $req->post('username');
            $password = $req->post('password');

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
            ];
        }
        throw new \yii\web\NotFoundHttpException();
    }

    public function actionSuccess()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'success' => true
        ];
    }
}
