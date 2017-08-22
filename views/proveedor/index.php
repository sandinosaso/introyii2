<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\grid\GridView;
?>
<h1>Listado de Proveedores</h1>
<ul>
<?php foreach ($proveedores as $proveedor): ?>
    <li>
        <?= Html::encode("{$proveedor->name}") ?>
        <ul>
        <?php foreach ($proveedor->getClientes()->all() as $cliente): ?>
            <li>
                <?= Html::encode("{$cliente->name}") ?>
            </li>
        <?php endforeach; ?>
        </ul>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>