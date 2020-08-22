<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Create Product';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$message = '';

if (!empty($error)) {
    $message = '<div class="alert alert-danger">' . nl2br(Html::encode($error)) . '</div>';
}

?>

<div class="product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $message ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
