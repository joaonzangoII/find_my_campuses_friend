package app.fmcf.utilities;

import android.content.SharedPreferences;
import android.preference.PreferenceManager;

import java.text.DecimalFormat;
public class Constants {
    static String  api = "http://10.0.0.6:8000/api/v1";
    public static String FormatResult(double value){
        DecimalFormat formatter = new DecimalFormat("0.0");
        String result;
        result = formatter.format(value);

        return result;
    }

    public static String getApiUrl(){
//        SharedPreferences pref = App.getInstance().getApplicationContext().getSharedPreferences("MyPref", 0); // 0 - for private mode
        SharedPreferences pref = PreferenceManager.getDefaultSharedPreferences(App.getContext());
        return pref.getString("apiUrl",api);

    }
}
