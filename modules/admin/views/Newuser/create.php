<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Newuser $model */

$this->title = 'Create Newuser';
$this->params['breadcrumbs'][] = ['label' => 'Newusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newuser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
