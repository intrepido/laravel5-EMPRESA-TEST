<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(DivitionTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(UserTableSeeder::class);

        Model::reguard();
    }
}
