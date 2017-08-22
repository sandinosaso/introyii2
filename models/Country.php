<?php

namespace app\models;

use yii\db\ActiveRecord;

class Country extends ActiveRecord
{
    public static function tableName()
    {
        return 'country';
    }

    public function getCities() {
      return $this->hasMany(City::className(), ['country_code' => 'code']);
    }

}