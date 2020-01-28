<?php

use App\Comment;
use App\Author;
use App\ListBook;
use App\Book;
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
        factory(App\User::class, 20)->create()->each(function ($user){
            $user->books()->createMany(factory(Book::class,10)->make()->toArray())->each(function ($book){
                $book->comments()->createMany(factory(Comment::class,5)->make()->toArray());
                $book->authors()->createMany(factory(Author::class,2)->make()->toArray());
                // $book->list()->save(factory(ListBook::class)->make());
            });
        });

    }
}
