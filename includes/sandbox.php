<?php
$xml=simplexml_load_file("../xml/rawal@gmail.com.xml");
$xml1=simplexml_load_file("../xml/rohil@gmail.com.xml");
$xml2=simplexml_load_file("../xml/users.xml");
echo $xml->friends->friend_request->username;

?>