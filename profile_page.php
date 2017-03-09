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
    <link rel="stylesheet" type="text/css" href="css/profile_page.css">
    <style>

    </style>
</head>
<body>
<?php
//$xml=simplexml_load_file("xml/{$_SESSION['username']}.xml");
include_once('includes/header.php');
include_once('includes/side_bar.php');
//include_once('includes/footer.php');
?>
<br>
<div id="body">
    <div id="profile">
        <?php
        $username=$_GET['user'];
        $xml=simplexml_load_file("xml/{$username}.xml");
        echo "

        <table><br><br>
            <tr><td></td><td><img src='{$xml->profile->dp}'></td></tr>
            <tr><td><h2>Name:</h2></td><td>{$xml->profile->name}</td></tr>
            <tr><td><h2>Sex:</h2></td><td>{$xml->profile->sex}</td></tr>
            <tr><td><h2>About Me:</h2></td><td>{$xml->profile->about_me}</td></tr>
            <tr><td><h2>Interested in:</h2></td><td>{$xml->profile->interested_in}</td</tr>
            <tr><td><h2>Relationship Status:</h2></td><td>{$xml->profile->relationship_status}</td></tr>
            <tr><td><h2>Profession:</h2></td><td>{$xml->profile->profession}</td></tr>
            <tr><td><h2>Languages:</h2></td><td>";
        foreach($xml->profile->languages->language as $language)
            echo "{$language}<br>";
    echo "</td></tr>
            <tr><td><h2>Date of Birth:</h2></td><td>{$xml->profile->dob}</td></tr>
            <tr><td><h2>Contact:</h2></td><td>";
        foreach($xml->profile->contacts->contact as $contact)
            echo "{$contact}&nbsp;&nbsp;&nbsp;{$contact['type']}<br>";
    echo "</td></tr>
            <tr><td><h2>Qualification:</h2></td><td>";
        foreach($xml->profile->qualification->degree as $qualification)
            echo "{$qualification} FROM {$qualification['college']} YEAR {$qualification['year']}<br>";
    echo "</td></tr>
            <tr><td><h2>Views:</h2></td><td>";
        foreach($xml->profile->views->about as $views)
            echo "{$views['type']} views: {$views}<br><br><br><br><br>";
    echo "</td></tr>
        </table>"; ?>
    </div>

</div>


<?php
include_once('includes/footer.php');
?>
</body>


</html>