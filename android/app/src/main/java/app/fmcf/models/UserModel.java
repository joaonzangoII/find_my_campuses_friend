package app.fmcf.models;

import java.io.Serializable;
public class UserModel implements Serializable {

    Integer id ;
    String name ;
    String email ;
    String cellphone;
    String role ;
    public UserModel(){

    }


    public UserModel(int id, String name, String email, String cellphone, String role){
        this.id = id;
        this.name = name;
        this.email = email;
        this.role =role;
        this.cellphone =cellphone;
    }
    public void setId(int id){
        this.id = id;
    }

    public void setName(String name){
        this.name = name;
    }

    public void setEmail(String email){
        this.email = email;
    }

    public void setCellphone(String cellphone){
        this.cellphone = cellphone;
    }

    public void setRole(String role){
        this.role = role;
    }


    public int getId(){
        return id;
    }

    public String getName(){
        return name;
    }

    public String getEmail(){
        return email;
    }

    public String getCellphone(){
        return cellphone;
    }

    public String getRole(){
        return role;
    }






}
