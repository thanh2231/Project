<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Newuser $model */
/** @var ActiveForm $form */
$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-register">
<h1><?php echo Html::encode($this->title)?></h1>
    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>
        <?= $form->field($model, 'username',['inputOptions' => [
'autocomplete' => 'off']])->textInput() ?>
        <?= $form->field($model, 'password',['inputOptions' => [
'autocomplete' => 'off']])->passwordInput() ?>   
        <?= $form->field($model, 'email',['inputOptions' => [
            'autocomplete' => 'off']],['inputOptions' => ['type'=>'email']]) ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-register -->
