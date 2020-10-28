<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Statuses seed.
 */
class StatusesSeed extends AbstractSeed
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
                'status_name' => 'Active',
                'created' => '2020-09-23 07:07:59.687196',
                'modified' => '2020-09-23 07:07:59.689291',
            ],
            [
                'id' => 2,
                'status_name' => 'Sold
',
                'created' => '2020-09-23 07:08:06.564612',
                'modified' => '2020-09-23 07:08:06.566742',
            ],
        ];

        $table = $this->table('statuses');
        $table->insert($data)->save();
    }
}
