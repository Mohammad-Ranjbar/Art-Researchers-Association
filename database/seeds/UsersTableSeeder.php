<?php

use App\Comment;
use App\Author;
use App\ListBook;
use App\Book;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'admin',
            'role'     => 'admin',
            'email'    => 'admin@admin.admin',
            'password' => bcrypt('admin'),
        ]);
    }
}
