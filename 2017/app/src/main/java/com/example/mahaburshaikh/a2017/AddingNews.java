package com.example.mahaburshaikh.a2017;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Bitmap;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;

public class AddingNews extends AppCompatActivity {

    private SharedPreferences sharedPreferences;
    private SharedPreferences.Editor sharedPreferencesEditor;

    EditText _name,_id,_reg,_fac,_add,username,password;
    Button _submit;
    String name, pass;

    private ProgressDialog pd;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_adding_news);

        sharedPreferences = getSharedPreferences("login_info", Context.MODE_PRIVATE);

        _name = (EditText)findViewById(R.id.st_name);
        _id = (EditText)findViewById(R.id.st_id);
        _reg = (EditText)findViewById(R.id.st_reg);
        _fac = (EditText)findViewById(R.id.st_fac);
        _add = (EditText)findViewById(R.id.st_add);
        username = (EditText)findViewById(R.id.username);
        password = (EditText)findViewById(R.id.password);

        _submit = (Button) findViewById(R.id.submit_news);

        _submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                pd = new ProgressDialog(AddingNews.this);
                pd.setMessage("Please wait...");
                pd.show();
                name = _name.getText().toString();
                pass = _id.getText().toString();

                String url = "http://10.82.197.127/management/api/postdata.php";


                StringRequest stringRequest = new StringRequest(Request.Method.POST,url, new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        pd.dismiss();
                        sharedPreferencesEditor = sharedPreferences.edit();
                        sharedPreferencesEditor.putString("name",name);
                        sharedPreferencesEditor.putString("id", pass);
                        sharedPreferencesEditor.commit();
                       Toast.makeText(AddingNews.this, ""+response, Toast.LENGTH_SHORT).show();
                    }
                }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        pd.dismiss();
                        Log.d("Volly error", error.toString());
                        Toast.makeText(AddingNews.this, error.toString(), Toast.LENGTH_SHORT).show();
                    }
                }) {

                    protected Map<String, String> getParams(){
                        Map<String, String> parr = new HashMap<String, String>();

                        parr.put("stname", name);
                        parr.put("stid", pass);
                        parr.put("streg",_reg.getText().toString());
                        parr.put("stfac",_fac.getText().toString());
                        parr.put("stadd",_add.getText().toString());
                        parr.put("username",username.getText().toString());
                        parr.put("password",password.getText().toString());
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
