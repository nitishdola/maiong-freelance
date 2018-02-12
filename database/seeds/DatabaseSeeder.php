<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
    }
}

class AdminTableSeeder extends Seeder {
 
  public function run()
  {
    DB::table('admins')->insert(array(
      array('name'=>'Administrator', 'username' => 'maiong', 'password' => bcrypt('Maiong@4321##')),
    )); 
  }
}