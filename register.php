<?php

include "logic.php";
session_start();
$error = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = stripslashes($_REQUEST['firstname']);
    $firstname = mysqli_real_escape_string($conn, $firstname);
    $lastname = stripslashes($_REQUEST['lastname']);
    $lastname = mysqli_real_escape_string($conn, $lastname);
    //  $about = stripslashes($_REQUEST['about']);
    //    $about = mysqli_real_escape_string($conn, $about);
    $gender = stripslashes($_REQUEST['gender']);
    $gender = mysqli_real_escape_string($conn, $gender);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($conn, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    //$permission = stripslashes($_REQUEST['permission']);
   // $permission = mysqli_real_escape_string($conn, $permission);
    $create_datetime = date("Y-m-d H:i:s");

    $sql = "SELECT * from user where (email = '$email');";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if ($email == isset($row['email'])) {

            $error = "That Email already exists in our System!";
        }
    } else {
        $query = "INSERT into user( firstname, lastname,  gender, email,  password, create_datetime)
                VALUES ('$firstname',  '$lastname', '$gender', '$email', '" . md5($password) . "', '$create_datetime')";

        $result = mysqli_query($conn, $query);
        header("Location: login.php?info=registered");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Cookbook</title>
    <link rel="stylesheet" href="/Styles/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/5a9d0691ae.js" crossorigin="anonymous"></script>

</head>
<datalist id="Gender">
    <option value="Male">
    <option value="Female">
    <option value="Other">
</datalist>

<body>


    <?php


    ?>

    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="/index.php"><img class="Logo" src="/Images/cookbooklogo.svg"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Contact</a></li>
                            <li><a class="dropdown-item active" href="/login.php">Login</a></li>
                        </ul>
                    </li>
                    <li>

                    </li>
                </ul>


            </div>
            <a href="login.php">
                <svg class="profileicon" xmlns="http://www.w3.org/2000/svg" style="width: 40px;" viewBox="0 0 448 512">
                    <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path
                        d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                </svg>
            </a>
    </nav>



    <div class="container-fluid align-items-center text-center w-100">
        <p>
        <h1>Register to your cookbook!</h1>
        </p>
        <p>
        <h4>Input your information below, in order to register your account.</h4>
        </p>
    </div>


    <form action="" method="post" style="text-align:  -webkit-center;">
        <div
            class="container Login-Form my-5 container-fluid align-items-center d-flex justify-content-center align-center rounded">
            <div class="left-collumn">
                <div class="form-group mb-3">
                    <label class="my-3"> Input your First name </label> <br>
                    <input placeholder="First Name" required type="text" name="firstname" value="" class="form-control"
                        <?php echo (!empty($firstname_err)) ? 'is-invalid' : ''; ?> value="<?php echo $firstname; ?> ">
                </div>

                <div class="form-group">
                    <label class="my-3"> Input your Last Name </label> <br>
                    <input placeholder="Last Name" required type="text" name="lastname" class="form-control"
                        <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>">
                </div>
            </div>
            <div class="left-collumn">
                <div class="form-group  mb-3">
                    <label class="my-3"> Input your Email </label> <br>
                    <input placeholder="Email" required type="text" name="email" value="" class="form-control"
                        <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?> ">
                </div>

                <div class=" form-group">
                    <label class="my-3"> Input your password </label> <br>
                    <input placeholder="Password" required type="password" name="password" class="form-control"
                        <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                </div>
                <div class="form-group  mb-3">
                    <label class="my-3"> Select your Gender</label> <br>
                    <input placeholder="Gender" class="form-control" required type="text" name="gender" value=""
                        list="Gender" <?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>
                        value="<?php echo $gender; ?> ">
                </div>
            </div>

            <div class="form-group my-3">
                <input type="submit" class="btn btn-primary" name="register" value="Register">
                <a href="index.php" class="btn btn-dark">Cancel</a>
            </div>
            <label class="errorMsg mt-3 my-2" id="error"><?php echo $error ?></label>
        </div>
    </form>
    <div class="container-fluid justify-content-center align-items-center ">
        <p style="text-align: center;" class="justify-content-center">
            <a style="text-decoration: none;" href="login.php">
                Already have an account? Login Here: <button class="btn btn-primary"> Login</button>
            </a>
        </p>
    </div>







</body>

</html>