<?php

namespace app\models;

use yii\db\ActiveRecord;

class Cliente extends ActiveRecord
{
    public static function tableName()
    {
        return 'cliente';
    }

    public function getProveedores() {
      return $this->hasMany(Proveedor::className(), ['id' => 'id_proveedor'])
                  ->viaTable('cliente_proveedor', ['id_cliente' => 'id']);;
    }

}