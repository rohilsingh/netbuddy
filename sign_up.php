<html>
<head>
    <title>SIGN UP | NETBUDDY</title>
    <script src="javascript/redirect.js"></script>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/sign_up.css">
    <style>

    </style>
    <script src="javascript/validate_sign_up.js"></script>
</head>
<body>
<?php
include_once('includes/header_before_login.php');
require_once('includes/query.php');
require_once('includes/connect.php');
if(isset($_POST['submit'])){    //If form already submitted
$name = trim($_POST['name']);
$username = trim($_POST['email_id']);  //username is actually email id of user
$password = trim($_POST['password']);
$retype_password = trim($_POST['retype_password']);

$dob=$_POST['dob'];
$sex=$_POST['sex'];
if($password==$retype_password) {
    $query = mysqli_query($connect, add_user($name, $username, $password, $dob, $sex));

    if ($query)
    {
        require_once('phpforxml/new_xml.php');
        header('location:index.php?id=1');
    }

}
}
else{     //If form has not been submitted
    $name="";
    $username="";
    $password="";
    $retype_password="";
}
?>
<div id="sign_up" class="sign_up">
    <form method="post" action="sign_up.php" >
        <h3>NAME</h3><br>
        <input name="name" type="text" required maxlength="50"  value="<?php echo htmlentities($name); ?>"><br><br>
        <h3>EMAIL ID</h3><br>
        <input name="email_id" type="email" required maxlength="50" value="<?php echo htmlentities($username); ?>"><br><br>
        <h3>PASSWORD</h3><br>
        <input name="password" id="password" type="password" required maxlength="50" value="<?php echo htmlentities($password); ?>">
        <br><br><h3>RETYPE PASSWORD</h3><br>
        <input name="retype_password" id="retype_password" type="password" required maxlength="50"
            value="<?php echo htmlentities($retype_password); ?>">
        <br><br><h3>DATE OF BIRTH</h3><br>
        <input type="date" name="dob" required><br><br>
        <h3>SEX</h3><br><h3>
        <input type="radio" name="sex" value="male">male &nbsp;&nbsp;
        <input type="radio" name="sex" value="female">female</h3><br>
        <input type="submit" name="submit" id="submit" value="SIGN UP">
        <?php
        if(isset($_POST['sex']))
        {
            if($_POST['sex']=='male')
                $sex='male';
            else
                $sex='female';
        }
        ?>
    </form>
</div>
<?php
include_once('includes/footer.php');
?>
</body>
</html>