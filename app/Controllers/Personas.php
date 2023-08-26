<?php
// app/Controllers/Personas.php
namespace App\Controllers;
use App\Models\Persona;

class Personas extends BaseController{
    private $usuario;

    public function borrarPersona($id) {
        $personaModel = new Persona();
        $personaModel->delete($id);
    
        // Devolver una respuesta JSON para indicar éxito
        return $this->response->setJSON(['success' => true]);
    }
    
    public function actualizarPersona() {
        $personaModel = new Persona();
        
        if ($this->request->getMethod() === 'post') {
            $personaId = $this->request->getPost('id');
            $personaData = [
                'nombre' => $this->request->getPost('nombre'),
                'apellido' => $this->request->getPost('apellido'),
                'telefono' => $this->request->getPost('telefono'),
                'edad' => $this->request->getPost('edad'),
                'email' => $this->request->getPost('email'),
                // Agregar otros campos si es necesario
            ];
            
            $personaModel->actualizarPersona($personaId, $personaData);
            return $this->response->setJSON(['success' => true]);
            return redirect()->to(site_url('Personas/index')); // Redirige después de la actualización
        }
    }
    public function obtenerPersona($id) {
        $personaModel = new Persona();
        $persona = $personaModel->find($id); // Obtener los datos de la persona por ID

        if ($persona) {
            // Crear el formato HTML similar al de las filas de la tabla
            $html = '<tr data-id="' . $persona['id'] . '">';
            $html .= '<td class="nombre">' . esc($persona['nombre']) . '</td>';
            $html .= '<td class="apellido">' . esc($persona['apellido']) . '</td>';
            $html .= '<td class="telefono">' . esc($persona['telefono']) . '</td>';
            $html .= '<td class="edad">' . esc($persona['edad']) . '</td>';
            $html .= '<td class="email">' . esc($persona['email']) . '</td>';
            $html .= '<td>';
            $html .= '<a href="#" class="btn btn-sm btn-info editar-persona" data-id="' . $persona['id'] . '">editar</a>';
            $html .= '<a href="#" class="btn btn-sm btn-danger delete-persona" data-id="' . $persona['id'] . '">borrar</a>';
            $html .= '</td>';
            $html .= '</tr>';

            // Devolver el HTML generado
            return $this->response->setJSON(['success' => true, 'html' => $html]);
        } else {
            // Devolver un mensaje de error si no se encuentra la persona
            return $this->response->setJSON(['success' => false, 'message' => 'Persona no encontrada']);
        }
    }

    public function index(){
        $personaModel = new Persona();
        $data['personas'] = $personaModel->findAll();
        
        return view("Personas/index", $data);
    }
}

