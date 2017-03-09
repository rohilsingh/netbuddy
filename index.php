<?php
require_once('includes/session.php');
if(isset($_GET['id']) && $_GET['id']==1)
    echo "<script type='text/javascript'>alert('New user added successfully, please login using your email id and password');</script>";
?>
<html>
<head>
    <title>Social Network|Netbuddy</title>
    <script src="javascript/redirect.js"></script>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<?php
require_once('includes/session.php');
include_once('includes/header_before_login.php');
require_once('includes/query.php');
if (logged_in()) {
    header("location:home.php");
}
if(isset($_POST['submit'])){  //to perform validation of data if submit is clicked
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $result=mysqli_query($connect,login($username,$password));
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_array($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['name']=$user['name'];
        header("location:home.php");
    } else {
        echo '<script>alert("Incorrect username or password. Please try again");</script>';
    }
}
else{   //If data is not filled
    $username = "";
    $password = "";

}
?>
<div id="login">
    <form action="index.php" method="post">
        <h3>USERNAME</h3><br>
        <input type="email" name="username" maxlength="50" value="<?php echo htmlentities($username); ?>" placeholder="email id"><br><br>
        <h3>PASSWORD</h3><br>
        <input type="password" name="password" maxlength="50" value="<?php echo htmlentities($password); ?>"><br><br>
        <input type="submit" name="submit" value="LOGIN"><br>
    </form>
    <a href="forgot_password.php">forgot password</a><br><br><br>
    <h5>don't have NetBuddy account</h5><br>
    <button onclick="sign_up_redirect()">SIGN UP</button>
</div>
<?php
include_once('includes/footer.php');
?>
</body>
</html>