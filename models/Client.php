<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%client}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $lastName
 * @property int|null $address_ID
 * @property int|null $perfil_ID
 *
 * @property Address $address
 * @property Perfil $perfil
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%client}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address_ID', 'perfil_ID'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['lastName'], 'string', 'max' => 60],
            [['address_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Address::class, 'targetAttribute' => ['address_ID' => 'id']],
            [['perfil_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::class, 'targetAttribute' => ['perfil_ID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'lastName' => 'Last Name',
            'address_ID' => 'Address ID',
            'perfil_ID' => 'Perfil ID',
        ];
    }

    /**
     * Gets query for [[Address]].
     *
     * @return \yii\db\ActiveQuery|AddressQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::class, ['id' => 'address_ID']);
    }

    /**
     * Gets query for [[Perfil]].
     *
     * @return \yii\db\ActiveQuery|PerfilQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::class, ['id' => 'perfil_ID']);
    }

    /**
     * {@inheritdoc}
     * @return ClientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClientQuery(get_called_class());
    }
}
