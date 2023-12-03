package com.CAIR.fic.api;

import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class Conexion {

    private static final String BASE_URL = "https://fic-plus.000webhostapp.com/";

    private static Retrofit retrofit;

    public static Retrofit getDatos() {
        if (retrofit == null) {
            retrofit = new Retrofit.Builder()
                    .baseUrl(BASE_URL)
                    .addConverterFactory(GsonConverterFactory.create())
                    .build();
        }
        return retrofit;
    }
}
