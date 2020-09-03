<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "domain".
 *
 * @property int $id
 * @property string $nick
 * @property string|null $fullname
 * @property string $domain
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Domain extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'domain';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['nick', 'domain'], 'required'],
            [['nick', 'fullname', 'domain'], 'string', 'max' => 255],
            [['nick'], 'unique'],
            [['domain'], 'unique'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'id' => Yii::t('app', 'ID'),
            'nick' => Yii::t('app', 'Nick'),
            'fullname' => Yii::t('app', 'Fullname'),
            'domain' => Yii::t('app', 'Domain'),
        ]);
    }

    /**
     * {@inheritdoc}
     * @return DomainQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DomainQuery(get_called_class());
    }
}
