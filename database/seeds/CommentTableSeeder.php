<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commentA = [
            'content'  => '<p>mein vorschlag:&nbsp;</p>

            <ul>
                <li>DB Schema:</li>
                <li><img alt="" src="https://www2.pic-upload.de/img/35778489/1231.png" style="height:176px; width:259px" /></li>
                <li>die audio datein werden normal in verzeichnissen abgelegt (wir haben ja mal dar&uuml;ber gesprochen das sp&auml;ter die ganze festplatte verschl&uuml;sselt werden kann, also sollten wir uns hier nicht um sicherheit / verschl&uuml;ssung der daten k&uuml;mmern m&uuml;ssen)
                <ul>
                    <li>&nbsp;z.B.: /AudioFiles/{vetID}/{customerID}/{date}/{time}.{mp3}</li>
                </ul>
                </li>
                <li>wir k&ouml;nnten die audio datein nat&uuml;rlich auch direkt in der datenbank als eigene zeile als blob speichern (vor-/nachteile: https://stackoverflow.com/a/154883 https://stackoverflow.com/a/154738 https://stackoverflow.com/a/4596607 )</li>
            </ul>',
            'user_id'  => 1,
            'issue_id' => 1
        ];

        $commentB = [
            'content'  => '<p>Netter Einstieg zum Thema Messaging im kontext einer Rest-Architektur: <a href="https://www.zweitag.de/de/blog/technologie/amqp-im-kontext-einer-rest-architektur">https://www.zweitag.de/de/blog/technologie/amqp-im-kontext-einer-rest-architektur</a></p>',
            'user_id'  => 2,
            'issue_id' => 2
        ];

        $commentC = [
            'content'  => '<p>java installiert&nbsp;</p>

            <p>&nbsp;</p>
            
            <ul>
                <li>openjdk version &quot;1.8.0_171&quot;</li>
                <li>OpenJDK Runtime Environment (build 1.8.0_171-8u171-b11-0ubuntu0.16.04.1-b11)</li>
                <li>OpenJDK 64-Bit Server VM (build 25.171-b11, mixed mode)</li>
            </ul>
            
            <p>keycloak server:</p>
            
            <ul>
                <li>Pfad: /srv/KeyCloakServer</li>
                <li>&nbsp;/etc/hosts angepasst damit der server gestartet werden kann ohne exceptions (UnknownHostException)</li>
                <li>&nbsp;repo f&uuml;r &quot;produktiv&quot; keycloak server aufgesetzt&nbsp;
                <ul>
                    <li>&nbsp;admin console daten
                    <ul>
                        <li>name &amp; passwort = root</li>
                    </ul>
                    </li>
                </ul>
                </li>
                <li>https://gitlab.yyy.de/xxxKeyCloakServer</li>
            </ul>',
            'user_id'  => 3,
            'issue_id' => 3
        ];

        $commentD = [
            'content'  => '<p>Lorem <strong>ipsum </strong>dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed <span class="marker">diam nonumy eirmod tempor invidunt ut l</span>abore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et <s>accusam et justo duo dolores</s></p>',
            'user_id'  => 4,
            'issue_id' => 4
        ];

        //
        $commentE = [
            'content'  => '<p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. &nbsp;&nbsp;</p>

            <ul>
                <li>Nam liber tempor cum</li>
                <li>soluta nobis eleifend
                <ul>
                    <li>option congue nihil&nbsp;</li>
                </ul>
                </li>
                <li>imperdiet doming id quod mazim placerat facer possim assum.&nbsp;</li>
            </ul>',
            'user_id'  => 5,
            'issue_id' => 6
        ];
        $commentF = [
            'content'  => '<p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur&nbsp;</p>

            <ul>
                <li>sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et</li>
                <li>dolore magna aliquyam erat, sed diam voluptua.</li>
                <li>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren
                <ul>
                    <li>no sea takimata sanctus est Lorem ipsum dolor sit&nbsp;</li>
                </ul>
                </li>
            </ul>',
            'user_id'  => 6,
            'issue_id' => 7
        ];
        $commentG = [
            'content'  => '<p>Sch&ouml;ne Beschreibung: https://www.maibornwolff.de/blog/ddd-event-sourcing-und-cqrs</p>',
            'user_id'  => 7,
            'issue_id' => 8
        ];
        $commentH = [
            'content'  => '<p>Ein direkter Zugriff auf die RESTful-Schnittstelle des Legacysystems(B&uuml;rowareVet) w&auml;re nicht sinnvoll, da man von au&szlig;en auf das Tierhaltersystem zugreifen m&uuml;sste. Dies h&auml;tte zur Folge, dass die Tierartztpraxis um das System zu Nutzen die Ports in ihrem Netzwerk freigeben muss, was sehr wahrscheinlich ein abschreckender Konfigurationsaufwand w&auml;re.</p>

            <p>Es empfiehlt sich daher eher ein kleines Synchronisationstool zu entwickeln, welches die Daten aus dem System der Praxis abgreift und an unseren VetAppServer schickt. Hierf&uuml;r bietet B&uuml;roWareVet die RESTful-Schnittstelle oder eine Datei-Schnittstelle an.</p>
            
            <p>Da die Schnittstelle nicht sehr schnell arbeitet bietet es sich an, nicht bei jeder Synchronisation den gesamten Datensatz zu &uuml;bermitteln, sondern zuerst &uuml;ber einen HashWert zu ermitteln ob &Auml;nderungen an dem Datensatz vorliegen. Ist dies der Fall sollten die &Auml;nderungen erkannt und an unseren Server &uuml;bermittelt werden wo sie anschlie&szlig;end in der Datenbank abgespeichert werden.</p>
            
            <p>Man sollte hierbei f&uuml;r die Praxis einen Login oder Token erstellen, welcher mit an die Datens&auml;tze gespeichert wird. Dadurch k&ouml;nnen, falls ein Tierhalter von mehreren Praxen betreut wird die Datens&auml;tze wieder zugeordnet werden und jede Praxis nur die von ihr gespeicherten Daten sehen. Wenn man den Token der Praxis auch mit an den Tierartzt speichert k&ouml;nnen, falls in einer Praxis mehrere &Auml;rtzte arbeiten diese aber alle Daten der Praxis sehen.</p>
            
            <p>Zur Speicherung der Daten sollten wir kl&auml;ren wie redundant die Daten &nbsp;bei uns hinterlegt werden sollten, da sie ja eigentlich immer auf dem System des Tierhalters zur Verf&uuml;gung stehen und &uuml;ber das Synchronisations Tool empfangen werden k&ouml;nnen.</p>
            
            <p>Eine meiner Meinung nach sehr sch&ouml;ne Methode, f&uuml;r das redundante speichern, ist das Event-Storage-Prinzip, welches eng mit dem CQRS Patten verkn&uuml;pft ist.</p>
            
            <p>Das CQRS Pattern besagt, dass Commands und Querys strikt von einander getrennt behandelt werden m&uuml;ssen. Querys liefern Daten zur&uuml;ck, nehmen aber keine &Auml;nderungen auf dem Datensatz vor, wohingegen Commands &Auml;nderungen vornehmen, aber keine Daten zur&uuml;ck gegeben werden.</p>
            
            <p>Event-Storage sagt nun aus, dass beim aufrufen eines Commands ein Event erzeugt wird, in welchem beschrieben ist wie sich der aktuelle Datensatz ver&auml;ndert haben. Dieses wird in einer separaten Datenbank mit dem aktuellen Zeitpunkt abgespeichert. Anschlie&szlig;end wird die &Auml;nderung an eine Liste weitergegeben auf welcher der aktuelle Datenstand gespeichert ist und dort ausgef&uuml;hrt.</p>
            
            <p>Da man nun jede &Auml;nderung an dem Datensatz mitschreibt besteht die M&ouml;glichkeit den Zustand der Datenbank einem beliebigen Zeitpunkt (z.b. Zustand von vor einer Woche) wiederherzustellen.</p>',
            'user_id'  => 8,
            'issue_id' => 8
        ];
        $commentI = [
            'content'  => '<p>clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. &nbsp;&nbsp;</p>',
            'user_id'  => 9,
            'issue_id' => 9
        ];
        $commentJ = [
            'content'  => '<p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ip</p>

            <blockquote>
            <p>clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. &nbsp;&nbsp;</p>
            </blockquote>',
            'user_id'  => 1,
            'issue_id' => 9
        ];

        $comment1 = [        
            'content'  => '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et </p>',        
            'user_id'  => 1,        
            'issue_id' => 1            
        ];
        
        $comment2 = [        
            'content'  => '<p>justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </p>',        
            'user_id'  => 2,        
            'issue_id' => 2
        ];
                
        $comment3 = [        
            'content'  => '<p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>',        
            'user_id'  => 3,        
            'issue_id' => 3
        ];
        
        $comment4 = [        
            'content'  => '<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.   
        </p>',        
            'user_id'  => 4,        
            'issue_id' => 4
        ];
        
        $comment5 = [        
            'content'  => '<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.   </p>',        
            'user_id'  => 5,        
            'issue_id' => 5            
        ];
            
        $comment6 = [        
            'content'  => '<p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.   
        </p>',        
            'user_id'  => 6,        
            'issue_id' => 5            
        ];
        
        $comment7 = [        
            'content'  => '<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.   
        </p>',        
            'user_id'  => 7,        
            'issue_id' => 6            
        ];
        
        $comment8 = [        
            'content'  => '<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. </p>',        
            'user_id'  => 8,        
            'issue_id' => 7        
        ];



        $comments = [$commentA, $commentB, $commentC, $commentD, $commentE, $commentF, $commentG, $commentH, $commentI, $commentJ, $comment1, $comment2, $comment3, $comment4, $comment5, $comment6, $comment7, $comment8];

        foreach ($comments as $comment){
            Comment::create($comment);
        }
    }
}

