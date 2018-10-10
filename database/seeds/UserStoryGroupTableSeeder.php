<?php

use Illuminate\Database\Seeder;
use App\Models\UserStoryGroup;

class UserStoryGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usgs = [
            ['name' => "Backlog",       'group_id' => '1'],
            ['name' => "in-progress",   'group_id' => '1'],
            ['name' => "closed",        'group_id' => '1'],

            ['name' => "Backlog",       'group_id' => '2'],
            ['name' => "in-progress",   'group_id' => '2'],
            ['name' => "closed",        'group_id' => '2'],

            ['name' => "Backlog",       'group_id' => '3'],
            ['name' => "in-progress",   'group_id' => '3'],
            ['name' => "closed",        'group_id' => '3']
        ];
 //
        foreach ($usgs as $usg){
            UserStoryGroup::create($usg);
        }
    }
}
