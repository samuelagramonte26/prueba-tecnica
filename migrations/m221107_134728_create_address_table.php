<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%address}}`.
 */
class m221107_134728_create_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%address}}', [
            'id' => $this->primaryKey(),
            'street'=>$this->string(100),
            'sector'=>$this->string(100),
            'quarter'=>$this->string(100)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%address}}');
    }
}
