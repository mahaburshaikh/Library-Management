package com.example.mahaburshaikh.a2017;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class Faculty extends AppCompatActivity {

    Button cse,bba,ag,fish,nfs,land,dm;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_faculty);

        cse = (Button)findViewById(R.id.cse);
        bba = (Button)findViewById(R.id.bba);
        ag = (Button)findViewById(R.id.ag);
        fish = (Button)findViewById(R.id.fish);
        nfs = (Button)findViewById(R.id.nfs);
        land = (Button)findViewById(R.id.land);
        dm = (Button)findViewById(R.id.dm);

        cse.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Faculty.this,Firstpage.class);
                startActivity(intent);

            }
        });
        bba.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Faculty.this,Bam.class);
                startActivity(intent);
            }
        });
        ag.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Faculty.this,Agriculture.class);
                startActivity(intent);
            }
        });
        fish.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Faculty.this,Fisheries.class);
                startActivity(intent);
            }
        });
        nfs.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Faculty.this,Nfs.class);
                startActivity(intent);
            }
        });
        land.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Faculty.this,Land.class);
                startActivity(intent);
            }
        });
        dm.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(Faculty.this,Disaster.class);
                startActivity(intent);
            }
        });

    }
}
