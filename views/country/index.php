<?php
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Html;
?>
<h1>Countries2</h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'code',
        'name',
        'population',
        [
          'attribute' => 'Bandera',
          'format' => 'raw',
          'value' => function($model) {
            return Html::img($model->flag_img, ['width' => 50]);
          },
        ],
        [
          'attribute' => 'Ciudades',
          'format' => 'raw',
          'value' => function($model) {
            $resultado = '<ul>';
            foreach ($model->getCities()->orderBy('population')->all() as $key => $city) {
              $resultado .= '<li>' . $city->name . '</li>';
            }
            $resultado .= '</ul>';
            return $resultado;
          },
        ],
        [
        'class' => ActionColumn::className(),
        'template' => '{view} {update}',
        ],
    ],
]) ?>
