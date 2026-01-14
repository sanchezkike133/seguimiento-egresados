<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder del administrador
        $this->call(AdminUserSeeder::class);

        // (Opcional) Usuarios de prueba — puedes dejarlo comentado
        // \App\Models\User::factory(10)->create();
    }
}
