<?php
require_once('session.php');
confirm_logged_in();
$username=$_POST['username'];
$name=$_POST['name'];
$query=$_POST['query'];
$xml=simplexml_load_file("../xml/{$_SESSION['username']}.xml");
$xml_friend=simplexml_load_file("../xml/{$username}.xml");
$xml->friends->friend_request->addChild('user_friend');
$xml->friends->friend_request->user_friend->addAttribute('type','sender');
$xml->friends->friend_request->user_friend->addChild('username');
$xml->friends->friend_request->user_friend->addChild('name');
$len=$xml->friends->friend_request->count()-1;
$xml->friends->friend_request->user_friend->username[$len]=$username;
$xml->friends->friend_request->user_friend->name[$len]=$name;
$xml->asXML("../xml/{$_SESSION['username']}.xml");
//echo "Conection request sent";
$xml_friend->friends->friend_request->addChild('user_friend');
$xml_friend->friends->friend_request->user_friend->addAttribute('type','receiver');
$xml_friend->friends->friend_request->user_friend->addChild('username');
$xml_friend->friends->friend_request->user_friend->addChild('name');
$len=$xml_friend->friends->friend_request->count()-1;
$xml_friend->friends->friend_request->user_friend->username[$len]=$_SESSION['username'];
$xml_friend->friends->friend_request->user_friend->name[$len]=$_SESSION['name'];
$xml_friend->asXML("../xml/{$username}.xml");

header("location:../home.php");
?>