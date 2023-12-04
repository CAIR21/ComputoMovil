package com.CAIR.fic.servicio;

import com.CAIR.fic.api.Respuesta;
import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.POST;

public interface IUsuarios{

    @FormUrlEncoded
    @POST("login")
    Call<Respuesta> loginUser(
            @Field("email") String correo,
            @Field("password") String contrasenia
    );

    @FormUrlEncoded
    @POST("usuarios")
    Call<Respuesta> registerUser(
            @Field("Nombre_Usuario") String nombre,
            @Field("Apellido_Usuario") String apellido,
            @Field("Correo") String correo,
            @Field("Contrasenia") String contrasenia
    );
}
