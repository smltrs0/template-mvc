<?php
namespace Models;

use Core\Core;
use Exception;
use Models\Session;
use Config\Database;
use Illuminate\Database\Capsule\Manager as DB;

class User {

    public function __construct() {
        new Database();
    }
    
    public function create($usuario){
        try{
            $username = $usuario['username'];
            $nombre = $usuario['first_name'];
            $apellido = $usuario['last_name'];
            $email = $usuario['email'];
            $password = $usuario['password'];
            $accept_terms = $usuario['accept_terms'];
            $usuario_tipo = $usuario['in_UsuarioTipo'] ?? 0;
            $usuario['perfil_id'] = $usuario_tipo;
            
            if($password !== $usuario['password_confirmation']) throw new Exception("Las contraseñas no coinciden");
            if(!$this->validateEmail($email)) throw new Exception("El email no es valido");
            if($accept_terms === "false" ) throw  new Exception("Debe aceptar los términos y condiciones");
            if(!$this->validatePassword($password)) throw  new Exception("La contraseña debe tener al menos 6 caracteres");
            if(!$this->validateUsername($username)) throw  new Exception("El nombre de usuario ya existe");

            $usuario_ingresado = DB::table('usuarios')->insert([
                'username' => $username,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email' => $email,
                'clave' => password_hash($password, PASSWORD_DEFAULT),
                'perfil_id' => $usuario_tipo
            ]);

            Session::setUsuario($usuario);

            Core::setResponse(['status' => true, 'msg' => 'Usuario creado correctamente']);
        }catch(Exception $e){
            Core::setResponse(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function update($usuario){
        try{
            $username = $usuario['username'];
            $nombre = $usuario['first_name'];
            $apellido = $usuario['last_name'];
            $email = $usuario['email'];
            $password = $usuario['password'];
            $accept_terms = $usuario['accept_terms'];
            $usuario_tipo = $usuario['in_UsuarioTipo'] ?? 0;
            $usuario['perfil_id'] = $usuario_tipo;
                        
            if($password !== $usuario['password_confirmation']) throw new Exception("Las contraseñas no coinciden");
            if(!$this->validateEmail($email)) throw new Exception("El email no es valido");
            if($accept_terms === "false" ) throw  new Exception("Debe aceptar los términos y condiciones");
            if(!$this->validatePassword($password)) throw  new Exception("La contraseña debe tener al menos 6 caracteres");
            if(!$this->validateUsername($username)) throw  new Exception("El nombre de usuario ya existe");
                        
            $usuario_actualizado = DB::table('usuarios')->where('id', Session::getUsuario()['id'])->update([
                'username' => $username,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email' => $email,
                'clave' => password_hash($password, PASSWORD_DEFAULT),
                'perfil_id' => $usuario_tipo
            ]);
            Core::setResponse(['status' => true, 'msg' => 'Usuario actualizado correctamente']);
        }catch(Exception $e){
            Core::setResponse(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function delete($id){
        try{
            $usuario_eliminado = DB::table('usuarios')->where('id', $id)->delete();
            Core::setResponse(['status' => true, 'msg' => 'Usuario eliminado correctamente']);
        }catch(Exception $e){
            Core::setResponse(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    public function all($consulta = []){
        $usuarios = DB::table('usuarios')
        ->when(isset($consulta['filtros']) ,function($usuarios) use ($consulta){
            return $usuarios->where('username', 'like', '%'.$consulta['filtros'].'%')
            ->orWhere('nombre', 'like', '%'.$consulta['filtros'].'%')
            ->orWhere('apellido', 'like', '%'.$consulta['filtros'].'%')
            ->orWhere('email', 'like', '%'.$consulta['filtros'].'%');
        })
        ->get();

        Core::setResponse(['status' => true, 'data' => $usuarios]);
    }

    private function validateEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        return true;
    }

    private function validatePassword($password){
        if(strlen($password) < 6){
            return false;
        }
        return true;
    }

    private function validateUsername($username){
        return DB::table('usuarios')->where('username', $username)->count() == 0;
    }
}
