<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use daxslab\behaviors\UploaderBehavior;
use yii\db\Expression;
use yii\helpers\Html;
use yii\helpers\Inflector;

/**
 * This is the model class for table "alias".
 *
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $creator
 * @property User $editor
 */
class ActiveRecord extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            BlameableBehavior::class => [
                'class' => BlameableBehavior::class,
            ],
            TimestampBehavior::class => [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * Gets query for [[Creator]].
     *
     * @return \yii\db\ActiveQuery|Da\User\Query\UserQuery
     */
    public function getCreator()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Editor]].
     *
     * @return \yii\db\ActiveQuery|Da\User\Query\UserQuery
     */
    public function getEditor()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
