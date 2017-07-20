<?php

use Illuminate\Database\Seeder;
use apiIdecap\User;
use apiIdecap\Alumno;
use Faker\Factory as Faker;
class AlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $num_users=User::all()->count();
        $faker=Faker::create();
        for ($i=0; $i < $num_users; $i++) { 
        	Alumno::create(
        			[
        				'dni'=>$faker->unique()->word(),
        				'nombresyapellidos'=>$faker->word(),
        				'email'=>$faker->unique()->word(),
                        'departamento'=>$faker->word(),
                        'provincia'=>$faker->word(),
                        'distrito'=>$faker->word(),
                        'direccion'=>$faker->word(),
                        'telefono'=>$faker->word(),
                        'profesion'=>$faker->word(),
                        'grado'=>$faker->word(),
                        'trabajo'=>$faker->word(),
        			]
        		);
        }
    }
}