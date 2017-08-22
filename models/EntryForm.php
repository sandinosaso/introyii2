<?php

namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name', 'email'], 'required', 'on' => ['create'], 'message' => 'Please choose a username.'],
            ['email', 'email', 'on' => ['create', 'update']],
        ];
    }
}