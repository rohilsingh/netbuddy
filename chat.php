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
    <?php
    echo"

    <table border='1'>
        <tr> <td>Friends List</td><td>Chat</td></tr>
        <tr><td></td></tr>
    </table>";
    ?>
</div>


</body>


</html>