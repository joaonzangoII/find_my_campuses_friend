package app.fmcf.utilities;

import android.app.ProgressDialog;
import android.content.Context;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.util.Log;
import android.widget.Toast;

import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.Serializable;
import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;

import app.fmcf.models.UserModel;
public class MakeLoginRequest {
    private Handler responsehandler;
    protected String LIBRARY = "user";
    protected Message msg = null;
    private ProgressDialog pDiag;


    public MakeLoginRequest(Context context, Handler responsehandler) {
        super();
        this.responsehandler = responsehandler;
        pDiag = new ProgressDialog(context);
        pDiag.setMessage("Login in");
        pDiag.show();
    }

    public void makeRequest(final String d[]) {
        String url = Constants.getApiUrl() + "/login";
        StringRequest postRequest = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        pDiag.dismiss();
                        try {
                            JSONObject jsonResponse = new JSONObject(response);
                            String message="NONE";
                            String stateMessage="NONE";
                            if (jsonResponse.has("fail")) {
                                message = jsonResponse.getString("errors");
                                JSONObject errors = new JSONObject(message);
                                Iterator<String> iterator = errors.keys();
                                StringBuilder sB = new StringBuilder();
                                while(iterator.hasNext()){
                                    String key = iterator.next();
                                    try{
                                        JSONArray validationErrors  = new JSONArray(errors.get(key).toString());
                                        for (int x = 0; x< validationErrors.length(); x++) {
                                            Log.e(key, validationErrors.get(x).toString());
                                            sB.append(validationErrors.get(x).toString());
                                            sB.append("\n");
                                        }
                                    }catch(JSONException error){
                                        error.printStackTrace();
                                        pDiag.dismiss();
                                        Bundle data = new Bundle();
                                        data.putBoolean("state", false);
                                        msg = Message.obtain();
                                        msg.setData(data);
                                        responsehandler.sendMessage(msg);
                                        Toast.makeText(App.getInstance().getApplicationContext(), error.toString(), Toast.LENGTH_SHORT).show();
                                    }
                                }
                                Bundle data = new Bundle();
                                data.putBoolean("state", false);
                                msg = Message.obtain();
                                msg.setData(data);
                                responsehandler.sendMessage(msg);
                                stateMessage = "Login not successful";
                                Toast.makeText(App.getInstance().getApplicationContext(), sB.toString(), Toast.LENGTH_SHORT).show();
                            } else {
                                message = jsonResponse.getString("user");
                                JSONObject userJsonObj = new JSONObject(message);
                                UserModel user = new UserModel(userJsonObj.getInt("id"), userJsonObj.getString("name"), userJsonObj.getString("email"), userJsonObj.getString("cellphone"), userJsonObj.getString("role"));
                                Bundle data = new Bundle();
                                Serializable dataReceived = user;
                                data.putSerializable(LIBRARY, dataReceived);
                                data.putBoolean("state", true);
                                msg = Message.obtain();
                                msg.setData(data);
                                responsehandler.sendMessage(msg);
                                stateMessage = "Login successful";
                                Toast.makeText(App.getInstance().getApplicationContext(), stateMessage, Toast.LENGTH_SHORT).show();
                            }
                            Log.e("DATA LOGIN", message);
                            // String site = jsonResponse.getString("site"),network = jsonResponse.getString("network");
                            // System.out.println("Site: "+site+"\nNetwork: "+network);
                        } catch (JSONException error) {
                            pDiag.dismiss();
                            Bundle data = new Bundle();
                            data.putBoolean("state", false);
                            msg = Message.obtain();
                            msg.setData(data);
                            responsehandler.sendMessage(msg);
                            error.printStackTrace();
                            Toast.makeText(App.getInstance().getApplicationContext(), error.toString(), Toast.LENGTH_SHORT).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        error.printStackTrace();
                        pDiag.dismiss();
                        Bundle data = new Bundle();
                        data.putBoolean("state", false);
                        msg = Message.obtain();
                        msg.setData(data);
                        responsehandler.sendMessage(msg);
                        Toast.makeText(App.getInstance().getApplicationContext(), error.toString(), Toast.LENGTH_SHORT).show();
                    }
                }
        ) {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<>();
                // the POST parameters:
                params.put("email", d[0]);
                params.put("password", d[1]);
                return params;
            }
        };
        // after declaring your request
//       request.setTag("POST");
        postRequest.setRetryPolicy(new DefaultRetryPolicy(5000, DefaultRetryPolicy.DEFAULT_MAX_RETRIES, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
        App.getInstance().getRequestQueue().add(postRequest);

    }
//
//    @Override
//    protected void onStop() {
//        super.onStop();
//        mRequestQueue.cancelAll(new RequestQueue.RequestFilter() {
//            @Override
//            public boolean apply(Request<?> request) {
//                // do I have to cancel this?
//                return true; // -> always yes
//            }
//        });
//    }
}
