<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Domain]].
 *
 * @see Domain
 */
class DomainQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Domain[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Domain|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
