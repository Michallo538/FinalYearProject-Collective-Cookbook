<?php
include "logic.php";
session_start();


$sql = "SELECT * FROM tblrecipe";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
$recipetitle = $row['RecipeTitle'];
$recipedescription = $row['RecipeDescription'];
$recipecalories = $row['RecipeCalories'];


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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

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
                            <li><a class="dropdown-item" href="/login.php">Login</a></li>
                        </ul>
                    </li>
                </ul>


            </div>
            <div class="nav-logout">
                <a class="nav-logout" href="logout.php"> <img style="height: 40px;" src="/Images/logout.svg"> <br>
                    Logout
                </a>
            </div>
    </nav>





    <?php foreach ($result as $q) { ?>

    <div class="container mt-5 rounded" style="display:flex;">
        <div class="row">
            <div style="min-height:20px; ;" class="align-items-center d-flex justify-content-center">
                <div class="card text-white bg-dark mt-2">
                    <div class="card-body d-flex" style="width:48rem; height:20rem;     display: flex !important;
    flex-direction: column;
    align-content: flex-start;
    justify-content: space-around;">
                        <h2 class="card-title"><?php echo $q['RecipeTitle']; ?></h2>
                        <p style="font-size: 15px;" class="card-text"> <?php echo  substr($q['RecipeDescription'], 0, 50); ?>... </p>
                        <p style="position:absolute; right:0px; bottom:20%;" class="card-text"> <?php echo $q['RecipeCalories']; ?></p>
                        <a style="" href="view.php?PostID=<?php $q['RecipeID']; ?>" class="btn btn-light"> Zobacz całe...</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php }  ?>

</body>

</html>