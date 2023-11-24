package com.CAIR.fic;

import android.content.Intent;
import android.os.Bundle;
import android.widget.Button;
import androidx.appcompat.app.AppCompatActivity;


public class RegisterActivity extends AppCompatActivity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        Button IrAlLogin = findViewById(R.id.btnIniciarSesionReg);
        IrAlLogin.setOnClickListener(view -> IrAlLogin());
    }

    private void IrAlLogin() {
        Intent i = new Intent(this, MainActivity.class);
        startActivity(i);
    }
}
