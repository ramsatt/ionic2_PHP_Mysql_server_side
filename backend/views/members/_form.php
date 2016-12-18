<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\members */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="members-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mem_first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mem_last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mem_email')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mem_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mem_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mem_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mem_country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mem_postal_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
