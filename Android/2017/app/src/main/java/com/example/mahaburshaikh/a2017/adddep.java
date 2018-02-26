package com.example.mahaburshaikh.a2017;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.telecom.Call;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.VolleyLog;
import com.android.volley.toolbox.JsonArrayRequest;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class adddep extends AppCompatActivity {
    ListView ld;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_adddep);
        ld = (ListView)findViewById(R.id.deplist);

        fetchingdata();

    }
    void fetchingdata(){
        String myURL  = "http://10.82.197.127/management/api/getdata.php";

        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(myURL, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {
                final String[] news_dept = new String[response.length()];
                final String[] news_book = new String[response.length()];
                final String[] news_author =  new String[response.length()];
                final String[] news_faculty = new String[response.length()];
                //final String[] dept_id = new String[response.length()];

                for(int i=0; i<response.length();i++){
                    try {
                        JSONObject jsonObject = (JSONObject) response.get(i);

                        //dept_id[i]=jsonObject.getString("dept_id");
                        news_dept[i] = jsonObject.getString("dept");
                        news_book[i] = jsonObject.getString("book_name");
                        news_author[i] = jsonObject.getString("author_name");
                        news_faculty[i] = jsonObject.getString("faculty");


                    }catch (JSONException e){
                        e.printStackTrace();
                    }
                }
                ArrayAdapter<String> arrayAdapter = new ArrayAdapter<String>(getApplicationContext(),R.layout.mylistview,R.id.textviewforlist,news_dept);
                ld.setAdapter(arrayAdapter);
//                lv.setAdapter(new ArrayAdapter(getApplicationContext(),R.layout.mylistview,R.id.textviewforlist,news_book));


                ld.setOnItemClickListener(new AdapterView.OnItemClickListener() {
                    @Override
                    public void onItemClick(AdapterView<?> parent, View view, int i, long id) {
                        String dept = news_dept[i];
                        Intent intent = new Intent(adddep.this, depbook.class);
                        intent.putExtra("dept", dept);
                        startActivity(intent);
                    }
                });
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                VolleyLog.d("Volley Log",error);
            }
        });

        com.example.mahaburshaikh.a2017.AppController.getInstance().addToRequestQueue(jsonArrayRequest);
        Toast.makeText(getApplicationContext(),"Data loaded succrssfully",Toast.LENGTH_SHORT).show();
    }
}