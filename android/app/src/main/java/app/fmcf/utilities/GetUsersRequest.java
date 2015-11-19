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
import com.android.volley.VolleyLog;
import com.android.volley.toolbox.StringRequest;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;

import app.fmcf.models.UserModel;
import app.fmcf.models.UsersListModel;


public class GetUsersRequest {

    protected String LIBRARY = "users";
    protected Message msg = null;
    private Handler responsehandler;
    private ProgressDialog pDiag;
    // Tag used to cancel the request
    String TAG = "json_obj_req";

    String url = "http://api.androidhive.info/volley/person_object.json";

    public GetUsersRequest(Context context, Handler responsehandler) {
        super();
        this.responsehandler = responsehandler;
        pDiag = new ProgressDialog(context);
        pDiag.setMessage("Getting History");
        pDiag.show();
    }
    public void makeRequest() {
        StringRequest getRequest = new StringRequest(Request.Method.GET,
                url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        Log.d(TAG, response.toString());
                        pDiag.dismiss();
                        String message = response;
                        Bundle data = new Bundle();
                        try {
                        JSONArray jsonArray = new JSONArray(message);
                        List<UserModel> userList = new ArrayList<>();
                        for (int i = 0; i < jsonArray.length(); i++) {
                            JSONObject userJsonObj = jsonArray.getJSONObject(i);
                            UserModel user = new UserModel(userJsonObj.getInt("id"), userJsonObj.getString("name"),
                                    userJsonObj.getString("email"), userJsonObj.getString("cellphone"),
                                    userJsonObj.getString("role"));
                            userList.add(user);
                        }                       UsersListModel list = new UsersListModel(userList);
                        data.putBoolean("state", false);
                        Serializable dataReceived = list;
                        data.putSerializable(LIBRARY, dataReceived);
                        data.putString("message", message.toString());
                        msg = Message.obtain();
                        msg.setData(data);
                        responsehandler.sendMessage(msg);

                        } catch (JSONException error) {
                            pDiag.dismiss();
                            data.putBoolean("state", false);
                            msg = Message.obtain();
                            msg.setData(data);
                            responsehandler.sendMessage(msg);
                            error.printStackTrace();
                            Toast.makeText(App.getInstance().getApplicationContext(), error.toString(), Toast.LENGTH_SHORT).show();
                        }
                    }
                }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                VolleyLog.d(TAG, "Error: " + error.getMessage());
                // hide the progress dialog
                pDiag.hide();
            }
        });

        // after declaring your request
    //       request.setTag("POST");
        getRequest.setRetryPolicy(new DefaultRetryPolicy(5000, DefaultRetryPolicy.DEFAULT_MAX_RETRIES, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
        App.getInstance().getRequestQueue().add(getRequest);

    }

}
