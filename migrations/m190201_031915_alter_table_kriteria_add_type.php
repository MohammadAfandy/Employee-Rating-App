<?php

use yii\db\Migration;

/**
 * Class m190201_031915_alter_table_kriteria_add_type
 */
class m190201_031915_alter_table_kriteria_add_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190201_031915_alter_table_kriteria_add_type cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('tb_kriteria', 'type', $this->integer(1)->after('nama_kriteria'));

    }

    public function down()
    {
        echo "m190201_031915_alter_table_kriteria_add_type cannot be reverted.\n";

        $this->dropColumn('tb_kriteria', 'type');
    }
    
}
