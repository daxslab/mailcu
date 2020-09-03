<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @inheritDoc
 * @property Alias[] aliases
 */
class User extends \Da\User\Model\User
{
    public function getName()
    {
        return $this->profile->name != ''
            ? $this->profile->name
            : $this->username;
    }

    public function getAliases()
    {
        return $this->hasMany(Alias::class, ['id' => 'alias_id'])
            ->viaTable('user_alias', ['user_id' => 'id']);
    }

    public function setAliases($value)
    {
        $this->aliases = $value;
    }

    public function afterSave($insert, $changedAttributes)
    {

        parent::afterSave($insert, $changedAttributes);

        if ($this->isNewRecord) {
            $initial_aliases = [];
        } else {
            $initial_aliases = Yii::$app->db->createCommand('SELECT alias_id from user_alias WHERE user_id = :user_id', ['user_id' => $this->id])->queryColumn();
        }

        if ($this->aliases && is_object($this->aliases[0])) {
            $new_aliases = [];
            foreach ($this->aliases as $user_object) {
                $new_aliases[] = $user_object->id;
            }
        } else {
            $new_aliases = is_array($this->aliases) ? $this->aliases : [];
        }

        $removed_aliases_ids = array_diff($initial_aliases, $new_aliases);
        foreach ($removed_aliases_ids as $alias) {
            Yii::$app->db->createCommand()->delete('user_alias', [
                'user_id' => $this->id,
                'alias_id' => $alias,
            ])->execute();
        }

        $included_aliases_ids = array_diff($new_aliases, $initial_aliases);
        foreach ($included_aliases_ids as $alias) {
            Yii::$app->db->createCommand()->insert('user_alias', [
                'user_id' => $this->id,
                'alias_id' => $alias,
            ])->execute();
        }
    }
}
