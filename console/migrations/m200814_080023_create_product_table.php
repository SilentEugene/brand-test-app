<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m200814_080023_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'url' => $this->string()->unique(),
            'price' => $this->decimal()->notNull(),
            'old_price' => $this->decimal()->notNull(),
            'description' => $this->text(),
            'photo' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }
}
