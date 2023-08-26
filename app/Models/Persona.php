<?php
namespace App\Models;
use CodeIgniter\Model;

class Persona extends Model{
    protected $table = 'personas'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id';

    protected $allowedFields = ['nombre', 'apellido', 'telefono', 'edad', 'email'];
    
    public function actualizarPersona($id, $datos) {
        // Asegúrate de que los campos en $datos coincidan con los campos permitidos en $allowedFields
        $datosValidos = array_intersect_key($datos, array_flip($this->allowedFields));
        if (!empty($datosValidos)) {
            $this->update($id, $datosValidos);
        }
    }

    // No es necesario definir los métodos buscarUsuarioPorEmail y buscarUsuarioPorUsuario
}





