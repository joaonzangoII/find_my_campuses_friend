package app.fmcf.adapters;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.support.v7.widget.RecyclerView;

import app.fmcf.R;
import app.fmcf.models.OptionsMenuModel;

import java.util.Collections;
import java.util.List;
public class ViewAdapter extends RecyclerView.Adapter<ViewAdapter.MyViewHolder> {
    private LayoutInflater inflater;

    List<OptionsMenuModel> data = Collections.emptyList();
    public ViewAdapter(Context context, List<OptionsMenuModel> data) {
     inflater=  LayoutInflater.from(context);
        this.data=data;
    }

    @Override
    public MyViewHolder onCreateViewHolder(ViewGroup parent, int i) {
      View view =   inflater.inflate(R.layout.menu_option_item,parent,false);
      MyViewHolder holder= new MyViewHolder(view);
      return holder;
    }

    @Override
    public void onBindViewHolder(MyViewHolder viewHolder, int position) {
        OptionsMenuModel current = data.get(position);
        viewHolder.title.setText(current.title);
//        viewHolder.icon.setImageResource(current.iconId);
    }

    @Override
    public int getItemCount() {
        return data.size();
    }

    class MyViewHolder extends RecyclerView.ViewHolder{
        ImageView icon;
        TextView title;
        public MyViewHolder(View itemView) {
            super(itemView);
            title = (TextView) itemView.findViewById(R.id.listText);
            //            icon = (ImageView) itemView.findViewById(R.id.listIcon);
        }
    }
}
