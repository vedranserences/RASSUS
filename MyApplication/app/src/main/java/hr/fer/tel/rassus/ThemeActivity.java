package hr.fer.tel.rassus;

import android.content.Intent;
import android.content.SharedPreferences;
import android.preference.PreferenceManager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Base64;
import android.view.View;
import android.widget.Button;
import android.widget.ExpandableListView;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

public class ThemeActivity extends AppCompatActivity {
    private JSONObject object;
    private String id;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_theme);

        try {
            object = new JSONObject(getIntent().getStringExtra("object"));
            TextView themeTitle = (TextView) findViewById(R.id.theme_title);
            TextView themeDescription = (TextView) findViewById(R.id.theme_description);
            TextView themeMentor = (TextView) findViewById(R.id.theme_mentor);
            TextView themeSize = (TextView) findViewById(R.id.theme_size);
            TextView themeTaken = (TextView) findViewById(R.id.theme_taken);
            TextView themeTeam = (TextView) findViewById(R.id.theme_team);
            themeTitle.setText(object.getString("title"));
            themeDescription.setText(object.getString("description"));
            themeMentor.setText("Mentor: " + object.getString("mentor"));
            themeSize.setText("Size: " + object.getString("size"));
            String str="";
            if(object.getString("taken").equals("1")){
                str="Yes";
            }else{
                str="No";
            }
            themeTaken.setText("Taken: " + str);
            themeTeam.setText("Team: " + object.getString("team"));
            id = object.getString("id");
            if(object.getString("taken").equals("1")){
                Button button=(Button)findViewById(R.id.button_apply);
                button.setVisibility(View.GONE);
            }
        } catch (JSONException e) {
            e.printStackTrace();
        }
        String role=((GlobalVariables)getApplication()).getRole();
        if(!role.equals("admin")){
            Button button=(Button) findViewById(R.id.edit_button);
            button.setVisibility(View.GONE);
            button=(Button) findViewById(R.id.delete_button);
            button.setVisibility(View.GONE);
        }
    }

    public void edit(View view) {
        Intent intent = new Intent(ThemeActivity.this, EditActivity.class);
        intent.putExtra("object", this.object.toString());
        startActivity(intent);
        finish();
    }

    public void delete(View view) {
        SharedPreferences sharedPref = PreferenceManager.getDefaultSharedPreferences(this);
        String host=sharedPref.getString("hostname","");
        String port=sharedPref.getString("port","");
        String hostname = host+":"+port;
        String email = ((GlobalVariables) this.getApplication()).getEmail();
        String password = ((GlobalVariables) this.getApplication()).getPassword();
        DeleteAction deleteAction= (DeleteAction) new DeleteAction(new DeleteAction.AsyncResponse() {
            @Override
            public void processFinish(String output) {
//                TextView textView = (TextView) findViewById(R.id.theme_deleted);
//                textView.setText("Project deleted!");
                Toast.makeText(getApplicationContext(), "Project deleted!", Toast.LENGTH_SHORT).show();
                finish();
            }
        }).execute("http://" + hostname + "/api/v0.2/projects/" + id, email, password);
    }

    public void apply(View view){
        Intent intent=new Intent(ThemeActivity.this,TeamSelectActivity.class);
        try {
            intent.putExtra("number",object.getString("size").toString());
        } catch (JSONException e) {
            e.printStackTrace();
        }
        startActivityForResult(intent,1);
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode,resultCode,data);
        if(requestCode==1){
            if(resultCode==RESULT_OK){
                String team=data.getStringExtra("team");
                JSONObject obj=new JSONObject();
                try {
                    obj.put("team",team);
                } catch (JSONException e) {
                    e.printStackTrace();
                }

                SharedPreferences sharedPref = PreferenceManager.getDefaultSharedPreferences(this);
                String host=sharedPref.getString("hostname","");
                String port=sharedPref.getString("port","");
                String hostname = host+":"+port;
                String email = ((GlobalVariables) this.getApplication()).getEmail();
                String password = ((GlobalVariables) this.getApplication()).getPassword();
                PutAction putAction=(PutAction)new PutAction(new PutAction.AsyncResponse() {
                    @Override
                    public void processFinish(String output) {
                        Toast.makeText(getApplicationContext(),"Apply successful",Toast.LENGTH_SHORT).show();
                        finish();
                    }
                }).execute("http://" + hostname + "/api/v0.2/projects/apply/" + id,email,password,obj.toString());
            }
        }
    }

}