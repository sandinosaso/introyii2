<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;
use app\models\City;
use app\models\CountrySearch;
use yii\data\ActiveDataProvider;

class CountryController extends Controller
{
    public function actionIndex()
    {
        
        $searchModel = new CountrySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionList()
    {
        $get = Yii::$app->request->get();
        $name = $get['filter'];

        $query = Country::find();
        
        $query = $query->orderBy('name')->where(['like', 'name', $name]);

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $query = $query->offset($pagination->offset)
            ->limit($pagination->limit);
            
        $countries = $query->all();

        return $this->render('list', [
            'countries' => $countries,
            'pagination' => $pagination
        ]);
    }
}