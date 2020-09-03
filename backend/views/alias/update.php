<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Alias */

$this->title = Yii::t('app', 'Update Alias: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aliases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="alias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php var_dump(yii\helpers\ArrayHelper::getColumn($model->getUsers()->all(), 'name'));?>

</div>
