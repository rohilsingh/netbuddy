<?php
require_once('includes/session.php');
confirm_logged_in();
?>
<html>
<head>
    <title>SocialNetwork | NetBuddy</title>
    <script src="javascript/redirect.js"></script>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/side_bar.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <style>

    </style>
</head>
<body>
<?php
$xml=simplexml_load_file("xml/{$_SESSION['username']}.xml");
include_once('includes/header.php');
include_once('includes/side_bar.php');
include_once('includes/footer.php');
?>

<div id="body">
    <div id="profile">
        <?php
        echo "
        <table>
        <br>
            <tr><td rowspan='5'><img src='{$xml->profile->dp}'></td><td><h3>Name:</h3></td><td>{$xml->profile->name}</td></tr>
            <tr><td></td><td>&nbsp;&nbsp; {$xml->profile->sex}</td></tr>
             <tr><td><h3> Dob : </h3></td><td>{$xml->profile->dob}</td></tr>
             <tr><td><h3>Profession : </h3></td><td>{$xml->profile->profession}</td></tr>
        </table>
        <br>
        <marquee>{$xml->profile->status}</marquee><br>
        <br><hr><br>";
        foreach($xml->friends->friend_request->user_friend as $friend_request){
            if($friend_request['type']=='receiver') {
                echo "
        <p>{$friend_request->name} has sent you request to add him to your connection</p>&nbsp;&nbsp;
        <form style='display: inline' method='post' action='includes/accept_request.php'>
        <input type='hidden' name='username' value='{$friend_request->username->__toString()}'>
        <input type='submit' value='Add to connections'>
        </form>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <form style='display: inline' method='post' action='includes/reject_request.php'>
        <input type='hidden' name='username' value='{$friend_request->username->__toString()}'>
        <input type='submit' value='Reject connection'>
        </form>
        <br><hr><br>";
            }
        }
        echo "
        <p>Enter events to post here:</p>
        <!--if anyone posts event it should be added as event in the persons as well as all his friend's event list
        with attributes name=name_of_person_who_posted , time=time_and_date_of_posting and dp=path_of_dp-->
        <br><hr>";
        foreach($xml->profile->events->event as $event){
            echo "<br><h4 style='display: inline'><img src='{$event['dp']}' height='40px' width='30px'>&nbsp;
                    {$event['name']}:</h4>at&nbsp;{$event['time']}<br><br>$event<br><br><hr>";
        }
    echo "</div>";
?>
    <div id="chat_bar">

    </div>
</div>

</body>


</html>