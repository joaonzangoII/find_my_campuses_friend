package app.fmcf;

import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.widget.ProgressBar;
import android.widget.TextView;


public class SplashScreenActivity extends ActionBarActivity {
    private ProgressBar progress;
    private TextView text;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        SharedPreferences pref = getApplicationContext().getSharedPreferences("MyPref", 0); // 0 - for private mode
        Boolean logginStatus = pref.getBoolean("logginStatus",false);

//        if(logginStatus==true){
//            Intent i = new Intent(SplashScreenActivity.this, LoggedInActivity.class);
////            i.putExtra("user",  msg.getData().getSerializable("user"));
//            startActivity(i);
//        }

        setContentView(R.layout.activity_splash_screen);
        progress = (ProgressBar) findViewById(R.id.progressBar1);
        text = (TextView) findViewById(R.id.textView1);
        startProgress();

    }

    public void startProgress() {
        // do something long
        Runnable runnable = new Runnable() {
            @Override
            public void run() {
                for (int i = 0; i <= 10; i++) {
                    final int value = i;
                    doFakeWork();
                    progress.post(new Runnable() {
                        @Override
                        public void run() {
                        text.setText("Updating");
                        progress.setProgress(value);
                        }
                    });
                }
                Intent i = new Intent(SplashScreenActivity.this, MainActivity.class);
                startActivity(i);
                finish();
            }
        };
        new Thread(runnable).start();
    }

    // Simulating something timeconsuming
    private void doFakeWork() {
        try {
            Thread.sleep(1000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }

}
