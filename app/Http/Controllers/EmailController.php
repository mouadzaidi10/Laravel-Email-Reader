<?php

namespace App\Http\Controllers;

use Webklex\PHPIMAP\Client;
use GuzzleHttp\Psr7\Request;
use Webklex\PHPIMAP\ClientManager;
use Symfony\Component\Console\Input\Input;

class EmailController extends Controller{

    public function email_info () {

        $cm = new ClientManager('config/imap.php');
        $client = $cm->make([
            'host'          => 'imap.gmail.com',
            'port'          => 993,
            'encryption'    => 'ssl',
            'validate_cert' => true,
            'username'      => 'root@example.com',
            'password'      => '',
            'protocol'      => 'imap'
        ]);
        $client->connect();

        return $client;
        
    }

    public function get_email ($name) {

        $client = $this->email_info();

        $folder = $client->getFolders(true, $name);

        foreach($folder as $folder){
            //Get all Messages of the current Mailbox $folder
            /** @var \Webklex\IMAP\Support\MessageCollection $message */
            $message = $folder->messages()->all()->get();
            
            /** @var \Webklex\IMAP\Message $message */
            foreach($message as $message){
                echo '<h2>Subject : </h2>' . $message->getSubject().'<br />';
                echo '<h2>From : </h2>' . $message->getFrom()[0]->mail.'<br />';
                echo '<h2>Message : </h2>' .  $message->getHTMLBody(true);
            }
        }

        $client->disconnect();

    }
    
    public function Inbox(){

        $this->get_email('inbox');

    }

    public function Important(){

        $this->get_email('[Gmail]/Important');

    }

    public function Sent(){

        $this->get_email('[Gmail]/Sent Mail');

    }

    public function Trash(){

        $this->get_email('[Gmail]/Trash');

    }

    public function Spam(){

        $this->get_email('[Gmail]/Spam');

    }

    public function Starred(){

        $this->get_email('[Gmail]/Starred');

    }

}
