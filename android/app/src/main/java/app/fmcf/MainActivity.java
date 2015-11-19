package app.fmcf;

import android.content.Intent;
import android.support.v7.app.ActionBar;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;

//import app.betpal.R;


public class MainActivity extends ActionBarActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        Toolbar toolbar = (Toolbar) findViewById(R.id.app_bar);
        setSupportActionBar(toolbar);

        ActionBar ab = getSupportActionBar();
        ab.setDisplayShowHomeEnabled(true);
        ab.setDisplayShowTitleEnabled(true);

//        RecyclerView mRecyclerDrawer = (RecyclerView) findViewById(R.id.optionsList);
//        List<OptionsMenuModel> listToPop = new ArrayList<>();
//
//        listToPop.add(new OptionsMenuModel("Play"));
//        listToPop.add(new OptionsMenuModel("Check Ticket"));
//        listToPop.add(new OptionsMenuModel("Check Tickets"));
//        mRecyclerDrawer.setAdapter(new ViewAdapter(this, listToPop));
//        mRecyclerDrawer.setLayoutManager(new LinearLayoutManager(this));
//
//        mRecyclerDrawer.addOnItemTouchListener(new RecyclerTouchListener(this, mRecyclerDrawer, new RecyclerTouchListener.ClickListener() {
//            @Override
//            public void onClick(View view, int position) {
////                Toast.makeText(getApplicationContext(), " " + position, Toast.LENGTH_SHORT).show();
//                Intent i;
//                if (position==0){
//                    i = new Intent(MainActivity.this,ChooseNumbersActivity.class);
//                }
//                else if (position==1){
//                    i = new Intent(MainActivity.this, CheckTicket.class);
//                }
//                else{
//                    i = new Intent(MainActivity.this, TicketHistoryActivity.class);
//                }
//                   startActivity(i);
//            }
//
//            @Override
//            public void onLongClick(View view, int position) {
//
//            }
//        }));
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            startActivity(new Intent(this, SettingsActivity.class));
            return true;
        }

        if (id == R.id.action_login) {
            Intent i = new Intent(MainActivity.this, LoginActivity.class);
            startActivity(i);
        }

        return super.onOptionsItemSelected(item);
    }
}
