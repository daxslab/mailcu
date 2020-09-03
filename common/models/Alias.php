<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "alias".
 *
 * @property string $name
 *
 * @property User[] $users
 */
class Alias extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['name'], 'required'],
            [['name'], 'email'],
            [['name'], 'unique'],
            [['users'], 'safe'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ]);
    }

    public function getUsers()
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])
            ->viaTable('user_alias', ['alias_id' => 'id']);
    }

    public function setUsers($value)
    {
        $this->users = $value;
    }

    public function afterSave($insert, $changedAttributes)
    {

        parent::afterSave($insert, $changedAttributes);

        if ($this->isNewRecord) {
            $initial_users = [];
        } else {
            $initial_users = Yii::$app->db->createCommand('SELECT user_id from user_alias WHERE alias_id = :alias_id', ['alias_id' => $this->id])->queryColumn();
        }

        if ($this->users && is_object($this->users[0])) {
            $new_users = [];
            foreach ($this->users as $user_object) {
                $new_users[] = $user_object->id;
            }
        } else {
            $new_users = is_array($this->users) ? $this->users : [];
        }

        $removed_users_ids = array_diff($initial_users, $new_users);
        foreach ($removed_users_ids as $user) {
            Yii::$app->db->createCommand()->delete('user_alias', [
                'user_id' => $user,
                'alias_id' => $this->id,
            ])->execute();
        }

        $included_users_ids = array_diff($new_users, $initial_users);
        foreach ($included_users_ids as $user) {
            Yii::$app->db->createCommand()->insert('user_alias', [
                'user_id' => $user,
                'alias_id' => $this->id,
            ])->execute();
        }
    }

    /**
     * {@inheritdoc}
     * @return AliasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AliasQuery(get_called_class());
    }
}
