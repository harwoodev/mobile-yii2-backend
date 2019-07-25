<?php

namespace app\modules\hms\controllers;

use Yii;
use yii\rest\Controller;
use yii\helpers\Json;
use yii\filters\VerbFilter;

use sizeg\jwt\Jwt;
use sizeg\jwt\JwtHttpBearerAuth;

use app\modules\hms\models\MedicalApp;

class DefaultController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'authenticator' => [
                'class' => JwtHttpBearerAuth::class,
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['POST'],
                ],
            ]
        ];
    }

    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $req = Yii::$app->request;
        $data = Json::decode($req->getRawBody());
        $model = new MedicalApp();

        if ($model->load($data)) {
            return $model;
        }
    }
}
