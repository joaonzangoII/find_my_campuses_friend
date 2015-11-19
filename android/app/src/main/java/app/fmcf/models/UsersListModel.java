package app.fmcf.models;

import java.io.Serializable;
import java.util.List;

public class UsersListModel implements Serializable {

    List<UserModel> usersList;

    public UsersListModel(List<UserModel> historyList) {
        this.usersList = historyList;
    }

    public List<UserModel> getUsersList() {
        return usersList;
    }
}