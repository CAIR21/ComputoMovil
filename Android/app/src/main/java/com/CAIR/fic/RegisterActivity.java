package com.CAIR.fic;

import android.content.Intent;
import android.os.Bundle;
import android.text.method.PasswordTransformationMethod;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Switch;
import android.widget.Toast;
import androidx.appcompat.app.AppCompatActivity;
import com.CAIR.fic.api.Conexion;
import com.CAIR.fic.api.Respuesta;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import servicio.IUsuarios;

public class RegisterActivity extends AppCompatActivity {

    private EditText etNombre;
    private EditText etApellido;
    private EditText etCorreo;
    private EditText etContraReg;
    private EditText etRepContra;
    private Switch switchMostrarContrasenia;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        etNombre = findViewById(R.id.edtNombre);
        etApellido = findViewById(R.id.edtApellido);
        etCorreo = findViewById(R.id.edtCorreo);
        etContraReg = findViewById(R.id.edtContraReg);
        etRepContra = findViewById(R.id.edtRepContra);
        switchMostrarContrasenia = findViewById(R.id.switchMostrarContrasenia);

        Button btnRegister = findViewById(R.id.btnRegistrarseReg);
        btnRegister.setOnClickListener(view -> registerUser());

        Button btnLogin = findViewById(R.id.btnIniciarSesionReg);
        btnLogin.setOnClickListener(view -> IrAlLogin());

        switchMostrarContrasenia.setOnCheckedChangeListener((buttonView, isChecked) -> {
            showHidePassword(isChecked);
        });
    }

    private void registerUser() {
        String nombre = etNombre.getText().toString().trim();
        String apellido = etApellido.getText().toString().trim();
        String correo = etCorreo.getText().toString().trim();
        String contra = etContraReg.getText().toString().trim();
        String repContra = etRepContra.getText().toString().trim();

        if (nombre.isEmpty() || apellido.isEmpty() || correo.isEmpty() || contra.isEmpty() || repContra.isEmpty()) {
            Toast.makeText(this, "Complete todos los campos para registrarse", Toast.LENGTH_SHORT).show();
            return;
        }

        if (!contra.equals(repContra)) {
            Toast.makeText(this, "Las contraseñas no coinciden", Toast.LENGTH_SHORT).show();
            return;
        }

        IUsuarios apiService = Conexion.getDatos().create(IUsuarios.class);

        Call<Respuesta> call = apiService.registerUser(nombre, apellido, correo, contra);
        call.enqueue(new Callback<Respuesta>() {
            @Override
            public void onResponse(Call<Respuesta> call, Response<Respuesta> response) {
                if (response.isSuccessful()) {
                    Respuesta apiResponse = response.body();
                    if (apiResponse.isSuccess()) {
                        Toast.makeText(RegisterActivity.this, "Registro exitoso", Toast.LENGTH_SHORT).show();

                        Intent intent = new Intent(RegisterActivity.this, MainActivity.class);
                        startActivity(intent);
                        finish();
                    } else {
                        Toast.makeText(RegisterActivity.this, apiResponse.getMessage(), Toast.LENGTH_SHORT).show();
                    }
                } else {
                    Toast.makeText(RegisterActivity.this, "Error en la conexión", Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<Respuesta> call, Throwable t) {
                Toast.makeText(RegisterActivity.this, "Error en la conexión", Toast.LENGTH_SHORT).show();
            }
        });
    }

    private void IrAlLogin() {
        Intent intent = new Intent(this, MainActivity.class);
        startActivity(intent);
    }

    private void showHidePassword(boolean show) {
        if (show) {
            etContraReg.setTransformationMethod(null);
            etRepContra.setTransformationMethod(null);
        } else {
            etContraReg.setTransformationMethod(new PasswordTransformationMethod());
            etRepContra.setTransformationMethod(new PasswordTransformationMethod());
        }
    }
}
