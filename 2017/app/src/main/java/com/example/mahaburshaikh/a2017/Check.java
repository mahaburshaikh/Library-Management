package com.example.mahaburshaikh.a2017;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.Button;

public class Check extends AppCompatActivity {

    Button m,n;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_check);

        m =(Button)findViewById(R.id.bname);
        n = (Button)findViewById(R.id.atname);

        final String book = getIntent().getStringExtra("checkbook");
        final String author = getIntent().getStringExtra("checkauthor");

        m.setText("Book Name :"+book);
        n.setText("Author Name :"+author);
    }
}
