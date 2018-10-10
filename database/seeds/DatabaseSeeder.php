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
        
        $seeders = [UsersTableSeeder::class, GroupsTableSeeder::class, GroupUserTableSeeder::class, UserStoryGroupTableSeeder::class, 
        IssueTableSeeder::class, CommentTableSeeder::class,
        AcceptanceCriteriaTableSeeder::class, MessageTableSeeder::class];
        $this->call($seeders);        
    }
}

