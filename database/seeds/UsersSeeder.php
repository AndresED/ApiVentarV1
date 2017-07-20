<?php

use Illuminate\Database\Seeder;
use apiIdecap\User;
use apiIdecap\Alumno;
use Faker\Factory as Faker;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for ($i=0; $i < 3; $i++) { 
        	User::create(
        			[
        				'dni'=>$faker->unique()->word(),
        				'nombresyapellidos'=>$faker->word(),
        				'username'=>$faker->unique()->word(),
        				'email'=>$faker->unique()->word(),
        				'password'=>$faker->word(),
                        'estado'=>true,
                        'telefono'=>$faker->word(),
                        'permiso'=>false,
                        'ruta_foto_perfil'=>$faker->word()
        			]
        		);
        }
    }
}
