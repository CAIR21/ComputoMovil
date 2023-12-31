<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('inicio.php');
    }

    public function inicio(){
        return view("login2.php");
    }

    public function Menu_Principal(){
        return view("Menu_PrincipalCanon.php");
    }
    public function Menu_Pelicula(){
        return view("Menu_Pelicula.php");
    }

    public function Registrar(){
        return view("Register2.php");
    }
    public function busqueda($Suchen = null){
        $data['Suchen'] = $Suchen;
        return view("Menu_Busqueda.php", $data);
    }
    public function busquedaCat($Suchen = null){
        $data['Suchen'] = $Suchen;
        return view("Menu_BusquedaCat.php", $data);
    }
    public function Menu_Categorias(){
        return view("Menu_Categorias.php");
    }
}
