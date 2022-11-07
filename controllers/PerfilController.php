<?php
namespace app\controllers;

use app\models\Perfil;
use yii\rest\ActiveController;

class PerfilController extends ActiveController
{
    public $modelClass = Perfil::class;
}

?>