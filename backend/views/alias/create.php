<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Alias */

$this->title = Yii::t('app', 'Create Alias');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aliases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
