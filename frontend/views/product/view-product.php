<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $mods common\models\Mod */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'price',
            'old_price',
            'description:ntext',
            'photo:image',
        ],
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $mods,
        'columns' => [
            'mod_name',
            [
                'class' => 'yii\grid\DataColumn',
                'label' => 'URL',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::a(
                        'Link',
                        Url::current() . '/' .$data->id
                    );
                },
            ],
        ],
    ]); ?>

</div>
