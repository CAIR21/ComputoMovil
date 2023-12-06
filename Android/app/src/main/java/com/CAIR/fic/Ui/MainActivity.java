package com.CAIR.fic.Ui;

import android.content.Intent;
import android.os.Bundle;
import android.text.method.PasswordTransformationMethod;
import android.widget.Button;
import android.widget.Switch;
import android.widget.EditText;
import android.widget.Toast;
import androidx.appcompat.app.AppCompatActivity;

import com.CAIR.fic.R;
import com.CAIR.fic.api.Conexion;
import com.CAIR.fic.api.Respuesta;
import com.CAIR.fic.servicio.IUsuarios;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity {

    private EditText EdtCorreo;
    private EditText EdtContrasenia;
    private Switch SwitchMostrarContrasenia;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        EdtCorreo = findViewById(R.id.edtCorreo);
        EdtContrasenia = findViewById(R.id.edtContra);
        SwitchMostrarContrasenia = findViewById(R.id.switchMostrarContrasena);

        Button BtnLogin = findViewById(R.id.btnIniciarSesion);
        BtnLogin.setOnClickListener(view -> loginUsuario());

        Button BtnRegister = findViewById(R.id.btnRegistrarse);
        BtnRegister.setOnClickListener(view -> irAlRegistro());

        SwitchMostrarContrasenia.setOnCheckedChangeListener((buttonView, isChecked) -> {
            mostrarOcultarContra(isChecked);
        });
    }

    private void loginUsuario() {
        String Correo = EdtCorreo.getText().toString().trim();
        String Contrasenia = EdtContrasenia.getText().toString().trim();

        if (Correo.isEmpty() || Contrasenia.isEmpty()) {
            showToast("Complete todos los campos.");
            return;
        }

        IUsuarios apiService = Conexion.getDatos().create(IUsuarios.class);

        Call<Respuesta> call = apiService.loginUsuario(Correo, Contrasenia);
        call.enqueue(new Callback<Respuesta>() {
            @Override
            public void onResponse(Call<Respuesta> call, Response<Respuesta> response) {
                if (response.isSuccessful()) {
                    Respuesta apiResponse = response.body();
                    if ("Conexión exitosa.".equals(apiResponse.getMessage())) {
                        showToast("Conexión exitosa.");
                    } else {
                        showToast(apiResponse.getMessage()); // Fallido
                    }
                } else {
                    showToast("Correo o contraseña incorrectos."); // Servidor
                }
            }

            @Override
            public void onFailure(Call<Respuesta> call, Throwable t) {
                showToast("Correo o contraseña incorrectos.");
            }
        });
    }

    private void showToast(final String Texto) {
        runOnUiThread(() -> {
            if (Texto != null) {
                Toast.makeText(MainActivity.this, Texto, Toast.LENGTH_SHORT).show();
            }else{
                Intent intent = new Intent(MainActivity.this, MenuActivity.class);
                startActivity(intent);
                finish();
            }
        });
    }

    private void irAlRegistro() {
        Intent intent = new Intent(this, RegisterActivity.class);
        startActivity(intent);
    }

    private void mostrarOcultarContra(boolean Mostar) {
        if (Mostar) {
            EdtContrasenia.setTransformationMethod(null);
        } else {
            EdtContrasenia.setTransformationMethod(new PasswordTransformationMethod());
        }
    }
}
