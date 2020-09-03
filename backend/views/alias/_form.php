<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Alias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'users')->widget(\kartik\select2\Select2::class, [
        'data' => yii\helpers\ArrayHelper::map(User::find()->all(), 'id', 'name'),
        'options' => ['multiple' => 'true']
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
