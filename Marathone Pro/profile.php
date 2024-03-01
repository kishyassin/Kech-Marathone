<?php     
session_start();
if (isset($_SESSION['member'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marathone App</title>
    <link rel="stylesheet" href="./css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery/jQuerySource.js"></script>
</head>
<body>
    <!-- background imege  -->
    <div class="home"></div>

    <!-- header  -->
    <header class="container-fluid position-fixed top-0 bg-light shadow-lg">
        <div class="row">
            <div class="col-5">
                <span class="fs-5 fw-bolder h-100 w-100 align-content-center justify-content-start d-flex p-3"><span class="text-danger">M</span>Kesh</span>
            </div>
            <div class="col-7 row">
                <div class="col align-content-center justify-content-end d-flex p-3">
                    <a href="member.php" class="btn text-end fw-bold">Home</a>
                </div>
                <div class="col align-content-center justify-content-center d-flex p-3">
                    <a href="./lists.php" class="btn text-center fw-bold">Lists</a>
                </div>
                <div class="col align-content-center justify-content-center d-flex p-3">
                    <a href="./result.php" class="btn text-center fw-bold">Result</a>
                </div>
                <div class="col align-content-end justify-content-end d-flex py-3 w-100">
                    <a href="./adminpanel.php" class="btn text-end fw-bold btn-outline-warning w-100 text-center">Admin Panel</a>
                </div>
            </div>
        </div>
    </header>
    <!-- hero  -->
    <div class="container-fluid  d-flex flex-column justify-content-start mt-5 ">
        <div class="row px-5 mt-5">
            <div class="col">
                <p class="text-bg-light p-3 rounded fs-4 text-center ">
                    Welcome back <span class="fw-bolder"><?= $_SESSION['member']['nom'] .' '. $_SESSION['member']['prenom'] ?></span>
                </p>
                
            </div>
        </div>
        <div class="row m-2">
            <div class="col-3 bg-light rounded-1 offset-1 d-flex justify-content-center align-items-center flex-column">
                <img src="./images/dossard.jpg" alt="" class="w-100 ">
                <span class="position-absolute fs-2 fw-bolder text-light dossard w-100 text-center"> &ThinSpace; <?= str_pad($_SESSION['member']['dossard'] , 4 ,0 , STR_PAD_LEFT) ?> </span>
            </div>
            <div class="col-7 bg-light p-3 row">
                <div class="col-12 ">
                    <p class="fs-2">First Name : <?= $_SESSION['member']['nom'] ?></p>
                </div>
                <div class="col-12 ">
                    <p class="fs-2">Last Name : <?= $_SESSION['member']['prenom'] ?></p>
                </div>
                <div class="col-12 ">
                    <p class="fs-2">Sexe : <?= $_SESSION['member']['sexe'] ?></p>
                </div>
                <div class="col-12 ">
                    <p class="fs-2">Age : <?= $_SESSION['member']['age'] ?></p>
                </div>
                <div class="col-12 ">
                    <p class="fs-2">Best Chrono : <?= $_SESSION['member']['meilleurChrono'] ?></p>
                </div>
                <div class="col-12 ">
                    <p class="fs-2"> Chrono : <?= isset($_SESSION['member']['chrono'])?$_SESSION['member']['chrono']:"Not Set Yet" ?></p>
                </div>
            </div>
        </div>
        <form action="php/actionForProfile.php" method="post">            
            <div class="row p-3">
                <div class="col-6 bg-white offset-3 p-3">
                    <input type="checkbox" name="rememberMe" id="rememberMe" <?= isset($_SESSION['member']['login']) ?"checked":"" ?>>
                    <label for="rememberMe">Save My Login informations?</label>
                </div>
            </div>
            <div class="row">
                <div class="col-3 offset-3 ">
                    <button class="btn btn-danger shadow-lg border-2 p-2 border-warning fw-bolder fs-5 w-100" name="delete">Delete My Account  </button>
                </div>
                <div class="col-3">
                    <button class="btn btn-warning shadow-lg border-2 p-2 border-warning fw-bolder fs-5 w-100" name="logout">Log Out </button>
                </div>
            </div>

        </form>
    </div>



</body>
</html>
<?php 
} else
 header('location: index.php');
?>