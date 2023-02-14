<?php
include "logic.php";
session_start();

//USERID should be stored in Session, for this part to work.
//SQL to find the USERID From TableRecipes
$sqluserid = ("SELECT UserID FROM tblrecipe where UserID = UserID");
$resultID = mysqli_query($conn, $sqluserid);
$count = mysqli_num_rows($resultID);
$row = mysqli_fetch_assoc($resultID);
$UserID = $row['UserID'];

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile View | Cookbook</title>
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
            <h1> Viewing Profile of <?php echo ($_SESSION['Firstname']) ?>!</h1>
            <div class="fluid-container ">

            </div>


            <form action="" method="post" style="text-align: -webkit-center;">
                <div class=" container Login-Form  my-5 container-fluid align-items-center d-flex justify-content-center align-center rounded">
                    <div class="left-collumn">
                        <div class="form-group mb-3">
                            <label class="my-3"> Input your First name </label> <br>
                            <input placeholder="First Name" required type="text" name="firstname" value="" class="form-control" <?php echo (!empty($firstname_err)) ? 'is-invalid' : ''; ?> value="<?php echo $firstname; ?> ">
                        </div>

                        <div class="form-group">
                            <label class="my-3"> Input your Last Name </label> <br>
                            <input placeholder="Last Name" required type="text" name="lastname" class="form-control" <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>">
                        </div>
                    </div>
                    <div class="left-collumn">
                        <div class="form-group  mb-3">
                            <label class="my-3"> Input your Email </label> <br>
                            <input placeholder="Email" required type="text" name="email" value="" class="form-control" <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?> ">
                </div>

                <div class=" form-group">
                            <label class="my-3"> Input your password </label> <br>
                            <input placeholder="Password" required type="password" name="password" class="form-control" <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                        </div>
                        <div class="form-group  mb-3">
                            <label class="my-3"> Select your Gender</label> <br>
                            <input placeholder="Gender" class="form-control" required type="text" name="gender" value="" list="Gender" <?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?> value="<?php echo $gender; ?> ">
                        </div>
                    </div>

                    <div class="form-group my-3">
                        <input type="submit" class="btn btn-primary" name="register" value="Register">
                        <a href="index.php" class="btn btn-dark">Cancel</a>
                    </div>
                    <label class="errorMsg mt-3 my-2" id="error"><?php echo $error ?></label>
                </div>
            </form>

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