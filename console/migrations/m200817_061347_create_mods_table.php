<?php

use yii\db\Migration;

/**
 * Handles the creation of table `mods`.
 * Has foreign keys to the tables:
 *
 * - `product`
 */
class m200817_061347_create_mods_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {    
        if (Yii::$app->db->getDriverName() == 'sqlite') {
            $time = $this->beginCommand("create table 'mods'");
            $this->db->createCommand("CREATE TABLE `mods` (
                `id` integer PRIMARY KEY AUTOINCREMENT NOT NULL,
                `mod_name` varchar(255) NOT NULL,
                `product_id` integer NOT NULL,
                FOREIGN KEY (`product_id`) REFERENCES product(`id`) ON DELETE CASCADE);")->execute();
            $this->endCommand($time);
        } else {
            $this->createTable('mods', [
                'id' => $this->primaryKey(),
                'mod_name' => $this->string()->notNull(),
                'product_id' => $this->integer()->notNull(),
            ]);
            
            // creates i    ndex for column `product_id`
            $this->createIndex(
                'idx-mods-product_id',
                'mods',
                'product_id'
            );
        
            // add foreign key for table `product`
            $this->addForeignKey(
                'fk-mods-product_id',
                'mods',
                'product_id',
                'product',
                'id',
                'CASCADE'
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        if (Yii::$app->db->getDriverName() != 'sqlite') {
            // drops foreign key for table `product`
            $this->dropForeignKey(
                'fk-mods-product_id',
                'mods'
            );

            // drops index for column `product_id`
            $this->dropIndex(
                'idx-mods-product_id',
                'mods'
            );

            $this->dropTable('mods');
        }
    }
}
