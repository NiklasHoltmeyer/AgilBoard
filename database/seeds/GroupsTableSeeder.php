<?php

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usgs = ["Arma", "SWE", "KBSE"];

        foreach ($usgs as $usg){
            Group::create([
                'name' => $usg  
            ]);
        }
    }
}
