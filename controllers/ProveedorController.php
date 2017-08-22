<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Proveedor;
use yii\data\ActiveDataProvider;

class ProveedorController extends Controller
{

    public function actionIndex()
    {
        
        $query = Proveedor::find();

        $query = $query->orderBy('name');

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $query = $query->offset($pagination->offset)
            ->limit($pagination->limit);
            
        $proveedores = $query->all();

        return $this->render('index', [
            'proveedores' => $proveedores,
            'pagination' => $pagination
        ]);
    }
}