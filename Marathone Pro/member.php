<?php 
    session_start();
    require_once('./php/connection.php');
    $query = "SELECT COUNT(nom) AS user_count FROM athletes";
    $result =$con ->query($query);
    if ($result) {
        $count = mysqli_fetch_assoc($result);
        if($count['user_count']){
            $countAll = $count['user_count'];
        } else
            $countAll = 0 ;

    } else {
        // Handle query execution error
        echo "Error executing query: " . mysqli_error($con);
    }

    // male 
    $query = "SELECT COUNT(nom) AS user_count FROM athletes where sexe = 'M'";
    $result =$con ->query($query);
    if ($result) {
        $count = mysqli_fetch_assoc($result);
        if($count['user_count']){
            $countMen = $count['user_count'];
        } else
            $countMen = 0 ;

    } else {
        // Handle query execution error
        echo "Error executing query: " . mysqli_error($con);
    }


    // female 
    $query = "SELECT COUNT(nom) AS user_count FROM athletes where sexe = 'F'";
    $result =$con ->query($query);
    if ($result) {
        $count = mysqli_fetch_assoc($result);
        if($count['user_count']){
            $countFemale = $count['user_count'];
        } else
            $countFemale = 0 ;

    } else {
        // Handle query execution error
        echo "Error executing query: " . mysqli_error($con);
    }
?>

<?php     

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
                    <a href="#" class="btn text-end fw-bold text-danger">Home</a>
                </div>
                <div class="col align-content-center justify-content-center d-flex p-3">
                    <a href="./lists.php" class="btn text-center fw-bold">Lists</a>
                </div>
                <div class="col align-content-center justify-content-center d-flex p-3">
                    <a href="./result.php" class="btn text-center fw-bold">Result</a>
                </div>
                <div class="col align-content-end justify-content-end d-flex py-3 w-100">
                    <a href="./adminpanel.php" class="btn text-end fw-bold btn-outline-warning w-100">Admin Panel</a>
                </div>
                <div class="col align-content-center justify-content-end d-flex p-3">
                    <a href="./profile.php" class="btn text-end fw-bold btn-warning w-100 text-center">Profile</a>
                </div>
            </div>
        </div>
    </header>
    <!-- hero  -->
    <div class="container-fluid hero d-flex flex-column justify-content-center">
        <div class="row px-5">
            <div class="col d-flex flex-column align-items-center">
                <h4 class="text-bg-light p-3 rounded-3 w-100 text-center">
                    Welcome Back <span class="fw-bolder"><?= $_SESSION['member']['nom'] .' '. $_SESSION['member']['prenom'] ?></span>  
                </h4>
                <h1 class="text-center w-75 fw-bolder mt-3">Harness the Spirit of <span class="text-warning">Marrakech</span> International <span class="text-warning">Marathon</span> Adventure Awaits</h1>
                <p class="text-center w-75">
                    Join us for an unforgettable experience in the heart of Marrakech. 
                    Lace up your running shoes and embark on a journey through vibrant streets, 
                    historic landmarks, and the scenic beauty of Morocco. 
                    The Marrakech International Marathon awaits, where every step is a stride 
                    towards excitement and cultural discovery.    
                </p>
                <p>
                    <a href="./profile.php" class="btn btn-warning fw-bolder px-5 py-2 mx-2">Profil</a>
                    <a href="./lists.php" class="btn btn-outline-warning px-5 fw-bolder text-light py-2 mx-2 border-2 ">Lists</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Statistics -->
    <div class="container-fluid bg-light pb-5 ">
        <div class="row ">
            <div class="col">
                <h1 class="text-center  mt-4 fw-bolder">Current Statistics</h1>
                <hr>
            </div>
        </div>
        <div class="row px-5 py-4 d-flex justify-content-evenly">
            <div class="col-3 d-flex flex-column align-items-center p-5 border-2 shadow rounded-3 bg-light">
                <p><img src="./images/man.webp" width="50" height="50" alt=""></p>
                <h4>Male</h4>
                <h2><?= $countMen ?></h2>
            </div>
            <div class="col-4 d-flex flex-column align-items-center p-5 border-2 shadow rounded-3 bg-light">
                <p><img src="./images/ppl.png" width="50" height="50" alt=""></p>
                <h4>Total Members</h4>
                <h2><?= $countAll ?></h2>
            </div>
            <div class="col-3 d-flex flex-column align-items-center p-5 border-2 shadow rounded-3 bg-light">
                <p><img src="./images/woman.webp" width="50" height="50" alt=""></p>
                <h4>Female</h4>
                <h2><?= $countFemale ?></h2>
            </div>
        </div>
    </div>

    <footer class="bg-body-tertiary text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2024 Copyright:
          <a class="text-body" href="#">Marathone</a>
        </div>
        <!-- Copyright -->
      </footer>

</body>
</html>
<?php 
} else
 header('location: index.php');
?>