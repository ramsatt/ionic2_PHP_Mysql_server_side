<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\membersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="members-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mem_mid') ?>

    <?= $form->field($model, 'mem_first_name') ?>

    <?= $form->field($model, 'mem_last_name') ?>

    <?= $form->field($model, 'mem_email') ?>

    <?= $form->field($model, 'mem_mobile') ?>

    <?php // echo $form->field($model, 'mem_city') ?>

    <?php // echo $form->field($model, 'mem_state') ?>

    <?php // echo $form->field($model, 'mem_country') ?>

    <?php // echo $form->field($model, 'mem_postal_code') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
