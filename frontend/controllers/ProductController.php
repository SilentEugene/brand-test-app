<?php

namespace frontend\controllers;

use Yii;
use common\models\Mod;
use common\models\ModSearch;
use common\models\Product;
use common\models\ProductSearch;
use yii\web\NotFoundHttpException;

class ProductController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort->defaultOrder = ['price' => SORT_ASC];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewMod($id)
    {
        return $this->render('view-mod', [
            'model' => $this->findMod($id),
        ]);
    }

    public function actionViewProduct(string $url)
    {
        $product = $this->findProduct($url);
        $modSearchModel = new ModSearch();
        $mods = $modSearchModel->search(['ModSearch' => ['product_id' => $product->id]]);
        
        return $this->render('view-product', [
            'model' => $product,
            'mods' => $mods
        ]);
    }

    protected function findProduct($url)
    {
        Yii::info($url);
        if (($model = Product::findOne(['url' => $url])) !== null) {
            $model->photo = '' . $model->photo;
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findMod($id)
    {
        if (($model = Mod::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
