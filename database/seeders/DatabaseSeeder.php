<?php

namespace Database\Seeders;

use App\Models\Stock;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Stock::create(['name' => 'Brew Dog', 'price' => 5, 'available' => 100, 'description' => 'Previously cool']);
        Stock::create(['name' => 'Amazon', 'price' => 10, 'available' => 100, 'description' => 'Make Bezos even richer']);
        Stock::create(['name' => 'Google', 'price' => 5, 'available' => 100, 'description' => 'Still going strong']);

        User::create([
            'name' => 'System Admin',
            'email' => 'admin@stocks.com',
            'password' => bcrypt('a2s3d4F%G^'),
            'funds' => 1000
        ]);

        User::create([
            'name' => 'Mark Ramage',
            'email' => 'mark@stocks.com',
            'password' => bcrypt('a2s3d4F%G^'),
            'funds' => 1000
        ]);
    }
}
