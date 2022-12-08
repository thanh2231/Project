<?php

namespace app\modules\admin\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [
                    '*'
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [
                            '@'
                        ],
                        //                         'matchCallback' => function ($rule, $action) {
        //                             $arr = [
            //                                 'product',
            //                                 'site'
            //                             ];
        //                             return in_array(Yii::$app->controller->id, $arr);
        //                         }
                    ]
                ]
            ]
        ];
    }
    
    public $layout = "main";
}
