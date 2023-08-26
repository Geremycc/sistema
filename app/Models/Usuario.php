<?php
namespace App\Models;
use CodeIgniter\Model;

class Usuario extends Model{
    protected $table = 'usuario';
    protected $primaryKey = 'id';

    public function buscarUsuarioPorEmail($email)
    {
        $db=db_connect();
        $builder=$db->table($this->table)->where('email',$email)->where('estado','A');
        $resultado=$builder->get();
        return $resultado->getResult() ? $resultado->getResult()[0] : false;
    }
    public function buscarUsuarioPorUsuario($usuario)
    {
        $db=db_connect();
        $builder=$db->table($this->table)->where('usuario',$usuario)->where('estado','A');
        $resultado=$builder->get();
        return $resultado->getResult() ? $resultado->getResult()[0] : false; 
    }


}