<?php
include "logic.php";
session_start();
$_SESSION['permission'];

if ($_SESSION['permission'] == "user") {
    header("Location: profile.php?userloggedin");
} elseif ($_SESSION['permission'] == "admin") {
    header("Location: adminprofile.php");
}


?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile type</title>
</head>

<body>


    <h1> <?php print_r($_SESSION); ?></h1>

</body>

</html>