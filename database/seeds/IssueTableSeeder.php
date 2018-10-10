<?php

use Illuminate\Database\Seeder;
use App\Models\Issue;

class IssueTableSeeder extends Seeder
{

    public function run()
    {
        // user_story_groups_id
        // creator_user_id
        $issueA = [
            'name'                 => 'Datenbankschema erstellen und Sprachnachricht abspeichern',
            'descrption'           => '<ul><li>Erarbeiten eines Datenbankschemas zu Speicherung s&auml;mtlicher Informationen des MS</li><li>Sprachnachricht des Tierarztes abspeichern(Persistierung in Datenbank oder als File)</li>       </ul>',
            'user_story_group_id'  => 2,
            'creator_user_id'      => 1
        ];

        $issueB = [
            'name'                 => 'Microservice Diagnose: Datensynchronisation über Messaging(Einarbeiten)',
            'descrption'           => '<ul>
            <li>Untersuchung von RabbitMQ zu Datensynchronisation(TierarztDatenController(Master) =&gt; Diagnose(Slave))</li>
            <li>prototypisch umsetzten</li>
        </ul>',
            'user_story_group_id' =>  1,
            'creator_user_id'      => 2
        ];

        $issueC = [
            'name'                 => 'Server aufsetzten',
            'descrption'           => '<ul>
            <li>lauff&auml;hige MS bereitstellen</li>
        </ul>',
            'user_story_group_id' => 3,
            'creator_user_id'      => 3
        ];

        $issueD = [
            'name'                 => 'Tierarztdaten und Korellation zu Tierdaten',
            'descrption'           => '<ul>
            <li>tierhalterController anpassen(umbenennen zu TierarztVerwalter/VeterinaryController etc.)</li>
            <li>Tierarzt -&gt; Tierhalter -&gt; St&auml;lle -&gt; Tierart</li>
            <li>Restful API anpassen um Zugriff auf alle ben&ouml;tigten Daten zu erhalten</li>
        </ul>',
            'user_story_group_id' => 3,
            'creator_user_id'      => 4
        ];

        $issueE = [
            'name'                 => 'Diagnose aufnehmen',
            'descrption'           => '<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.&nbsp;</p>',
            'user_story_group_id' => 1,
            'creator_user_id'      => 5
        ];

        $issueF = [
            'name'                 => 'Anmeldung und Nutzerverwaltung',
            'descrption'           => '<ul>
            <li>erarbeiten eines Konzeptes --&gt; best practise (KeyCloak-Flow)</li>
            <li>Prototypisch umsetzten des erarbeiteten Konzeptes</li>
        </ul>',
            'user_story_group_id'  => 2,
            'creator_user_id'      => 6
        ];

        $issueG = [
            'name'                 => 'Client erweitern (diagnose aufnehmen)',
            'descrption'           => '<ul>
            <li>vorhandenen Client anpassen</li>
            <li>Zugriff auf Nutzerdaten herstellen(durch Restful API)</li>
        </ul>
        
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. &nbsp;&nbsp;</p>',
            'user_story_group_id'  => 1,
            'creator_user_id'      => 7
        ];

        $issueH = [
            'name'                 => 'TI: Anbindung Legacy-System für Tierhalterdaten',
            'descrption'           => '<ul>
            <li>Untersuchung von Mustern, z.B. CQRS... und deren Umsetzung/Verwendung unter Nutzung asynchroner Kommunikation zur polyglotten Datenspeicherung.</li>
            <li>Akzeptanzkriterium: &nbsp;Erstes Konzept zur redundanten Datenhaltung der Tierhalterdaten.</li>
        </ul>',
            'user_story_group_id'  => 2,
            'creator_user_id'      => 8
        ];

        $issueI = [
            'name'                 => 'Datenhaltung der Tierhalterdaten auf dem Server',
            'descrption'           => '<ol>
            <li>Erstellen der Datenbank mit den Daten der WebWareVet<br />
            &nbsp;</li>
        </ol>',
            'user_story_group_id'  => 3,
            'creator_user_id'      => 9
        ];

        $issues =  [$issueA, $issueB, $issueC, $issueD, $issueE, $issueF, $issueG, $issueH, $issueI];//[];
        
        foreach ($issues as $issue){
            $issue = [
                'name'                 => $issue['name'],
                'descrption'           => $issue['descrption'],
                'priority'             => rand(1,10),
                'risk'                 => rand(1,55),
                'storyPoints'          => rand(1,100),
                'timeSpend'            => rand(1,50),
                'estimatedTime'        => rand(50,100),
                'closeDate'            => null,
                'due_date'             => '2018-12-31',
                'user_story_group_id'  => $issue['user_story_group_id'],
                'creator_user_id'      => $issue['creator_user_id'],
            ];

            Issue::create($issue);
        }
    }
}

