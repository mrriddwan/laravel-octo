<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => 'Admin', 
            'email' => 'admin@bluedale.com.my', 
            'password' => bcrypt('AdminBluedale987'),
        ]);

        User::create([
            'name' => 'Media 3', 
            'email' => 'media3@gmail.com', 
            'password' => bcrypt('media3bluedale'),
        ]);
        
        User::create([
            'name' => 'James', 
            'email' => 'james@gmail.com', 
            'password' => bcrypt('james123'),
        ]);

        User::create([
            'name' => 'Ali', 
            'email' => 'ali@gmail.com', 
            'password' => bcrypt('ali123'),
        ]);

        User::create([
            'name' => 'Abu', 
            'email' => 'abu@gmail.com', 
            'password' => bcrypt('abu123'),
        ]);

        User::create([
            'name' => 'Chong', 
            'email' => 'chong@gmail.com', 
            'password' => bcrypt('chong123'),
        ]);

        User::create([
            'name' => 'Siti', 
            'email' => 'siti@gmail.com', 
            'password' => bcrypt('siti123'),
        ]);

        User::create([
            'name' => 'Ahmad', 
            'email' => 'ahmad@gmail.com', 
            'password' => bcrypt('ahmad123'),
        ]);

        User::create([
            'name' => 'Harry', 
            'email' => 'harry@gmail.com', 
            'password' => bcrypt('harry123'),
        ]);

        User::create([
            'name' => 'Lydia', 
            'email' => 'lydia@gmail.com', 
            'password' => bcrypt('lydia123'),
        ]);
    }
}
