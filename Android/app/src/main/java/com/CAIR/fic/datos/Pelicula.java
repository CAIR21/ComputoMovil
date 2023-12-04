package com.CAIR.fic.datos;

import java.io.Serializable;

public class Pelicula implements Serializable {
    private int ID_Peliculas;
    private String Titulo;
    private String Descripcion;
    private String Director;
    private String Enlace_Video;
    private String ID_Categoria;
    private String Etiquetas;
    private String ID_Clasificacion;
    private String Anio;
    private String Poster_Pelicula;
    private String Banner_Pelicula;


    // Métodos getter
    public int getID_Peliculas() {
        return ID_Peliculas;
    }

    public String getTitulo() {
        return Titulo;
    }

    public String getDescripcion() {
        return Descripcion;
    }

    public String getDirector() {
        return Director;
    }

    public String getEnlace_Video() {
        return Enlace_Video;
    }

    public String getID_Categoria() {
        return ID_Categoria;
    }

    public String getEtiquetas() {
        return Etiquetas;
    }

    public String getID_Clasificacion() {
        return ID_Clasificacion;
    }

    public String getAnio() {
        return Anio;
    }

    public String getPoster_Pelicula() {
        return Poster_Pelicula;
    }

    public String getBanner_Pelicula() {
        return Banner_Pelicula;
    }
}
