<?php

use Illuminate\Database\Seeder;
use App\Models\Message;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
    {
        $messageA = [
            'from_user_id' => 10,
            'to_user_id' => 1,
            'subject' => 'aliquip ex ea commodo',
            'content' => 'Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat'
        ];

        $messageB = [
            'from_user_id' => 11,
            'to_user_id' => 1,
            'subject' => 'Aw: Lorem ipsum',
            'content' => '<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet</p><hr /><p>2018-08-12 17:01:53 from Stefan Schiffer</p><blockquote><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p></blockquote>'
        ];

        $messages  = [$messageA, $messageB];

        foreach ($messages as $message){
            Message::create($message);
        }
        
    }
}
