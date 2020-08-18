<?php

namespace backend\models;

use Yii;
use yii\helpers\Inflector;
use yii\web\UploadedFile;

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
    public ?UploadedFile $imageFile;
    
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
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
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

    public function upload()
    {
        if (!$this->imageFile) {
            return true;
        }
        if ($this->validate()) {
            $imagePath = '/images/' . $this->url . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs(Yii::getAlias('@webroot') . $imagePath);
            $this->photo = $imagePath;
            return true;
        } else {
            return false;
        }
    }
}
