<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Alias]].
 *
 * @see Alias
 */
class AliasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Alias[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Alias|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
