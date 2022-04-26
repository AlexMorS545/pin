<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Product::factory(5)->create();
        $this->createAdmin();
    }

    private function createAdmin()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => config('products.email'),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);
        Role::create([
            'user_id' => $user->id,
            'name' => config('products.role'),
        ]);
    }
}
