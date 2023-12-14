package com.CAIR.fic.Ui;

import android.content.Intent;
import android.os.Bundle;
import android.text.method.PasswordTransformationMethod;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Switch;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.CAIR.fic.R;
import com.CAIR.fic.api.Conexion;
import com.CAIR.fic.api.Respuesta;
import com.CAIR.fic.servicio.IUsuarios;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class RegisterActivity extends AppCompatActivity {

    private EditText EdtNombre;
    private EditText EdtApellido;
    private EditText EdtCorreo;
    private EditText EdtContraReg;
    private EditText EdtRepContra;
    private Switch SwitchMostrarContrasenia;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        EdtNombre = findViewById(R.id.edtNombre);
        EdtApellido = findViewById(R.id.edtApellido);
        EdtCorreo = findViewById(R.id.edtCorreo);
        EdtContraReg = findViewById(R.id.edtContraReg);
        EdtRepContra = findViewById(R.id.edtRepContra);
        SwitchMostrarContrasenia = findViewById(R.id.switchMostrarContrasenia);

        Button BtnRegister = findViewById(R.id.btnRegistrarseReg);
        BtnRegister.setOnClickListener(view -> registroUsuario());

        Button BtnLogin = findViewById(R.id.btnIniciarSesionReg);
        BtnLogin.setOnClickListener(view -> irAlLogin());

        SwitchMostrarContrasenia.setOnCheckedChangeListener((buttonView, isChecked) -> mostarOcultarContra(isChecked));
    }

    private void registroUsuario() {
        String nombre = EdtNombre.getText().toString().trim();
        String apellido = EdtApellido.getText().toString().trim();
        String correo = EdtCorreo.getText().toString().trim();
        String contra = EdtContraReg.getText().toString().trim();
        String repContra = EdtRepContra.getText().toString().trim();

        if (nombre.isEmpty() || apellido.isEmpty() || correo.isEmpty() || contra.isEmpty() || repContra.isEmpty()) {
            Toast.makeText(this, "Complete todos los campos para registrarse.", Toast.LENGTH_SHORT).show();
            return;
        }

        if (!nombre.matches("^[a-zA-Z ]+$")) {
            Toast.makeText(this, "El nombre solo debe contener letras.", Toast.LENGTH_SHORT).show();
            return;
        }

        if (!apellido.matches("^[a-zA-Z ]+$")) {
            Toast.makeText(this, "El apellido solo debe contener letras.", Toast.LENGTH_SHORT).show();
            return;
        }

        if (!android.util.Patterns.EMAIL_ADDRESS.matcher(correo).matches() || !correo.matches(".*@.*") || !correo.substring(correo.indexOf("@")).contains(".com")) {
            Toast.makeText(this, "Ingrese una dirección de correo electrónico válida.", Toast.LENGTH_SHORT).show();
            return;
        }

        if (contra.length() < 8) {
            Toast.makeText(this, "La contraseña debe tener al menos 8 caracteres.", Toast.LENGTH_SHORT).show();
            return;
        }

        if (!contra.matches(".*[A-Z].*")) {
            Toast.makeText(this, "La contraseña debe contener al menos una letra mayúscula.", Toast.LENGTH_SHORT).show();
            return;
        }

        if (!contra.matches(".*[@#$%^&+=!].*")) {
            Toast.makeText(this, "La contraseña debe contener al menos un carácter especial.", Toast.LENGTH_SHORT).show();
            return;
        }

        if (!contra.matches(".*\\d.*")) {
            Toast.makeText(this, "La contraseña debe contener al menos un número.", Toast.LENGTH_SHORT).show();
            return;
        }

        if (!contra.equals(repContra)) {
            Toast.makeText(this, "Las contraseñas no coinciden.", Toast.LENGTH_SHORT).show();
            return;
        }


        IUsuarios apiService = Conexion.getDatos().create(IUsuarios.class);

        Call<Respuesta> call = apiService.registroUsuario(nombre, apellido, correo, contra);
        call.enqueue(new Callback<Respuesta>() {
            @Override
            public void onResponse(Call<Respuesta> call, Response<Respuesta> response) {
                if (response.isSuccessful()) {
                     Toast.makeText(RegisterActivity.this, "Registro exitoso", Toast.LENGTH_SHORT).show();
                    Intent intent = new Intent(RegisterActivity.this, MainActivity.class);
                    startActivity(intent);
                    finish();
                } else {
                    Toast.makeText(RegisterActivity.this, "Error en la conexión", Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<Respuesta> call, Throwable t) {
                Toast.makeText(RegisterActivity.this, "Sin conexion a internet.", Toast.LENGTH_SHORT).show();
            }
        });
    }

    private void irAlLogin() {
        Intent intent = new Intent(this, MainActivity.class);
        startActivity(intent);
    }

    private void mostarOcultarContra(boolean Mostar) {
        if (Mostar) {
            EdtContraReg.setTransformationMethod(null);
            EdtRepContra.setTransformationMethod(null);
        } else {
            EdtContraReg.setTransformationMethod(new PasswordTransformationMethod());
            EdtRepContra.setTransformationMethod(new PasswordTransformationMethod());
        }
    }
}
