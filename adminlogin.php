<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page | Cookbook</title>
    <link rel="stylesheet" href="/Styles/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/5a9d0691ae.js" crossorigin="anonymous"></script>

</head>

<body>


    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="/index.php"><img class="Logo" src="/Images/cookbooklogo.svg"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <a href="#Login">
                <svg class="profileicon" xmlns="http://www.w3.org/2000/svg" style="width: 40px;" viewBox="0 0 448 512">
                    <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                </svg>
            </a>
    </nav>



    <div class="container-fluid align-items-center text-center w-100">
        <p>
            <h1>
                Admin Login
            </h1>
        </p>
        <p>
        <h1>Login to your Recipe Book Admin Profile!</h1>
        </p>
        <p>
        <h4>Input your information below, in order to login.</h4>
        </p>
    </div>

    <?php
    if (!empty($login_err)) {
        echo '<div class="alert alert-danger">' . $login_err . '</div>';
    }
    ?>
    <form action="" method="post" style="text-align: -webkit-center;">
        <div class="Login-Form my-5 container-fluid align-items-center d-flex justify-content-center align-center rounded">
            <div class="form-group  mb-3">
                <label class="my-3"> Input your Email </label> <br>
                <input placeholder="Email" required type="text" name="email" value="" class="form-control" <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?> value="<?php echo $username; ?> ">
            </div>

            <div class="form-group">
                <label class="my-3"> Input your password </label> <br>
                <input placeholder="Password" required type="password" name="password" class="form-control" <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
            </div>
            <div class="form-group my-3">
                <input type="submit" class="btn btn-primary" name="signin" value="Login">
            </div>
        </div>
    </form>
    <div class="container-fluid justify-content-center align-items-center ">
        <p style="text-align: center;" class="justify-content-center">
            <a style="text-decoration: none;" href="register.php">
                Don't have an account? Create one here: <button class="btn btn-primary"> Register</button>
            </a>
        </p>
    </div>


</body>

</html>