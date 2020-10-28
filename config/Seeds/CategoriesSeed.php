<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Categories seed.
 */
class CategoriesSeed extends AbstractSeed
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
                'category_name' => 'Notebook',
                'created' => '2020-09-24 09:31:24.142499',
                'modified' => '2020-09-24 09:31:24.142499',
            ],
            [
                'id' => 2,
                'category_name' => 'Phone',
                'created' => '2020-09-24 09:31:54.710158',
                'modified' => '2020-09-24 09:31:54.710158',
            ],
        ];

        $table = $this->table('categories');
        $table->insert($data)->save();
    }
}
