package com.CAIR.fic.servicio;

import com.CAIR.fic.datos.Pelicula;

import java.util.List;

import retrofit2.Call;
import retrofit2.http.GET;

public interface IPeliculas {
    @GET("peliculas")
    Call<List<Pelicula>> getPeliculas();
}
