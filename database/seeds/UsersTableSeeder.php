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
        factory(\App\Users::class)->times(30)->create(); // ��ʾ����30�����ݡ�factory������Ӧ������
    }
}
