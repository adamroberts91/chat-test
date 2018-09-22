<?php

include('../config.php');

switch($_REQUEST['action']) {
    case 'sendMessage':
        $message = $_REQUEST['message'];
        $query = $db->prepare("INSERT INTO messages SET message='$message'");
        $query->execute();
        break;
}