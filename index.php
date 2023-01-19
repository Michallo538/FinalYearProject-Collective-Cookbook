<?php
include "logic.php";
session_start();

?>

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
                        <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/recipes.php">Recipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about.php">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Contact</a></li>
                            <li><a class="dropdown-item" href="/login.php">Login</a></li>
                        </ul>
                    </li>
                </ul>


            </div>
            <a href="/login.php">
                <svg class="profileicon" xmlns="http://www.w3.org/2000/svg" style="width: 40px;" viewBox="0 0 448 512">
                    <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                </svg>
            </a>


    </nav>


    <!-- Main content -->
    <div style="text-align: center;" class="container d-block align-content-center text-align-center">
        <p>
        <h1>
            Welcome to your cookbook!
        </h1>
        </p>
        <h3>
            <p>Place where you will be able to look for recipes ranging from easiest you can find to hardest you can try!</p>
        </h3>
    </div>



    <div class="main-container align-content-center d-flex">

        <div class="container">
            <div class="left-collumn">
                <a href="#Recipes" class="buttonA">View Recipes</a>
                <Br>

                <a href="/login.php" class="buttonA"> Login here</a>
            </div>
            <div class="right-collumn">
                <img class=" img-fluid" src="/Images/chefcoverphoto.jpg">
            </div>
        </div>
    </div>


    <br>
    <!-- Footer -->
    <div class="container-fluid footer d-flex align-content-center">
        <div class="footer-left-collumn container-fluid ">
            <div style="padding-top:1rem; float:left;">
                <a href="/index.php">Home</a><br>
                <a href="#Recipes">Recipes</a><br>
                <a href="#">About</a><br>
            </div>
            <div style="padding-top: 1rem;">
                <a href="#UserLogin">User Login</a><br>
                <a href="#Admin Login">Admin login</a><br>
            </div>

        </div>
        <div class="footer-right-collumn container-fluid">
            <a href="/index.php">
                <img class="footer-logo" src="/Images/cookbooklogo.svg">
            </a>
            <p>By Michal Mazur</p>



        </div>
    </div>

</body>

</html>