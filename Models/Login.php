<?php
namespace Models;

use Core\Core;
use Exception;
use Config\Database;
use Illuminate\Database\Capsule\Manager as DB;

class Login{
    private $username;
    private $password;

    public function __construct(){
        new Database();
    }

    public function login($username, $password){
        $this->username = $username;
        $this->password = $password;
        
        try{
            $this->user = DB::table('usuarios')->where('email', $this->username)->where('clave', sha1($this->password))->first();
            if($this->user->email !== null && $this->user->clave !== null){
                    $_SESSION['user_id'] = $this->user->id;
                    $_SESSION['user_name'] = $this->user->nombre;
                    $_SESSION['user_email'] = $this->user->email;
                    // $_SESSION['user_type'] = $this->user->user_type;
                    // $_SESSION['user_phone'] = $this->user->phone;
                    // $_SESSION['user_address'] = $this->user->address;
                    // $_SESSION['user_image'] = $this->user->image;
                    // $_SESSION['user_created'] = $this->user->created;
                    $response = ['status' => true, 'msg' => 'Validado exitosamente'];
               
            }else{
                $response = [ 'status' => false, 'msg' => 'Usuario o contraseña incorrectos' ];
            }
        }catch(Exception $e){
            $response = [ 'status' => false, 'msg' => $e->getMessage() ];
        }
        return Core::setResponse($response);
    }

    public function logout(){
        session_destroy();
    }

}