<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m221107_134930_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50),
            'lastName' => $this->string(60),
            'address_ID' => $this->integer(),
            'perfil_ID' => $this->integer()

        ]);
        $this->addForeignKey('FK_Client_address_address_ID', '{{%client}}', 'address_ID', '{{%address}}', 'id','CASCADE');
        $this->addForeignKey('FK_Client_perfil_perfil_ID', '{{%client}}', 'perfil_ID', '{{%perfil}}', 'id','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_Client_address_address_ID', '{{%client}}');
        $this->dropForeignKey('FK_Client_perfil_perfil_ID', '{{%client}}');

        $this->dropTable('{{%client}}');
    }
}
