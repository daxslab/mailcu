<?php

# use yii\db\Migration;

/**
 * Handles the creation of table `{{%domain}}`.
 */
class m200903_135842_create_domain_table extends console\migrations\Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%domain}}', [
            'id' => $this->primaryKey(),
            'nick' => $this->string()->notNull()->unique(),
            'fullname' => $this->string(),
            'domain' => $this->string()->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%domain}}');
    }
}
