<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Usuarios;

class UsuariosController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
    }

    public function login()
    {
        $Datos = [
            'Correo' => $this->request->getVar('email'),
            'Contra' => $this->request->getVar('password')
        ];
        $modelo = new Usuarios();

        $solicitud = $modelo->getWhere(['Correo' => $Datos['Correo']])->getRow();
        if($solicitud){
            if(md5($Datos['Contra']) == $solicitud->Contrasenia){
                $resultado = [
                    'estatus' => 200,
                    'error' => null,
                    'mensaje' => ['success' => 'Inicio de Sesión Correcto']
                ];
                return $this->respond($resultado);
            }
            var_dump("hola");
        }else{
            return $this->respond("Error, valide los datos");
        }

    }


    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {

    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //METODO POST
        $Modelo = new Usuarios();
        $datos = [
            'Nombre_Usuario' => $this->request->getVar('Nombre_Usuario'),
            'Apellido_Usuario' => $this->request->getVar('Apellido_Usuario'),
            'Correo' => $this->request->getVar('Correo'),
            'Contrasenia' => $this->request->getVar('Contrasenia')
        ];
        $datos['Contrasenia'] = md5($datos['Contrasenia']);
        

        $Modelo->insert($datos); //Se insertan los Datos en la BD

        $resultado = [
            'estatus' => 201,
            'error' => null,
            'mensaje' => ['success' => 'Recurso Almacenado con Exito']
        ];

        return $this->respondCreated($resultado,201);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
