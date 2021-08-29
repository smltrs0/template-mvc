<?php
header("Access-Control-Allow-Origin: *");
include './../vendor/autoload.php';

use Core\Core;
use Models\Login;
 if (isset($_POST['action'])) {
     $login = new Login();
    switch ($_POST['action']) {
        case 'login':
            $login->login($_POST['email'], $_POST['password']);
            break;
        case 'logout':
            $login->logout();
            break;
        default :
            $response = ['status' => 'error', 'message' => 'Invalid action'];
        break;
    }
}else{
    Core::setResponse(['status' => 'error', 'message' => 'Invalid action']);
}
echo json_encode(Core::$response);
?>
