<?php

use yii\db\Migration;

/**
 * Class m181106_051912_news_type
 */
class m181106_051912_news_type extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%news_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('{{%news_type}}');
    }

}
