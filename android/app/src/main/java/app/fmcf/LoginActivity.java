package app.fmcf;

import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Handler;
import android.os.Message;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import app.fmcf.models.UserModel;
import app.fmcf.utilities.MakeLoginRequest;


public class LoginActivity extends ActionBarActivity {

    private ProgressDialog pDiag;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        final EditText txtUsername = (EditText) findViewById(R.id.edtUsername);
        final EditText txtPassword = (EditText) findViewById(R.id.edtPassword);
        Button btnLogin = (Button) findViewById(R.id.btnLogin);
        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pDiag = new ProgressDialog(LoginActivity.this);
                pDiag.setMessage("Logging in");
                pDiag.show();
                MakeLoginRequest makeLogin = new MakeLoginRequest(LoginActivity.this, responseHandler);
                String username = txtUsername.getText().toString();
                String password = txtPassword.getText().toString();
                String data[] = new String[]{username, password};
                makeLogin.makeRequest(data);
            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_login, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        if (id == R.id.action_settings) {
            startActivity(new Intent(this, SettingsActivity.class));
            return true;
        }
        return super.onOptionsItemSelected(item);
    }

    Handler responseHandler = new Handler() {
        public void handleMessage(Message msg) {//            Toast.makeText(LoginActivity.this, msg.getData().toString(),Toast.LENGTH_SHORT).show();
            pDiag.dismiss();
            if (msg.getData().getBoolean("state", false) == true) {
                SharedPreferences pref = getApplicationContext().getSharedPreferences("MyPref", 0); // 0 - for private mode
                SharedPreferences.Editor editor = pref.edit();
                //on the login store the login
                editor.putBoolean("logginStatus", true);
                UserModel user =(UserModel) msg.getData().getSerializable("user");
                editor.putInt("user_id", user.getId());
                editor.commit();
                Intent i = new Intent(LoginActivity.this, DashboardActivity.class);
                i.putExtra("user", msg.getData().getSerializable("user"));
                startActivity(i);
                finish();
            }
        }
//            if (msg.getData().getBoolean("state", false) == true) {
//                Intent i = new Intent(LoginActivity.this, LoggedInActivity.class);
//                startActivity(i);
//            } else
//                Toast.makeText(LoginActivity.this, "Error connecting",
//                        Toast.LENGTH_SHORT).show();
//            Log.e("Message -->", msg.getData().getString("response"));
//        }
    };
}
