<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class DefaultAccessController extends Controller
{

    /**
     *
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [
                    '*'
                ],
                [
                    'allow' => true,
                    'actions' => ['login', 'signup'],
                    'roles' => ['?'],
                  
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [
                            '@'//['staff'],
                        ],
                       
//                         'matchCallback' => function ($rule, $action) {
//                             $arr = [
//                                 "input-order",
//                                 "product"
//                             ];
//                             return in_array(Yii::$app->controller->id, $arr);
//                         }
                    ]
                ]
            ]
        ];
    }
}