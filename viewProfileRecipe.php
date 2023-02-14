<?php
include "logic.php";
session_start();
/*
$sql = "SELECT * FROM tblrecipe WHERE RecipeID = '$RecipeID';";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
$recipeID = $row['RecipeID'];
$recipeTitle = $row['RecipeTitle'];
$recipeDescription = $row['RecipeDescription'];
$recipeCalories = $row['RecipeCalories'];
*/

if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
}
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("Location: login.php");
}

if (isset($_REQUEST['RecipeID'])) {
    $RecipeID = $_GET['RecipeID'];
    $sql = "SELECT  * FROM tblrecipe WHERE RecipeID = $RecipeID";
    $query = mysqli_query($conn, $sql);
    $rowUID = mysqli_fetch_assoc($query);
    $UserID = $rowUID['UserID'];
}
$asql = "SELECT * FROM user WHERE UserID =' {$_SESSION['UserID']}'";
$resultAuthor = mysqli_query($conn, $asql);
$aCount = mysqli_num_rows($resultAuthor);
$row = mysqli_fetch_assoc($resultAuthor);
$AuthorFname = $row['Firstname'];
$AuthorLname = $row['Lastname'];

/*

*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php foreach ($query as $q) { ?>
        <title> Viewing Recipe: <?php echo $q['RecipeTitle']; ?> | Cookbook</title>
    <?php } ?>
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
                        <a class="nav-link " aria-current="page" href="/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/recipes.php">Recipes</a>
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

    <div>
        <?php
        print_r($_SESSION);
        ?>
    </div>

    <div class="fluid-container py-2 mt-3 mx-5 my-5  bg-info rounded align-items-center">
        <h2 class="text-center">Viewing: <?php echo $q['RecipeTitle'] ?></h2>

    </div>
    <div class="fluid-container  py-2 mt-3 mx-5 px-2 my-5 bg-info ">
        <?php foreach ($query as $q) { ?>
            <div class="grid-container">
                <div class="picture"><img> Image </div>
                <div class="main">
                    <div class="main h1 RecipeTitle">

                        <?php echo $q['RecipeTitle'] ?> </div>

                    <?php foreach ($resultAuthor as $qq) { ?>

                        <div class="main h4 recipeAuthor">
                            <?php echo  '<a href="ViewProfile.php?UserID=' . $q['UserID'] . '">' . $qq['Firstname'] . '&nbsp' . $qq['Lastname'] . "</a>"; ?>

                        </div>
                    <?php } ?>
                    <div class="main">
                        <?php echo $q['RecipeCalories'] . " Cal"; ?>
                    </div>
                    <div class="main">Planning list - Prep time cooking time difficulty how many servses</div>

                </div>
                <div class="menu">Menu</div>
                <div class="main">Main</div>
            </div>

        <?php } ?>
    </div>
    <div style="float:right;" class="fluid-container  py-2 mt-3 mx-5 px-2 my-5 ">
        <a class="btn btn-primary" <?php session_abort(); ?> href="/profile.php">Back</a>
    </div>

</body>

</html>