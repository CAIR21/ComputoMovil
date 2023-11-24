package com.CAIR.fic;

import android.content.Intent;
import android.os.Bundle;
import android.widget.Button;

import androidx.appcompat.app.AppCompatActivity;


public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        Button IrAlRegistro = findViewById(R.id.btnRegistrarse);
        IrAlRegistro.setOnClickListener(view -> IrAlRegister());
    }

    private void IrAlRegister() {
        Intent i = new Intent(this, RegisterActivity.class);
        startActivity(i);
    }
}
