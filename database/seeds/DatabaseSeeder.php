<?php

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
        DB::table('films')->insert([
            'name' => 'Forrest Gump 1',
            'slug' => 'forrest-gump-1',
            'description' => 'The presidencies of Kennedy and Johnson, Vietnam, Watergate, and other history unfold through the perspective of an Alabama man with an IQ of 75.',
            'release_date' => '6/7/1994',
            'rating' => '5',
            'ticket_price' => '$100',
            'country' => 'USA',
            'genre' => 'Drama, Romance'
        ]);

        DB::table('films')->insert([
            'name' => 'Forrest Gump 2',
            'slug' => 'forrest-gump-2',
            'description' => 'The presidencies of Kennedy and Johnson, Vietnam, Watergate, and other history unfold through the perspective of an Alabama man with an IQ of 75.',
            'release_date' => '6/7/1994',
            'rating' => '5',
            'ticket_price' => '$100',
            'country' => 'USA',
            'genre' => 'Drama, Romance'
        ]);

        DB::table('films')->insert([
            'name' => 'Forrest Gump 3',
            'slug' => 'forrest-gump-3',
            'description' => 'The presidencies of Kennedy and Johnson, Vietnam, Watergate, and other history unfold through the perspective of an Alabama man with an IQ of 75.',
            'release_date' => '6/7/1994',
            'rating' => '5',
            'ticket_price' => '$100',
            'country' => 'USA',
            'genre' => 'Drama, Romance'
        ]);

        DB::table('comments')->insert([
            'name' => 'Author 1',
            'film_id' => '1',
            'email' => 'author1@gmail.com',
            'comment' => 'Author 1 comment',            
        ]);
        DB::table('comments')->insert([
            'name' => 'Author 2',
            'film_id' => '2',
            'email' => 'author2@gmail.com',
            'comment' => 'Author 2 comment',            
        ]);
        DB::table('comments')->insert([
            'name' => 'Author 3',
            'film_id' => '3',
            'email' => 'author3@gmail.com',
            'comment' => 'Author 3 comment',            
        ]);
    }
}
