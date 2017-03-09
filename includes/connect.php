<?php
require('constants.php');
$connect=mysqli_connect(H_NAME,USERNAME,PASSWORD,DB);
if(!$connect)
    die("Sorry for inconvenience but we cannot reach to database ");
?>