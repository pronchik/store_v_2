<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'id' => 7,
                'first_name' => 'Sonya',
                'second_name' => 'Fadeeva',
                'email' => 's@f.c',
                'birth_date' => '2007-11-08',
                'password' => '$2y$10$NSeIvTifWRcXdONvAEiVPemb5bthvN0xGM5EQhCW6v98s7Q8LZxby',
                'balance' => '0',
                'role_id' => 1,
                'created' => '2020-10-26 11:56:53.583378',
                'modified' => '2020-10-26 11:56:53.583451',
                'deleted' => NULL,
            ],
            [
                'id' => 5,
                'first_name' => 'Sergey',
                'second_name' => 'Plov',
                'email' => 's@p.c',
                'birth_date' => '2007-11-08',
                'password' => '$2y$10$iQSGmtFUVWTZGJjowTgTW.8Bov8ie1LL.OKGC5XY/a1Q8FjWo0vm6',
                'balance' => '95',
                'role_id' => 1,
                'created' => '2020-10-26 11:50:14.14263',
                'modified' => '2020-10-27 07:15:14.47961',
                'deleted' => NULL,
            ],
            [
                'id' => 3,
                'first_name' => 'Maxim',
                'second_name' => 'Pupkin',
                'email' => 'a@p.c',
                'birth_date' => '2001-08-09',
                'password' => '$2y$10$quwu7YApXQSb8IvR9G1TbuZdgjE3328ZEXqT3NdYJVai/4CRiNtNu',
                'balance' => '28861',
                'role_id' => 1,
                'created' => '2020-10-22 09:51:57.766561',
                'modified' => '2020-10-28 08:43:31.41033',
                'deleted' => NULL,
            ],
            [
                'id' => 4,
                'first_name' => 'Viktor',
                'second_name' => 'Nanas',
                'email' => 'v@n.c',
                'birth_date' => '2001-11-08',
                'password' => '$2y$10$bLup2nkrQtdtZK/icM/ly.1T7HHTamTbi3yQhOZiW/vMovjwJM/eq',
                'balance' => '8909.1',
                'role_id' => 1,
                'created' => '2020-10-26 11:49:28.510459',
                'modified' => '2020-10-28 08:50:03.449448',
                'deleted' => NULL,
            ],
            [
                'id' => 8,
                'first_name' => 'Antonio',
                'second_name' => 'Banifatsii',
                'email' => 'pronmaxim2001@gmail.com',
                'birth_date' => '2008-12-09',
                'password' => '$2y$10$uzGer4qsWHTroRz0STqxGOKrRLQB6JlwoATsIT8nqMY3enNH.hVNG',
                'balance' => '2000',
                'role_id' => 1,
                'created' => '2020-10-28 07:14:19.805515',
                'modified' => '2020-10-28 08:50:07.836727',
                'deleted' => NULL,
            ],
            [
                'id' => 2,
                'first_name' => 'OWNER',
                'second_name' => 'OWNER',
                'email' => 'OWNER@OWNER.OWNER',
                'birth_date' => '2001-08-09',
                'password' => '$2y$10$.Dljc5sxj.xxZvyW7eNbz.3gZZtONhoU0yNHzBseDGCbfdA5d/Tti',
                'balance' => '650',
                'role_id' => 3,
                'created' => '2020-10-22 09:26:57.743821',
                'modified' => '2020-10-28 08:50:07.860265',
                'deleted' => NULL,
            ],
            [
                'id' => 6,
                'first_name' => 'Maxim',
                'second_name' => 'Durnev',
                'email' => 'm@d.c',
                'birth_date' => '2007-11-08',
                'password' => '$2y$10$wf/E1LGTqUCXzGKFqb0aw.1em7q3DyoeZpHnVrXIDw6ZgMDPtCVjO',
                'balance' => '6650',
                'role_id' => 1,
                'created' => '2020-10-26 11:51:48.877983',
                'modified' => '2020-10-28 08:50:07.885159',
                'deleted' => NULL,
            ],
            [
                'id' => 9,
                'first_name' => 'Maxim',
                'second_name' => 'Pron',
                'email' => 'pronmaxim20011@gmail.com',
                'birth_date' => '2007-11-08',
                'password' => '$2y$10$9uZXjfstBrXDCKG4PXUNkO4E6hLKwFt1qLBkXXEAkHhNEfC5QFPVO',
                'balance' => '0',
                'role_id' => 1,
                'created' => '2020-10-28 07:15:08.813669',
                'modified' => '2020-10-28 07:15:08.813744',
                'deleted' => NULL,
            ],
            [
                'id' => 10,
                'first_name' => 'Maxim',
                'second_name' => 'Pron',
                'email' => 'pronmaxisdfsdfm20011@gmail.com',
                'birth_date' => '2007-11-08',
                'password' => '$2y$10$ZW55gKqpdnrDJYnMTvH1EuOxS29puxIDaQpXpRICIJJyljkvfFi2K',
                'balance' => '0',
                'role_id' => 1,
                'created' => '2020-10-28 07:18:46.390968',
                'modified' => '2020-10-28 07:18:46.391024',
                'deleted' => NULL,
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
