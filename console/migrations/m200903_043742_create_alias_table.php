<?php

/**
 * Handles the creation of table `{{%alias}}`.
 */
class m200903_043742_create_alias_table extends console\migrations\Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%alias}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%alias}}');
    }
}
