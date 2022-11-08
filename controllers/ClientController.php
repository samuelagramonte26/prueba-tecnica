<?php

namespace app\controllers;

use app\models\Client;
use Yii;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class ClientController extends ActiveController
{
   public $modelClass = Client::class;
   public function actions()
   {
   }
   public function actionIndex()
   {
      try {
         return  Yii::$app->db->createCommand('SELECT client.id,name,lastname,street, quarter,sector,perfil,description FROM client left join address on address.id = address_ID join perfil on perfil.id = perfil_ID')
         ->queryAll();
      } catch (\Throwable $th) {
         return Yii::$app->getResponse()->statusCode = 400;
      }
   }
   public function actionCreate()
   {
      try {
         $name = Yii::$app->request->post("name");
         $lastname = Yii::$app->request->post("lastname");
         $perfil_ID = Yii::$app->request->post("perfil_ID");
         $address_ID = Yii::$app->request->post("address_ID");

         Yii::$app->db->createCommand()->insert('client', [
            'name' => $name,
            'lastname' => $lastname,
            'perfil_ID' => $perfil_ID,
            'address_ID' => $address_ID

         ])->execute();
         return Yii::$app->getResponse()->statusCode = 201;
      } catch (\Throwable $th) {
         return Yii::$app->getResponse()->statusCode = 400;
      }
   }
   public function actionUpdate()
   {
      try {

         $id = Yii::$app->request->get("id");
         $name = Yii::$app->request->post("name");
         $lastname = Yii::$app->request->post("lastname");
         $perfil_ID = Yii::$app->request->post("perfil_ID");
         $address_ID = Yii::$app->request->post("address_ID");

         $columns = [
            'name' => $name,
            'lastname' => $lastname,
            'perfil_ID' => $perfil_ID,
            'address_ID' => $address_ID
         ];
         Yii::$app->db->createCommand()->update('client', $columns, "id = $id")->execute();
         return Yii::$app->getResponse()->statusCode = 204;
      } catch (\Throwable $th) {
         return Yii::$app->getResponse()->statusCode = 400;
      }
   }

   public function actionDelete()
   {
      try {
         $id = Yii::$app->request->get("id");
         Yii::$app->db->createCommand("delete from client where id = $id")->execute();
         return Yii::$app->getResponse()->statusCode = 204;
      } catch (\Throwable $th) {
         return Yii::$app->getResponse()->statusCode = 400;
      }
   }
}
