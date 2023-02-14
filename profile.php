<?php
include "logic.php";
session_start();
//include "auth_session.php";
$_SESSION['Firstname'];
$_SESSION['UserID'];
if ($_SESSION['permission'] == "admin") {
    header("Location: adminprofile.php");
}
if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
}
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("Location: login.php");
}
//USERID should be stored in Session, for this part to work.
//SQL to find the USERID From TableRecipes
$sqluserid = ("SELECT UserID FROM tblrecipe where UserID = UserID");
$resultID = mysqli_query($conn, $sqluserid);
$count = mysqli_num_rows($resultID);
$row = mysqli_fetch_assoc($resultID);
$UserID = $row['UserID'];

//Statement 
$sql = ("SELECT * FROM tblrecipe where UserID = '{$_SESSION['UserID']}' ORDER BY RecipeID ASC LIMIT 5");
$query = mysqli_query($conn, $sql);
$result = $conn->query($sql);
$count = mysqli_num_rows($query);
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
                        <a class="nav-link" href="/recipes.php">Recipes</a>
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

    <div>
        <?php
        print_r($_SESSION);
        ?>
    </div>

    <div class="grid-container1 my-5">
        <div class="item1 d-flex">
            <h1> Welcome <?php echo ($_SESSION['Firstname']) ?>!</h1>


        </div>
        <div class="item2">
            <?php { ?>
                <a class='my-1 btn btn-dark' href="viewOwnRecipes.php?UserID=<?php echo $UserID ?>"> View My Recipes </a> <br>
                <a class='my-1 btn btn-dark' href="viewProfileOwn.php?UserID=<?php echo $UserID ?>"> View Profile Details </a> <br>
                <a class='my-1 btn btn-dark' href="addrecipe.php?UserID=<?php echo $UserID ?>"> Add New Recipe </a><br>

            <?php
            }
            ?>
        </div>

        <div class=" item3">
            <p>Your Recent Recipes</p>
            <!-- for loop to print out 4 latest recipes added by the user. -->
            <?php $i = 0;

            foreach ($query as $q) :
                //if the table will have 3 rows of Recipes, stop the sequence.
                if ($i == 3) {
                    break;
                } { ?>
                    <table class='my-3 profileRecipe'>
                        <tr>
                            <th>Recipe Title: &nbsp; </th>
                            <th>Calories: &nbsp; </th>
                            <th>Cooking Time: &nbsp; </th>
                            <th></th>
                        </tr>


                        <?php
                        //printing out each Collumn with the attributes below. 
                        echo "<tr class='my-1 mx-1' style='background: #E5E4E2'><td>" . $q['RecipeTitle']
                            . "</td ><td>"
                            . $q['RecipeCalories']
                            . "</td><td>"
                            . $q['CookingTime'] . "Mins"
                            //a button to View the recipe. using the RecipeID to then fill out the detials ont he next page.
                            . "<td> <a style='vertical-align: text-bottom;' class='btn btn-dark' href='viewProfileRecipe.php?RecipeID=" . $q['RecipeID'] . "'> View </a> </td> 
                        </tr>" ?>
                    </table>
                <?php }  ?>
            <?php
                $i++;
            endforeach;
            if ($i == 0) {
                echo "<p class='bg-info mx-3 rounded '; style='font-style:italic' >    No Recipes have been created yet. </p> ";
            }
            ?>
        </div>
        <div class="item4">
            Right</div>
    </div>




    <div class="container-fluid footer d-flex align-content-center">
        <div class="footer-left-collumn container-fluid ">
            <div style="padding-top:1rem; float:left;">
                <a class="footer-link" href="/index.php">Home</a><br>
                <a class="footer-link" href="/recipes.php">Recipes</a><br>
                <a class="footer-link" href="/about.php">About</a><br>
            </div>
            <div style="padding-top: 1rem;">
                <a class="footer-link" href="/login.php">User Login</a><br>
                <a class="footer-link" href="/login.php">Admin login</a><br>
            </div>
            <div>

                <a href="/index.php">
                    <img class="footer-logo" src="/Images/cookbooklogo.svg">
                </a>
            </div>
        </div>

    </div>


</body>

</html>