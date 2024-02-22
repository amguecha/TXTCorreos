<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserSetting;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'email' => 'correo@example.com',
            'phone' => '123456789',
            'theme_variant' => 'light-theme'
        ];
        UserSetting::create($data);
    }
}
