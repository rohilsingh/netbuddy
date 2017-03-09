<?php
require_once('session.php');
confirm_logged_in();
$username=$_POST['username'];
$xml=simplexml_load_file("../xml/{$_SESSION['username']}.xml");
$xml_friend=simplexml_load_file("../xml/{$username}.xml");
foreach($xml->friends->friend_request->user_friend as $friend)
{
    if($friend->username==$username)
        unset($friend);
}
foreach($xml_friend->friends->friend_request->user_friend as $friend)
{
    if($friend->username==$_SESSION['username'])
        unset($friend);
}
header("location:../home.php");
?>