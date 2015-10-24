<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

    	User::create([
    		'name' => 'Administrator',
            'email' =>'admin@admin.com',
    		'password' => bcrypt('admin')
    	]);   
    }
}
