package app.fmcf;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;

//import android.content.Intent;
//import android.content.SharedPreferences;
//import android.support.design.widget.CollapsingToolbarLayout;
//import android.support.v7.widget.RecyclerView;
//import android.widget.TextView;
//import android.widget.Toast;
//
//import java.util.ArrayList;
//import java.util.List;
//
//import app.fmcf.adapters.ViewAdapter;
//import app.fmcf.models.OptionsMenuModel;
//import app.fmcf.models.UserModel;
//import app.fmcf.utilities.RecyclerTouchListener;
//import app.fmcf.utilities.WrappingLinearLayoutManager;

public class DashboardActivity extends AppCompatActivity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
//        setContentView(R.layout.activity_dashboard);
//        Toolbar toolbar = (Toolbar) findViewById(R.id.app_bar);
//        setSupportActionBar(toolbar);
//        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
//        toolbar.setNavigationOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//                finish();
//            }
//        });
//
//        CollapsingToolbarLayout collapsingToolbar = (CollapsingToolbarLayout) findViewById(R.id.collapsing_toolbar);
//        collapsingToolbar.setTitle("BetPal");
//
//
//        Intent i = getIntent();
//        UserModel user = (UserModel) i.getSerializableExtra("user");
//        TextView txtName = (TextView) findViewById(R.id.name);
//        TextView txtEmail = (TextView) findViewById(R.id.email);
//        TextView txtCellphone = (TextView) findViewById(R.id.cellphonenumber);
//        TextView txtRole = (TextView) findViewById(R.id.role);
//
//        txtName.setText("Name: " + user.getName());
//        txtEmail.setText("Email: " + user.getEmail());
//        txtCellphone.setText("Cellphone: " + user.getCellphone());
//        txtRole.setText("Role: " + user.getRole());
//
//        RecyclerView mRecyclerDrawer = (RecyclerView) findViewById(R.id.optionsList);
//        List<OptionsMenuModel> listToPop = new ArrayList<>();
//
//        listToPop.add(new OptionsMenuModel("Play"));
//        listToPop.add(new OptionsMenuModel("Check Ticket"));
//        listToPop.add(new OptionsMenuModel("Check History"));
//        listToPop.add(new OptionsMenuModel("Who is using?"));
//        listToPop.add(new OptionsMenuModel("Logout"));
//
//
//
//        mRecyclerDrawer.setAdapter(new ViewAdapter(this, listToPop));
//        mRecyclerDrawer.setNestedScrollingEnabled(false);
//        mRecyclerDrawer.setHasFixedSize(false);
//        mRecyclerDrawer.setLayoutManager(new WrappingLinearLayoutManager(this));
//
//        mRecyclerDrawer.addOnItemTouchListener(new RecyclerTouchListener(this, mRecyclerDrawer, new RecyclerTouchListener.ClickListener() {
//            @Override
//            public void onClick(View view, int position) {
////                Toast.makeText(getApplicationContext(), " " + position, Toast.LENGTH_SHORT).show();
//                Intent i;
//                if (position == 0) {
//                    i = new Intent(DashboardActivity.this, DashboardActivity.class);
//                }
////                } else if (position == 1) {
////                    i = new Intent(DashboardActivity.this, CheckTicketActivity.class);
////                } else if (position == 2) {
////                    i = new Intent(DashboardActivity.this, TicketHistoryActivity.class);
////                }
////                else if(position ==3){
////                    i = new Intent(DashboardActivity.this, ContactsActivity.class);
////                }
//                else{
//                    i = new Intent(DashboardActivity.this, MainActivity.class);
//                    SharedPreferences pref = getApplicationContext().getSharedPreferences("MyPref", 0); // 0 - for private mode
//                    SharedPreferences.Editor editor = pref.edit();
//                    //on the login store the login
//                    editor.putBoolean("logginStatus", false);
//                    editor.putInt("user_id",0);
//                    editor.commit();
//                    Toast.makeText(DashboardActivity.this, "You have logged out", Toast.LENGTH_SHORT).show();
//                }
//                startActivity(i);
//            }
//
//      @Override
//            public void onLongClick(View view, int position) {
//
//            }
//        }));
    }
}
