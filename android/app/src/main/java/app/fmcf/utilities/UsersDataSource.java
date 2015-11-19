package app.fmcf.utilities;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import app.fmcf.models.UserModel;

public class UsersDataSource {
    // Database fields
    private SQLiteDatabase database;
    private MySQLiteHelper dbHelper;
    private String[] allColumns = { MySQLiteHelper.COLUMN_ID,
            MySQLiteHelper.COLUMN_NAME,MySQLiteHelper.COLUMN_EMAIL,
            MySQLiteHelper.COLUMN_CELLPHONE, MySQLiteHelper.COLUMN_ROLE};

    public UsersDataSource(Context context) {
        dbHelper = new MySQLiteHelper(context);
    }

    public void open() throws SQLException {
        database = dbHelper.getWritableDatabase();
    }

    public void close() {
        dbHelper.close();
    }

    public UserModel createUser(UserModel user) {
        ContentValues values = new ContentValues();
        values.put(MySQLiteHelper.COLUMN_NAME, user.getName());
        values.put(MySQLiteHelper.COLUMN_EMAIL, user.getEmail());
        values.put(MySQLiteHelper.COLUMN_CELLPHONE, user.getCellphone());
        values.put(MySQLiteHelper.COLUMN_REMEMBER_TOKEN, user.getRole());
        long insertId = database.insert(MySQLiteHelper.TABLE_USERS, null,
                values);
        Cursor cursor = database.query(MySQLiteHelper.TABLE_USERS,
                allColumns, MySQLiteHelper.COLUMN_ID + " = " + insertId, null,
                null, null, null);
        cursor.moveToFirst();
        UserModel newUser = cursorToUser(cursor);
        cursor.close();
        return newUser;
    }

    public void deleteUser(UserModel user) {
        long id = user.getId();
        System.out.println("User deleted with id: " + id);
        database.delete(MySQLiteHelper.TABLE_USERS, MySQLiteHelper.COLUMN_ID
                + " = " + id, null);
    }

    public List<UserModel> getAllUsers() {
        List<UserModel> users = new ArrayList<>();

        Cursor cursor = database.query(MySQLiteHelper.TABLE_USERS,
                allColumns, null, null, null, null, null);

        cursor.moveToFirst();
        while (!cursor.isAfterLast()) {
            UserModel user = cursorToUser(cursor);
            users.add(user);
            cursor.moveToNext();
        }
        // make sure to close the cursor
        cursor.close();
        return users;
    }

    private UserModel cursorToUser(Cursor cursor) {
        UserModel user = new UserModel();
        user.setId(cursor.getInt(0));
        user.setName(cursor.getString(1));
        user.setEmail(cursor.getString(2));
        user.setCellphone(cursor.getString(3));
        user.setRole(cursor.getString(4));
        return user;
    }
}
