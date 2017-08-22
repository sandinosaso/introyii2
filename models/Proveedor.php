<?php

namespace app\models;

use yii\db\ActiveRecord;

class Proveedor extends ActiveRecord
{
    public static function tableName()
    {
        return 'proveedor';
    }

    public function getClientes() {
      return $this->hasMany(Cliente::className(), ['id' => 'id_cliente'])
                  ->viaTable('cliente_proveedor', ['id_proveedor' => 'id']);
    }

}