package com.CAIR.fic;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.appcompat.app.AppCompatActivity;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        Button IrAlRegistro = findViewById(R.id.Ir_Registro);
        IrAlRegistro.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                IrAlRegister();
            }
        });
    }

    private void IrAlRegister() {
        Intent i = new Intent(this, RegisterActivity.class);
        startActivity(i);
    }
}
