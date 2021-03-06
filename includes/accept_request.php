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
$xml->friends->friend->addChild('person');
$xml->friends->friend->person->addChild('username');
$xml->friends->friend->person->username=$username;
$xml->friends->friend->person->addChild('chat');
$xml->friends->friend->person->chat->addChild('message');
$xml->friends->friend->person->chat->addChild('time');
$xml->friends->friend->person->chat->addChild('to');
$xml->friends->friend->person->chat->addChild('from');
$xml->friends->friend->person->chat->addChild('filetype');
$xml->asXML("../xml/{$_SESSION['username']}.xml");
$xml_friend->friends->friend->addChild('person');
$xml_friend->friends->friend->person->addChild('username');
$xml_friend->friends->friend->person->username=$_SESSION['username'];
$xml_friend->friends->friend->person->addChild('chat');
$xml_friend->friends->friend->person->chat->addChild('message');
$xml_friend->friends->friend->person->chat->addChild('time');
$xml_friend->friends->friend->person->chat->addChild('to');
$xml_friend->friends->friend->person->chat->addChild('from');
$xml_friend->friends->friend->person->chat->addChild('filetype');
$xml_friend->asXML("../xml/{$username}.xml");
header("location:../home.php");
?>