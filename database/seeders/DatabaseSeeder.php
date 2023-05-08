<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TipoUsuario;
use App\Models\TipoVisitante;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $tipoUsuarioAdmin = \App\Models\TipoUsuario::create([

            'tipo_usuario' => 'Administrador'
        ]);

        $tipoUsuarioRegular = \App\Models\TipoUsuario::create([
            'tipo_usuario' => 'Usuario'
        ]);

        $user1 = \App\Models\User::factory()->create([
            'name' => 'Usuario',
            'cargo' => 'secretaria',
            'email' => 'usuario@gmail.com',
            'password' => bcrypt('usuario'),
            'tipo_usuario_id' => 2,
        ]);

        $user2 = \App\Models\User::factory()->create([
            'name' => 'Administrador',
            'cargo' => 'Administrador',
            'email' => 'administrador@gmail.com',
            'password' => bcrypt('administrador'),
            'tipo_usuario_id' => 1,
        ]);

        $user3 = \App\Models\User::factory()->create([
            'name' => 'Javier Ponce Roque',
            'cargo' => 'Alcalde de Puno',
            'email' => 'javierponce@gmail.com',
            'password' => bcrypt('administrador'),
            'tipo_usuario_id' => 1,
        ]);

        $tipoVisitante1 = \App\Models\TipoVisitante::create([
            'tipo_visitante' => 'Persona Juridica'
        ]);
        $tipoVisitante2 = \App\Models\TipoVisitante::create([
            'tipo_visitante' => 'Persona Natural'
        ]);

    }
}
