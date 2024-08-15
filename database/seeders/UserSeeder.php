<?php

namespace Database\Seeders;

use App\Models\Medico;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Yatzari Eduve Pecina Vidales',
            'email' => 'yatzaripecina@gmail.com',
            'rol' => 'Administrador',
            'password' => Hash::make('12345678')
        ]);

        $user = User::create([
            'name' => 'Damaris Alexia Espinosa Castro',
            'email' => 'damaris@gmail.com',
            'rol' => 'Medico',
            'password' => Hash::make('12345678')
        ]);

        Medico::create([
            'name' => $user->name,
            'email' => $user->email,
            'user_id' => $user->id,
        ]);
    }
}
