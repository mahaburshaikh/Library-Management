package com.example.mahaburshaikh.a2017;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {

    Button fac,dept,post;
    //String customer_username;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        fac=(Button)findViewById(R.id.facul);
        dept = (Button)findViewById(R.id.depart);

        fac.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(MainActivity.this,Faculty.class);
                startActivity(intent);
            }
        });

        dept.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(MainActivity.this,adddep.class);
                startActivity(intent);
            }
        });



    }
}