<?php

use Phinx\Migration\AbstractMigration;

class CreateFriendsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $friends = $this->table('friends');
        $friends->addColumn('friend_fk', 'integer')
                ->addColumn('user_fk', 'integer')
                ->addForeignKey('friend_fk', 'users', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
                ->addForeignKey('user_fk', 'users', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
                ->create();
    }
}
