<?php
include "logic.php";
session_start();
//USERID should be stored in Session, for this part to work.
//SQL to find the USERID From TableRecipes


$UserID =  $_REQUEST['UserID'];
$sql = ("SELECT * FROM user WHERE UserID = $UserID");
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);


if (!isset($UserID)) {
    header("Location: profile.php");
}
$error = "";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

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

    <div class="fluid-container">
        <div class="fluid-container heading text-center  ">
            <h1 class="text-center"> Viewing Profile of <?php echo ($_SESSION['Firstname']) ?>!</h1>
        </div>

        <div class="mx-5 my-3 rounded bg-info rounded fluid-container rrow">

            <div class="bg-info column text-center form-group">
                <div>
                    <label class="pr-5 form-label" for="firstname">Firstname</label>
                    <label class="form-label" for="lastname">Lastname</label>
                </div>
                <div class="d-inline-flex">

                    <input class="text-center form-control" name="firstname" type="text" disabled value="<?php echo $row['Firstname'] ?>">
                    <input class="text-center form-control" name="lastname" type="text" disabled value="<?php echo $row['Lastname'] ?>">
                </div>
                <br>
                <div>
                    <label class="form-label my-2 label">Email</label>
                    <input class="text-center form-control" name="Email" type="text" disabled value="<?php echo $row['email']; ?>">
                </div>
                <label class="form-label my-2 label">Password</label>
                <div>
                    <div class="" style="align-items: baseline; display:inline-flex; ">
                        <input style="width:fit-content" class="text-center form-control" name="Password" type="password" id="Password" disabled value="<?php echo $row['password'] ?>"> <i style="padding-left:10px; cursor:poiner" class="bi bi-eye-slash" id="togglePassword"></i>

                    </div>
                </div>

            </div>

            <div class="column">
                <div>
                    <label class="form-label ">About:</label>
                    <textarea disabled id="abouttxt" class="form-control mb-2" type="text" name="About" cols="20" rows="5" placeholder="We don't know anything about you, add something here for us to get to know you little better!"></textarea>

                </div>
                <div>
                    <label class="form-label">Account Created:</label><br>
                    <input disabled type="datetime" class="form-control" name="AccountDateTime" value="<?php echo $row['create_datetime']; ?> ">
                </div>
                <div>
                    <label for="gender" class="form-label">Gender</label>
                    <input enabled type="text" class="form-control" name="gender" value="<?php echo $row['Gender']; ?>">
                </div>

            </div>


            <div class="fluid-container text-center">
                <a href="editProfileDetails.php?UserID=<?php echo $UserID ?>" class="btn btn-dark">Edit Details</a>
            </div>

        </div>

    </div>









    <div class="container-fluid footer d-flex align-content-center">
        <div class="footer-left-collumn container-fluid ">
            <div style=" padding-top:1rem; float:left;">
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
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const Password = document.querySelector("#Password");


        togglePassword.addEventListener("click", function() {
            const type = Password.getAttribute("type") === "password" ? "text" : "password";
            Password.setAttribute("type", type);

            this.classList.toggle("bi-eye");
        });

        const form = document.querySelector("form");
        form.addEventListener('submit', function(e) {
            e.preventDefault();
        });


        document.getElementById("abouttxt").value = <?php echo $row['about']; ?>
    </script>
</body>

</html>