<?php
namespace app\controllers;

use app\models\Address;
use yii\rest\ActiveController;

class AddressController extends ActiveController
{
    public $modelClass = Address::class;
}