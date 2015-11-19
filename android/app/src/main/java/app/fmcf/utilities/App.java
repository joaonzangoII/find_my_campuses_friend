package app.fmcf.utilities;

import android.app.Application;
import android.content.Context;

import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;

public class App  extends Application {

    private static App sInstance;

    private RequestQueue mRequestQueue;

    @Override
    public void onCreate() {
        super.onCreate();

        mRequestQueue = Volley.newRequestQueue(this);

        sInstance = this;
    }

    public synchronized static App getInstance() {
        return sInstance;
    }

    public synchronized static Context getContext() {
        return sInstance.getApplicationContext();
    }


    public RequestQueue getRequestQueue() {
        return mRequestQueue;
    }
}
