<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\Users::class)->times(30)->create(); // 表示创建30条数据。factory方法对应第三步
    }
}
