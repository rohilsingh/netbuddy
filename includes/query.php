<?php
include_once('connect.php');

function add_user($name,$username,$password,$dob,$sex)   //for sign up
{
    $hashed_password=sha1($password);
    $query="INSERT INTO ";
    $query.="user_info ";
    $query.="(name,username,password,dob,sex) ";
    $query.="VALUES ";
    $query.="('{$name}','{$username}','{$hashed_password}','{$dob}','{$sex}')";
    return $query;
}

function login($username,$password)           //for login
{
    $hashed_password=sha1($password);
    $query="SELECT id,username ";
    $query.="FROM user_info ";
    $query.="WHERE username='{$username}' ";
    $query.="AND password='{$hashed_password}' ";
    $query.="LIMIT 1";
    return $query;
}

function current_user($connect)   //returns name of current user
{
    $username=$_SESSION['username'];
    $query="SELECT name ";
    $query.="FROM user_info ";
    $query.="WHERE username='{$username}' ";
    $query.="LIMIT 1";
    $result=mysqli_query($connect,$query);
    $ans=mysqli_fetch_array($result);
    return strtoupper($ans['name']);
}
?>