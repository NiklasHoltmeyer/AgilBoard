<?php

use Illuminate\Database\Seeder;

class GroupUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groupUsers = [
            ['user_id' => '1', 'group_id' => '1'],
            ['user_id' => '1', 'group_id' => '2'],
            ['user_id' => '1', 'group_id' => '3'],

            ['user_id' => '2', 'group_id' => '1'],
            ['user_id' => '2', 'group_id' => '2'],
            
            ['user_id' => '3', 'group_id' => '1'],


            ['user_id' => '4', 'group_id' => '1'],
            ['user_id' => '5', 'group_id' => '1'],
            ['user_id' => '6', 'group_id' => '1'],
            ['user_id' => '7', 'group_id' => '1'],
            ['user_id' => '8', 'group_id' => '1'],
            ['user_id' => '9', 'group_id' => '1'],
            ['user_id' => '10', 'group_id' => '1']
        ];
        
        foreach ($groupUsers as $groupUser){
            $groupUser['created_at'] = new DateTime;
            $groupUser['updated_at'] = new DateTime;
            DB::table('group_user')->insert($groupUser);
        }
    }
}
