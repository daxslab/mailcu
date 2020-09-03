<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_alias}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%alias}}`
 */
class m200903_050007_create_junction_table_for_user_and_alias_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_alias}}', [
            'user_id' => $this->integer(),
            'alias_id' => $this->integer(),
            'PRIMARY KEY(user_id, alias_id)',
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_alias-user_id}}',
            '{{%user_alias}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_alias-user_id}}',
            '{{%user_alias}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `alias_id`
        $this->createIndex(
            '{{%idx-user_alias-alias_id}}',
            '{{%user_alias}}',
            'alias_id'
        );

        // add foreign key for table `{{%alias}}`
        $this->addForeignKey(
            '{{%fk-user_alias-alias_id}}',
            '{{%user_alias}}',
            'alias_id',
            '{{%alias}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_alias-user_id}}',
            '{{%user_alias}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_alias-user_id}}',
            '{{%user_alias}}'
        );

        // drops foreign key for table `{{%alias}}`
        $this->dropForeignKey(
            '{{%fk-user_alias-alias_id}}',
            '{{%user_alias}}'
        );

        // drops index for column `alias_id`
        $this->dropIndex(
            '{{%idx-user_alias-alias_id}}',
            '{{%user_alias}}'
        );

        $this->dropTable('{{%user_alias}}');
    }
}
