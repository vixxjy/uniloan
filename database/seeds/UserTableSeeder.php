<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $member = new User();
        $member->username = 'Admin';
        $member->email = 'admin@admin.com';
        $member->password = bcrypt('testadmin');
        $member->save();
    }
}
