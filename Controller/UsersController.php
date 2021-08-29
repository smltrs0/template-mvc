<?php
include './../vendor/autoload.php';

use Core\Core;
use Models\User;
if (isset($_POST['action'])) {

    $user = new  User();

    switch ($_POST['action']) {
        case 'register':
            $user->create($_REQUEST);
        break;
        case 'edit':
            $user->update($_REQUEST);
        break;
        case 'delete':
            $user->delete($id);
        break;
        case 'getAll':
            $user->all($_REQUEST);
        break;
        default: 
            Core::setResponse(['status' => 'error', 'message' => 'Invalid action']);
        break;
    }
}    

echo json_encode(Core::$response);
