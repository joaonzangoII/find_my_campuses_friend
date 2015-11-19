package app.fmcf.utilities;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;

public class MySQLiteHelper extends SQLiteOpenHelper {

    public static final String TABLE_USERS = "comments";
    public static final String COLUMN_ID = "id";
    public static final String COLUMN_NAME = "name";
    public static final String COLUMN_EMAIL = "email";
    public static final String COLUMN_CELLPHONE = "cellphone";
    public static final String COLUMN_PASSWORD = "password";
    public static final String COLUMN_ROLE = "role";
    public static final String COLUMN_REMEMBER_TOKEN = "remember_token";
    public static final String COLUMN_CREATED_AT = "created_at";
    public static final String COLUMN_UPDATED_AT = "updated_at";
    private static final int DATABASE_VERSION = 1;
    private static final String DATABASE_NAME = "betpal.db";

    private static final String USERS_TABLE_CREATE = "CREATE TABLE IF NOT EXISTS " +
            TABLE_USERS +
            COLUMN_ID + " int(10) unsigned NOT NULL," +
            COLUMN_NAME + " varchar(255) COLLATE utf8_unicode_ci NOT NULL," +
            COLUMN_EMAIL + " varchar(255) COLLATE utf8_unicode_ci NOT NULL," +
            COLUMN_CELLPHONE + " varchar(255) COLLATE utf8_unicode_ci NOT NULL," +
            COLUMN_PASSWORD + " varchar(60) COLLATE utf8_unicode_ci NOT NULL," +
            COLUMN_ROLE + " enum('admin','player') COLLATE utf8_unicode_ci NOT NULL," +
            COLUMN_REMEMBER_TOKEN + " varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL," +
            COLUMN_CREATED_AT + " timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'," +
            COLUMN_UPDATED_AT + " timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'" +
            ") ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

   public MySQLiteHelper(Context context) {
        super(context, DATABASE_NAME, null, DATABASE_VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL(USERS_TABLE_CREATE);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        Log.w(MySQLiteHelper.class.getName(),
                "Upgrading database from version " + oldVersion + " to "
                        + newVersion + ", which will destroy all old data");
        db.execSQL("DROP TABLE IF EXISTS " + USERS_TABLE_CREATE);
        onCreate(db);
    }
}