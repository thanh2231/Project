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
}