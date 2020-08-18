<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Mod */

$this->title = 'Update Mod: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mod-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'products' => $products
    ]) ?>

</div>
