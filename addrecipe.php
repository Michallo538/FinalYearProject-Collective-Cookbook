<?php
include "logic.php";




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


    <div class="fluid-container mt-5  align-items-center">
        <h2 class="text-center">Add your Recipe by filling out the details below.</h2>
    </div>

    <form method="GET">

        <div class=" RecipeAddbox align-content-center fluid-container text-center">
            <div class="container align-content-center text-center">
                <div class="form-group" style="width:50%; float: left;">
                    <label class="my-1 form-label">Recipe Title</label><br>
                    <input class=" w-50 h-25 form control my-3" required type="text" placeholder="Recipe Title" name="RecipeTitle"> <Br>
                    <label class="my-1 form-label"></label>
                    <input class="w-50 h-25 form control my-3" required type="text" placeholder="Recipe Description" name="RecipeDescription"> <Br>

                </div>
                <div style="width: 50%; float: right;">
                    <label class="my-1 form-label">Recipe Steps</label> <br>
                    <input class="w-50 h-25 form control my-3" required type="text" placeholder="Recipe Steps" name="RecipeSteps"> <Br>
                    <label class="my-1 form-label">Recipe Title</label> <br>
                    <input class="w-50 h-25 form control my-3" required type="text" placeholder="Recipe Title" name="RecipeTitle"> <Br>

                </div>


            </div>
        </div>

    </form>

</body>

</html>