<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Newuser $model */

$this->title = 'Update Newuser: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Newusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="newuser-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
