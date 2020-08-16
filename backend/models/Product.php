<?php

namespace backend\models;

use Yii;
use yii\helpers\Inflector;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string|null $url
 * @property float $price
 * @property float $old_price
 * @property string|null $description
 * @property string|null $photo
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'old_price'], 'required'],
            [['price', 'old_price'], 'number'],
            [['description'], 'string'],
            [['name', 'url', 'photo'], 'string', 'max' => 255],
            ['url', 'default', 'value' => function ($model, $attribute) {
                return Inflector::slug($model->name);
            }],
            [['url'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'price' => 'Price',
            'old_price' => 'Old Price',
            'description' => 'Description',
            'photo' => 'Photo',
        ];
    }
}
