<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Inserto primero el admin
        factory(Company\User::class)
            ->create([
                'name' => 'Fidel',
                'email' => 'in3pi287@gmail.com',
                'password' => bcrypt('baddog'),
                'remember_token' => str_random(10),
            ])->employee()->save(factory(Company\Employee::class)->make());

        //Este metodo es sumamente util para el llenado de tablas con relacion de 1 a 1 ya que la llave foranea siempre sera unica
        factory(Company\User::class, 3)
            ->create()
            ->each(function($u) {
                $u->employee()->save(factory(Company\Employee::class)->make());
            });
    }
}
