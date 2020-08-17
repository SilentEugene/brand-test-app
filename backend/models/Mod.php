<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mods".
 *
 * @property int $id
 * @property string $mod_name
 * @property int $product_id
 *
 * @property Product $product
 */
class Mod extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mod_name', 'product_id'], 'required'],
            [['product_id'], 'integer'],
            [['mod_name'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mod_name' => 'Modification',
            'product_id' => 'Product ID',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
