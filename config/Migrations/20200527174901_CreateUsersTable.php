<?php
use Migrations\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('first_name', 'string', ['limit' => 100]);
        $table->addColumn('last_name', 'string', ['limit' => 100]);
        $table->addColumn('dni', 'string', ['limit' => 9]);
        $table->addColumn('phone', 'string', ['limit' => 9]);
        $table->addColumn('saldo_monedero', 'decimal', ['precision' => 5, 'scale' => 2]);
        $table->addColumn('email', 'string', ['limit' => 100]);
        $table->addColumn('password','string');
        $table->addColumn('active', 'boolean');
        $table->addColumn('created', 'datetime');
        $table->addColumn('modified', 'datetime');
        $table->addColumn('timeout', 'timestamp');
        $table->addColumn('passkey', 'string');
        $table->create();
    }
}
