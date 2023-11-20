package com.example.fic

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button

class RegisterActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_register)
        val IrAlLogin = findViewById<Button>(R.id.Ir_Login)
        IrAlLogin.setOnClickListener{
            IrAlLogin()
        }
    }
    private fun IrAlLogin() {
        val i = Intent(this, MainActivity:: class.java)
        startActivity(i)

    }
}