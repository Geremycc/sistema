<?php
namespace App\Controllers;
use App\Models\Persona;

class anadir extends BaseController{
    private $usuario;
    
    public function index() {
        $data['titulo'] = "Ingresar Usuarios";
        return view("Anadir/index", $data);
    }
    
    public function guardarUsuario() {
        if ($this->request->getMethod() === 'post') {
            $personaModel = new Persona();
            $personaData = [
                'nombre' => $this->request->getPost('nombre'),
                'apellido' => $this->request->getPost('apellido'),
                'telefono' => $this->request->getPost('telefono'),
                'edad' => $this->request->getPost('edad'),
                'email' => $this->request->getPost('email')
            ];
            $personaModel->insert($personaData);
        }
        
        // Después de guardar, redirigir a la vista de "Personas/index"
        return redirect()->to(site_url('Personas/index'));
    }
}