package com.example.mahaburshaikh.a2017;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;

public class mydetails extends AppCompatActivity {

    Button title,time,details,dep,submit;
    private ProgressDialog pd;

    private SharedPreferences sharedPreferences;
    private SharedPreferences.Editor sharedPreferencesEditor;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mydetails);

        title = (Button) findViewById(R.id.mytitle);
        time = (Button)findViewById(R.id.mytime);
        details = (Button)findViewById(R.id.mydetails);
        dep = (Button)findViewById(R.id.mydept);
        submit = (Button)findViewById(R.id.save);

        sharedPreferences = getSharedPreferences("login_info", Context.MODE_PRIVATE);



        final String _book = getIntent().getStringExtra("MyTITLE");
        final String _author = getIntent().getStringExtra("MyNEWS");
        final String _faculty = getIntent().getStringExtra("MyTime");
        final String _dept = getIntent().getStringExtra("MyLove");

        title.setText("Book Name : "+_book);
        time.setText("Author Name : "+_author);
        details.setText("Faculty : "+_faculty);
        dep.setText("Department : "+_dept);

        final String username  = sharedPreferences.getString("name", "null");
        final String id  = sharedPreferences.getString("id", "null");


        submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(mydetails.this,Check.class);
                intent.putExtra("checkbook",_book);
                intent.putExtra("checkauthor",_author);
                startActivity(intent);
                pd = new ProgressDialog(mydetails.this);
                pd.setMessage("Please wait...");
                pd.show();

                String url = "http://10.82.197.127/management/api/postdataorder.php";

                StringRequest stringRequest = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        pd.dismiss();
                        Toast.makeText(mydetails.this, ""+response, Toast.LENGTH_SHORT).show();
                    }
                }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        pd.dismiss();
                        Log.d("Volly error", error.toString());
                        Toast.makeText(mydetails.this, error.toString(), Toast.LENGTH_SHORT).show();
                    }
                }) {

                    protected Map<String, String> getParams(){
                        Map<String, String> parr = new HashMap<String, String>();
                        parr.put("stname", username);
                        parr.put("stid", id);
                        parr.put("bookname", _book);
                        parr.put("authorname", _author);
                        return parr;
                    }
                };

                // RequestQueue requesstQueue = Volley.newRequestQueue(getApplicationContext());
                //requesstQueue.add(stringRequest);

                AppController.getInstance().addToRequestQueue(stringRequest);

            }
        });
    }
}


