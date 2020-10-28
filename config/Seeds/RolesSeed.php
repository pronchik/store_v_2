<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Roles seed.
 */
class RolesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'role_name' => 'User',
                'created' => '2020-09-24 09:32:08.413099',
                'modified' => '2020-09-24 09:32:08.413099',
            ],
            [
                'id' => 3,
                'role_name' => 'Owner',
                'created' => '2020-10-22 12:26:06.675925',
                'modified' => NULL,
            ],
        ];

        $table = $this->table('roles');
        $table->insert($data)->save();
    }
}
