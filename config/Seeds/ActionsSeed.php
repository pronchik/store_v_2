<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Actions seed.
 */
class ActionsSeed extends AbstractSeed
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
                'id' => 14,
                'product_id' => 2,
                'action_date' => '2020-10-28 08:50:00',
                'seller_user_id' => 4,
                'buyer_user_id' => 8,
                'created' => '2020-10-28 08:50:03.435952',
                'modified' => '2020-10-28 08:50:03.436006',
                'price' => '6000',
                'action_bonus' => '300',
            ],
            [
                'id' => 15,
                'product_id' => 3,
                'action_date' => '2020-10-28 08:50:00',
                'seller_user_id' => 6,
                'buyer_user_id' => 8,
                'created' => '2020-10-28 08:50:07.760205',
                'modified' => '2020-10-28 08:50:07.760259',
                'price' => '7000',
                'action_bonus' => '350',
            ],
        ];

        $table = $this->table('actions');
        $table->insert($data)->save();
    }
}
