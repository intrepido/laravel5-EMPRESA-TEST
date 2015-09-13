<?php

use Illuminate\Database\Seeder;

class DivitionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Company\Divition::class, 10)->create();
    }
}
