<?php

use yii\helpers\Html;

/* @var $module \Da\User\Module */

$this->title = Yii::t('usuario', 'Privacy settings');

?>

<div class="row">
    <div class="col-md-3">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-9">
        <div class="card">
            <h3 class="card-header h5"><?= Html::encode($this->title) ?></h3>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h3><?= Yii::t('usuario', 'Export my data') ?></h3>
                        <p><?= Yii::t(
                                'usuario',
                                'Here you can download your personal data in a comma separated values format.'
                            ) ?>
                        </p>
                        <?= Html::a(Yii::t('usuario', 'Download my data'),
                            ['/user/settings/export'],
                            [
                                'class' => 'btn btn-info',
                                'target' => '_blank'
                            ])
                        ?>
                    </div>
                    <div class="col-md-6">
                        <h3><?= Yii::t('usuario', 'Delete my account') ?></h3>
                        <p><?= Yii::t(
                                'usuario',
                                'This will remove your personal data from this site. You will no longer be able to sign in.'
                            ) ?>
                        </p>
                        <?php if ($module->allowAccountDelete): ?>
                            <?= Html::a(
                                Yii::t('usuario', 'Delete account'),
                                ['delete'],
                                [
                                    'id' => 'gdpr-del-button',
                                    'class' => 'btn btn-danger',
                                    'data-method' => 'post',
                                    'data-confirm' => Yii::t('usuario', 'Are you sure? There is no going back'),
                                ]
                            ) ?>
                        <?php else:
                            echo Html::a(Yii::t('usuario', 'Delete'),
                                ['/user/settings/gdpr-delete'],
                                [
                                    'class' => 'btn btn-danger',
                                    'id' => 'gdpr-del-button',

                                ])
                            ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
