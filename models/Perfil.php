<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%perfil}}".
 *
 * @property int $id
 * @property string|null $perfil
 * @property string|null $description
 *
 * @property Client[] $clients
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%perfil}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['perfil'], 'string', 'max' => 60],
            [['description'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'perfil' => 'Perfil',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Clients]].
     *
     * @return \yii\db\ActiveQuery|ClientQuery
     */
    public function getClients()
    {
        return $this->hasMany(Client::class, ['perfil_ID' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return PerfilQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PerfilQuery(get_called_class());
    }
}
