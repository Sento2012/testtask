<?php

use yii\db\Migration;

/**
 * Class m220420_063534_init
 */
class m220420_063535_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('videos', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'thumbnail' => $this->string(255)->notNull(),
            'duration' => $this->integer()->notNull(),
            'views' => $this->integer()->notNull()->defaultValue(0),
            'added' => $this->dateTime()->notNull(),
        ]);
        $this->createIndex('idx_videos_views', 'videos', 'views');
        $this->createIndex('idx_videos_added', 'videos', 'added');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx_videos_views', 'videos');
        $this->dropIndex('idx_videos_added', 'videos');
        $this->dropTable('videos');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220420_063534_init cannot be reverted.\n";

    }
    */
}