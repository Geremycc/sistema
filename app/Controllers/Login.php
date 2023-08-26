<?php
namespace App\Controllers;
use App\Models\Usuario;

class Login extends BaseController
{
    protected $usuario;
    public function index()
    {
        //$encrypter = \Config\Services::encrypter();
        //$clave = bin2hex($encrypter->encrypt(123));
        //echo $clave;
        return view("Login/index");
    }
    public function validarIngreso()
    {
        $emailUsuario =$this->request->getPost("emailUsuario");
        if(filter_var($emailUsuario, FILTER_VALIDATE_EMAIL))
        {
            $email=filter_var($emailUsuario,FILTER_SANITIZE_EMAIL);
            $this->usuario=new Usuario();
            $resultadoUsuario=$this->usuario->buscarUsuarioPorEmail($email);
        }else{
            $usuario=preg_replace("/[^a-zA-Z0-9.-]/","",$emailUsuario);
            $this->usuario=new Usuario();
            $resultadoUsuario=$this->usuario->buscarUsuarioPorUsuario($usuario);
        }
        if($resultadoUsuario)
        {
            $encrypter = \Config\Services::encrypter();
            $claveDB = $encrypter->decrypt(hex2bin($resultadoUsuario->clave));
            $clave=$this->request->getPost("clave");
            if ($clave==$claveDB){
                $data=[
                    "nombreUsuario"=>$resultadoUsuario->nombre.' '.$resultadoUsuario->apellido,
                    "emailUsuario"=>$resultadoUsuario->email,
                    "fotoUsuario"=>$resultadoUsuario->foto
                ];
                session()->set($data);
                return redirect()->to(base_url().'/escritorio');

            }else{
                $data = ['tipo'=> 'danger','mensaje'=>'La clave es incorrecta'];
                return view('Login/index',$data);

            }


        }else{
            $data=['tipo'=>'danger','mensaje'=>'Usuario incorrecto o inactivo'];
            return view('Login/index',$data);
        }

    }
    public function cerrarSesion(){
        session()->destroy();
        return redirect()->to(base_url());

    }
}
