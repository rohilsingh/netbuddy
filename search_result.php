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
    <link rel="stylesheet" type="text/css" href="css/search_result.css">
    <style>

    </style>
</head>
<body>
<?php
include_once('includes/header.php');
include_once('includes/side_bar.php');
include_once('includes/footer.php');
?>
<div id="body">
    <?php
    $search_query=$_POST['search_bar'];
    $search_query="/".$search_query."/";
    $xml_my=simplexml_load_file("xml/{$_SESSION['username']}.xml");
    $xml=simplexml_load_file("xml/users.xml");
    foreach($xml->user as $user){
        if(preg_match(strtolower($search_query),strtolower($user->name))==1 && $user->username!=$_SESSION['username']){
            echo "
             <br><br>
            <table  cellpadding='5'>
                <tr><td rowspan='7'><img src='{$user->dp}'/></td><td><h3>&nbsp;Name:</h3></td><td>$user->name </td></tr>
                <tr><td></td><td>$user->sex</td></tr>
                <tr><td rowspan='5'><h3>&nbsp;About me:</h3></td><td>$user->about_me</td></tr>
                <tr><td colspan='2'></td></tr>
                </table><br>
                <table>
                    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<form style='display:inline' method='get' action='profile_page.php'>
                        <input type='hidden' name='user' value='{$user->username}'>
                        <input type='submit' value='View Profile'>";
                    echo "
                    </form> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            $xml_friend=simplexml_load_file("xml/{$user->username}.xml");
            $found=0;
            $username=$user->username->__toString();
            foreach($xml_friend->friends->friend_request->user_friend as $friend_request){
                if($friend_request->username==$_SESSION['username'] && $friend_request['type']=='receiver'){
                    echo "<button>Conection request sent</button></td></tr>";
                    $found=1;
                }
                elseif($friend_request->username==$_SESSION['username'] && $friend_request['type']=='sender'){
                    echo "<button>Accept connection request</button></td></tr>";//change to form & redirect to accept_request
                    $found=1;
                }
            }
            if($found==0) {
                echo "<form method='post' style='display: inline' action='includes/connection_request.php'>";
                echo "<input type='hidden' name='query' value='{$search_query}'>";
                echo "<input type='hidden' name='username' value='{$username}'>";
                echo "<input type='hidden' name='name' value='{$user->name->__toString()}'>";
                echo "<input type='submit' value='Add To Conections'/></form>";
            }
            echo "</td></tr>


                </table><br><br><hr>";
        }
    }
    ?>
</div>  <!--Script is for AJAX-->


</body>


</html>