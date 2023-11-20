package com.example.fic

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        val IrAlRegistro = findViewById<Button>(R.id.Ir_Registro)
        IrAlRegistro.setOnClickListener{
            IrAlRegister()
        }
    }
    private fun IrAlRegister() {
        val i = Intent(this, RegisterActivity:: class.java)
        startActivity(i)
    }
}