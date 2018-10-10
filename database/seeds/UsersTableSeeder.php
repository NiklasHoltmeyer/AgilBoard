<?php

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
        $users  = [
            ['name' => "Test User",  'email' => "test@user.de"],            
            ['name' => "Omar Kumbarji",  'email' => "omar.kumbarji@hs-osnabrueck.de"],            
            ['name' => "Niklas Holtmeyer",   'email' => "niklas.holtmeyer@hs-osnabrueck.de"],
            ['name' => "Tanja Engel", 'email' => "tanja.engel@hs-osnabrueck.de"],
            ['name' => "Ulrich Ebersbach", 'email' => "ulrich.ebersbach@hs-osnabrueck.de"],
            ['name' => "Stefanie Unger", 'email' => "stefanie.unger@hs-osnabrueck.de"],
            ['name' => "Lukas Shuster", 'email' => "lukas.shuster@hs-osnabrueck.de"],
            ['name' => "Sandra Gersten", 'email' => "sandra.gersten@hs-osnabrueck.de"],
            ['name' => "Heike Lehmann", 'email' => "heike.lehmann@hs-osnabrueck.de"],
            ['name' => "Tom Freytag", 'email' => "tom.freytag@hs-osnabrueck.de"],
            ['name' => "Stefan Schiffer", 'email' => "stefan.schiffer@hs-osnabrueck.de"]
        ];

        foreach ($users as $user){
            $user['created_at'] = new DateTime;
            $user['updated_at'] = new DateTime;
            $user['password']   = bcrypt('dummy');

            DB::table('users')->insert($user);
        }

    }
}
