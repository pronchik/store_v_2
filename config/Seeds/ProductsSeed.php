<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Products seed.
 */
class ProductsSeed extends AbstractSeed
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
                'category_id' => 1,
                'price' => '15000',
                'seller_user_id' => 3,
                'buyer_user_id' => NULL,
                'status_id' => 1,
                'created' => '2020-10-28 09:52:02.81159',
                'modified' => '2020-10-28 08:43:31.404595',
                'name' => 'Lenovo',
                'deleted' => NULL,
            ],
            [
                'id' => 2,
                'category_id' => 2,
                'price' => '6000',
                'seller_user_id' => 4,
                'buyer_user_id' => 8,
                'status_id' => 2,
                'created' => '2020-10-28 09:52:24.502443',
                'modified' => '2020-10-28 08:50:03.442837',
                'name' => 'Samsung',
                'deleted' => NULL,
            ],
            [
                'id' => 3,
                'category_id' => 1,
                'price' => '7000',
                'seller_user_id' => 6,
                'buyer_user_id' => 8,
                'status_id' => 2,
                'created' => '2020-10-28 09:52:49.81384',
                'modified' => '2020-10-28 08:50:07.802639',
                'name' => 'Asus',
                'deleted' => NULL,
            ],
        ];

        $table = $this->table('products');
        $table->insert($data)->save();
    }
}
