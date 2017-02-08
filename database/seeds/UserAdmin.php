<?php

use Illuminate\Database\Seeder;
use App\User;
class UserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::where('id', '>', 0)->delete();

      $admin = new User();
      $admin->name = "Admin";
      $admin->username = "admindishub";
      $admin->password = bcrypt('admin');

      $admin->save();
    }
}
