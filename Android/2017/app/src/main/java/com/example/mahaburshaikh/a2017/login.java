package com.example.mahaburshaikh.a2017;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.net.Uri;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.android.gms.appindexing.Action;
import com.google.android.gms.appindexing.AppIndex;
import com.google.android.gms.appindexing.Thing;
import com.google.android.gms.common.api.GoogleApiClient;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class login extends AppCompatActivity {

    Button login, registration;



    static final String ip_add = "10.82.197.127";
    static final String LOGIN_URL = "http://" + ip_add + "/management/api/check_login.php";

    private EditText editTextUserName;
    private EditText editTextPassword;
    public static String username = "";
    public static String password = "";


    private GoogleApiClient client;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        getSupportActionBar().setTitle("Sign In");

        editTextUserName = (EditText) findViewById(R.id.input_username);
        editTextPassword = (EditText) findViewById(R.id.input_password);
        login = (Button) findViewById(R.id.btn_login);
        registration = (Button) findViewById(R.id.btn_registration);



        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Login();
            }
        });

        registration.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent1 = new Intent(login.this, AddingNews.class);
                startActivity(intent1);
            }
        });

        client = new GoogleApiClient.Builder(this).addApi(AppIndex.API).build();
    }

    private void Login() {
        String username = editTextUserName.getText().toString().trim();
        String password = editTextPassword.getText().toString().trim();
        this.username = username;

        checkLogInValidity(username, password, LOGIN_URL);
    }

    public void checkLogInValidity(final String username, final String password, String url) {
        final ProgressDialog pd = new ProgressDialog(this);
        pd.setMessage("Checking...");
        pd.show();

        StringRequest stringRequest = new StringRequest(
                Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                Log.d("Done: ", response);
                try {
                    JSONObject jsonObject = new JSONObject(response.toString());
                    handleJSON(jsonObject);
                } catch (JSONException e) {
                    Log.d("Error: ", e.toString());
                    Toast.makeText(login.this, e.toString(), Toast.LENGTH_LONG).show();
                }
                pd.dismiss();
            }
        }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError volleyError) {
                Log.d("Error: ", volleyError.toString());
                Toast.makeText(login.this, volleyError.toString(), Toast.LENGTH_LONG).show();
                pd.dismiss();
            }
        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<String, String>();
                params.put("username", username);
                params.put("password", password);

                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    public static final String KEY_MESSAGE = "message";
    public static final String KEY_SUCCESS = "success";
    public static final String KEY_NAME = "st_name";
    public static final String KEY_ID = "st_id";
    public static final String KEY_REG = "st_reg";
    public static final String KEY_FACULTY = "st_fac";
    public static final String KEY_ADDRESS = "st_add";
    public static final String KEY_USERNAME = "username";
    public static final String KEY_PASSWORD = "password";
    public static final String SUCCESS = "1";
    public static final String FAILURE = "0";
    private String message = "";
    private String success = "";
    private ArrayList<String> allInfo;

    private void handleJSON(JSONObject jsonObject) {

        try {
            String what = jsonObject.getString(KEY_SUCCESS);

            if (what.equals(SUCCESS)) { //means valid id
                message = jsonObject.getString(KEY_MESSAGE);
                success = SUCCESS;
                allInfo = new ArrayList<>();
                allInfo.add(jsonObject.getString(KEY_NAME));
                allInfo.add(jsonObject.getString(KEY_ID));
                allInfo.add(jsonObject.getString(KEY_REG));
                allInfo.add(jsonObject.getString(KEY_FACULTY));
                allInfo.add(jsonObject.getString(KEY_ADDRESS));
                allInfo.add(jsonObject.getString(KEY_USERNAME));
                allInfo.add(jsonObject.getString(KEY_PASSWORD));
                Toast.makeText(this, message, Toast.LENGTH_LONG).show();
                //use sharedPreference here


                Intent intent = new Intent(this, MainActivity.class);


                //intent.putStringArrayListExtra("allInfo",allInfo);

                startActivity(intent);

            } else { //means error
                message = jsonObject.getString(KEY_MESSAGE);
                success = FAILURE;
                Toast.makeText(this, message, Toast.LENGTH_SHORT).show();
            }
            Log.d("Message: ", message);
            Log.d("Success: ", success);

        } catch (JSONException e) {
            e.printStackTrace();
            Toast.makeText(this,
                    "Error: " + e.getMessage(),
                    Toast.LENGTH_LONG).show();
        }
    }


    public Action getIndexApiAction() {
        Thing object = new Thing.Builder()
                .setName("login Page") // TODO: Define a title for the content shown.
                // TODO: Make sure this auto-generated URL is correct.
                .setUrl(Uri.parse("http://[ENTER-YOUR-URL-HERE]"))
                .build();
        return new Action.Builder(Action.TYPE_VIEW)
                .setObject(object)
                .setActionStatus(Action.STATUS_TYPE_COMPLETED)
                .build();
    }

    @Override
    public void onStart() {
        super.onStart();


        client.connect();
        AppIndex.AppIndexApi.start(client, getIndexApiAction());
    }

    @Override
    public void onStop() {
        super.onStop();

        AppIndex.AppIndexApi.end(client, getIndexApiAction());
        client.disconnect();
    }
}