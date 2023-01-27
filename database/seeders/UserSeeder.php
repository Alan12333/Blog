<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Alan Guzman',
            'email'=>'alan@g.com',
            'password'=>bcrypt('12'),
            'remember_token'=>'sadasdasdfrcewcadsasfaedecadasdAddasd7A6SY8D7Auis879h'
        ]);

        User::factory(5)->create();
    }
}
