<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            //'url:url',
            'price',
            'old_price',
            //'description:ntext',
            //'photo',
            [
                'class' => 'yii\grid\DataColumn',
                'label' => 'URL',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::a(
                        'Link',
                        Url::base(true) . Url::toRoute($data->url)
                    );
                },
            ],
        ],
    ]); ?>

</div>
