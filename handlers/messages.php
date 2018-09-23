<?php

include('../config.php');

session_start();

switch($_REQUEST['action']) {
    case 'sendMessage':
        $query = $db->prepare("INSERT INTO messages SET user=?, message=?");
        $run = $query->execute([$_SESSION['username'], $_REQUEST['message']]);
        if($run) {
            echo 1;
            exit;
        }
        break;
    case 'getMessages':
        $query = $db->prepare("SELECT * FROM messages");
        $run = $query->execute();
        $rs = $query->fetchall(PDO::FETCH_OBJ);

        $chat = '';
        foreach($rs as $row) {

            $chat .= '<div class="single-message">
                          <strong>' . $row->user . ': </strong> ' . $row->message . '
                          <span>' . $row->date . '</span>
                      </div>';
        }
        echo $chat;

}