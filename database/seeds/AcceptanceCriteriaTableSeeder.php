<?php

use Illuminate\Database\Seeder;
use App\Models\AcceptanceCriteria;

class AcceptanceCriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  
        //  
        $accpetanceCriteria1 = [
            "precondition"  => "Datenbankschema ist vorhanden",
            "action"        => "Datenbank wird umgesetzt",
            "result"        => "Datenbank ist einsatzbereit",
            "issue_id"      => 1
        ];        

        $accpetanceCriteria2 = [
            "precondition"  => "Audio Datei ist vorhanden",
            "action"        => "Audio Datei wird in DB persistiert",
            "result"        => "Audio Datei ist abrufbar",
            "issue_id"      => 1
        ];

        $accpetanceCriteria2_5 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 1
        ];           


        $accpetanceCriteria3 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 2
        ];
        
        $accpetanceCriteria3_5 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 2
        ];
        
        $accpetanceCriteria4 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 2
        ];
        $accpetanceCriteria5 = [
            "precondition"  => "MS sind fertig",
            "action"        => "MS werden deployt",
            "result"        => "MS sind von aussen erreichbar",
            "issue_id"      => 3
        ];
        $accpetanceCriteria6 = [
            "precondition"  => "Java ist nicht installiert",
            "action"        => "Java wird installiert",
            "result"        => "Java wurde installiert",
            "issue_id"      => 3
        ];

        $accpetanceCriteria6_5 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 3
        ];


        $accpetanceCriteria7 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 4
        ];
        $accpetanceCriteria8 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 4
        ];
        $accpetanceCriteria9 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 4
        ];
        $accpetanceCriteria10 = [
            "precondition"  => "Sprachnachricht wurde aufgenommen",
            "action"        => "Sprachnachricht wird verschlüsselt auf dem Handy gespeichert",
            "result"        => "Sprachnaricht ist nichtmehr unverschlüsselt vorhanden",
            "issue_id"      => 5
        ];
        $accpetanceCriteria11 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 5
        ];

        $accpetanceCriteria11_5= [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 5
        ];


        $accpetanceCriteria12 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 6
        ];
        $accpetanceCriteria13 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 6
        ];
        $accpetanceCriteria14 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 6
        ];
        $accpetanceCriteria15 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 7
        ];
        $accpetanceCriteria16 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 7
        ];
        $accpetanceCriteria17 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 7
        ];
        $accpetanceCriteria18 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 8
        ];
        $accpetanceCriteria19 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 8
        ];
        $accpetanceCriteria20 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 8
        ];
        $accpetanceCriteria21 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 9
        ];
        $accpetanceCriteria22 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 9
        ];
        $accpetanceCriteria23 = [
            "precondition"  => "xxx",
            "action"        => "yyy",
            "result"        => "zzz",
            "issue_id"      => 9
        ];

        // 15 mal random

        $accpetanceCriteria = [$accpetanceCriteria1, $accpetanceCriteria2, $accpetanceCriteria2_5, $accpetanceCriteria3, $accpetanceCriteria3_5, $accpetanceCriteria4, $accpetanceCriteria5, $accpetanceCriteria6, $accpetanceCriteria7, $accpetanceCriteria8, $accpetanceCriteria9, $accpetanceCriteria10, $accpetanceCriteria11, $accpetanceCriteria11_5, $accpetanceCriteria12, $accpetanceCriteria13, $accpetanceCriteria14, $accpetanceCriteria15, $accpetanceCriteria16, $accpetanceCriteria17, $accpetanceCriteria18, $accpetanceCriteria19, $accpetanceCriteria20, $accpetanceCriteria21, $accpetanceCriteria22, $accpetanceCriteria23];//= [$accpetanceCriteriaA,$accpetanceCriteriaA,$accpetanceCriteriaA];

        foreach ($accpetanceCriteria as $aC){
            AcceptanceCriteria::create($aC);
        }
        
    }
}
