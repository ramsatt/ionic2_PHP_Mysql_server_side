<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\members */

$this->title = 'Update Members: ' . $model->mem_mid;
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mem_mid, 'url' => ['view', 'id' => $model->mem_mid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="members-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
