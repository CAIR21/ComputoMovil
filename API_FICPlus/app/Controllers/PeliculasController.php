<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Peliculas;

class PeliculasController extends ResourceController
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

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $ModeloPeliculas = new Peliculas();
        $pelicula = $ModeloPeliculas->getWhere(['ID_Peliculas' => $id])->getResult();
        if($pelicula){
            return $this->respond($pelicula);
        }else{
            return $this->failNotFound("Error, Pelicula No Encontrada");
        }
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
        $ModeloPeliculas = new Peliculas();
        $Datos = [
            'Titulo' => $this->request->getVar('Titulo'),
            'Descripcion' => $this->request->getVar('Descripcion'),
            'Director' => $this->request->getVar('Director'),
            'Enlace_Video' => $this->request->getVar('Enlace_Video'),
            'ID_Categoria' => $this->request->getVar('ID_Categoria'),
            'Etiquetas' => $this->request->getVar('Etiquetas'),
            'ID_Clasificacion' => $this->request->getVar('ID_Clasificacion'),
        ];

            $ModeloPeliculas->insert($Datos);

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
        //METODO UPDATE
        $ModeloPeliculas = new Peliculas(); 
        $Datos = $this->request->getJSON();

        $datosActualizar = [
            'Titulo' => $Datos->Titulo,
            'Descripcion' => $Datos->Descripcion,
            'Director' => $Datos->Director,
            'ID_Categoria' => $Datos->ID_Categoria,
            'Etiquetas' => $Datos->Etiquetas,
            'ID_Clasificacion' => $Datos->ID_Clasificacion,
            
        ];

        $ModeloPeliculas->update($id,$datosActualizar);

        $resultado = [
            'estatus' => 200,
            'error' => null,
            'mensaje' => ['success' => 'Recurso Actualizado con Exito']
        ];
        return $this->respond($resultado);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $ModeloPeliculas = new Peliculas();
        $Dato = $ModeloPeliculas->find();
        if($Dato){
            $ModeloPeliculas->delete($id);

            $resultado = [
                'estatus' => 200,
                'error' => null,
                'mensaje' => ['success' => 'Recurso Eliminado con Exito']
            ];

            return $this->respondDeleted($resultado);
        }else{
            return $this->failNotFound('Recurso no encontrado con el identificador '.$id);
        }
    }
}
