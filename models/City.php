<?php

namespace app\models;

use yii\db\ActiveRecord;

class City extends ActiveRecord
{
    public static function tableName()
    {
        return 'city';
    }

    public function getCountry() {
      return $this->hasOne(Country::className(), ['code' => 'country_code']);
    }

}