<?php 
namespace app\controllers;

use app\models\Client;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class ClientController extends ActiveController
{
   public $modelClass = Client::class;
}

?>