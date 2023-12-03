package com.CAIR.fic;

import android.content.Intent;
import android.os.Bundle;
import android.text.method.PasswordTransformationMethod;
import android.widget.Button;
import android.widget.Switch;
import android.widget.EditText;
import android.widget.Toast;
import androidx.appcompat.app.AppCompatActivity;
import com.CAIR.fic.api.Conexion;
import com.CAIR.fic.api.Respuesta;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import servicio.IUsuarios;

public class MainActivity extends AppCompatActivity {

    private EditText etCorreo;
    private EditText etContrasenia;
    private Switch switchMostrarContrasenia;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        etCorreo = findViewById(R.id.edtCorreo);
        etContrasenia = findViewById(R.id.edtContra);
        switchMostrarContrasenia = findViewById(R.id.switchMostrarContrasena);

        Button btnLogin = findViewById(R.id.btnIniciarSesion);
        btnLogin.setOnClickListener(view -> loginUser());

        Button btnRegister = findViewById(R.id.btnRegistrarse);
        btnRegister.setOnClickListener(view -> IrAlRegistro());

        switchMostrarContrasenia.setOnCheckedChangeListener((buttonView, isChecked) -> {
            showHidePassword(isChecked);
        });
    }

    private void loginUser() {
        String Correo = etCorreo.getText().toString().trim();
        String Contrasenia = etContrasenia.getText().toString().trim();

        if (Correo.isEmpty() || Contrasenia.isEmpty()) {
            showToast("Complete todos los campos.");
            return;
        }

        IUsuarios apiService = Conexion.getDatos().create(IUsuarios.class);

        Call<Respuesta> call = apiService.loginUser(Correo, Contrasenia);
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

    private void showToast(final String texto) {
        runOnUiThread(() -> {
            if (texto != null) {
                Toast.makeText(MainActivity.this, texto, Toast.LENGTH_SHORT).show();
            }else{
                Intent intent = new Intent(MainActivity.this, MenuActivity.class);
                startActivity(intent);
                finish();
            }
        });
    }

    private void IrAlRegistro() {
        Intent intent = new Intent(this, RegisterActivity.class);
        startActivity(intent);
    }

    private void showHidePassword(boolean show) {
        if (show) {
            etContrasenia.setTransformationMethod(null);
        } else {
            etContrasenia.setTransformationMethod(new PasswordTransformationMethod());
        }
    }
}
