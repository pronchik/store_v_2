<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {
        $this->table('actions')
            ->addColumn('product_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('action_date', 'timestampfractional', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'precision' => 6,
                'scale' => 6,
            ])
            ->addColumn('seller_user_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('buyer_user_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('created', 'timestampfractional', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'precision' => 6,
                'scale' => 6,
            ])
            ->addColumn('modified', 'timestampfractional', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'precision' => 6,
                'scale' => 6,
            ])
            ->addColumn('price', 'decimal', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('action_bonus', 'decimal', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'buyer_user_id',
                ]
            )
            ->addIndex(
                [
                    'product_id',
                ]
            )
            ->addIndex(
                [
                    'seller_user_id',
                ]
            )
            ->create();

        $this->table('categories')
            ->addColumn('category_name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'timestampfractional', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'precision' => 6,
                'scale' => 6,
            ])
            ->addColumn('modified', 'timestampfractional', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'precision' => 6,
                'scale' => 6,
            ])
            ->create();

        $this->table('products')
            ->addColumn('category_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('price', 'decimal', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('seller_user_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('buyer_user_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('status_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('created', 'timestampfractional', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'precision' => 6,
                'scale' => 6,
            ])
            ->addColumn('modified', 'timestampfractional', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'precision' => 6,
                'scale' => 6,
            ])
            ->addColumn('name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('deleted', 'timestampfractional', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'precision' => 6,
                'scale' => 6,
            ])
            ->addIndex(
                [
                    'buyer_user_id',
                ]
            )
            ->addIndex(
                [
                    'category_id',
                ]
            )
            ->addIndex(
                [
                    'seller_user_id',
                ]
            )
            ->addIndex(
                [
                    'status_id',
                ]
            )
            ->create();

        $this->table('roles')
            ->addColumn('role_name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'timestampfractional', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'precision' => 6,
                'scale' => 6,
            ])
            ->addColumn('modified', 'timestampfractional', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'precision' => 6,
                'scale' => 6,
            ])
            ->create();

        $this->table('statuses')
            ->addColumn('status_name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'timestampfractional', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'precision' => 6,
                'scale' => 6,
            ])
            ->addColumn('modified', 'timestampfractional', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'precision' => 6,
                'scale' => 6,
            ])
            ->create();

        $this->table('users')
            ->addColumn('first_name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('second_name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('email', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('birth_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('password', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('balance', 'decimal', [
                'default' => '0',
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('role_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('created', 'timestampfractional', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'precision' => 6,
                'scale' => 6,
            ])
            ->addColumn('modified', 'timestampfractional', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'precision' => 6,
                'scale' => 6,
            ])
            ->addColumn('deleted', 'timestampfractional', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'precision' => 6,
                'scale' => 6,
            ])
            ->addIndex(
                [
                    'email',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'role_id',
                ]
            )
            ->create();

        $this->table('actions')
            ->addForeignKey(
                'buyer_user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->addForeignKey(
                'product_id',
                'products',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->addForeignKey(
                'seller_user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();

        $this->table('products')
            ->addForeignKey(
                'buyer_user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->addForeignKey(
                'category_id',
                'categories',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->addForeignKey(
                'seller_user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->addForeignKey(
                'status_id',
                'statuses',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();

        $this->table('users')
            ->addForeignKey(
                'role_id',
                'roles',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down()
    {
        $this->table('actions')
            ->dropForeignKey(
                'buyer_user_id'
            )
            ->dropForeignKey(
                'product_id'
            )
            ->dropForeignKey(
                'seller_user_id'
            )->save();

        $this->table('products')
            ->dropForeignKey(
                'buyer_user_id'
            )
            ->dropForeignKey(
                'category_id'
            )
            ->dropForeignKey(
                'seller_user_id'
            )
            ->dropForeignKey(
                'status_id'
            )->save();

        $this->table('users')
            ->dropForeignKey(
                'role_id'
            )->save();

        $this->table('actions')->drop()->save();
        $this->table('categories')->drop()->save();
        $this->table('products')->drop()->save();
        $this->table('roles')->drop()->save();
        $this->table('statuses')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
