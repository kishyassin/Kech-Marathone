<?php 
require_once("./connection.php");
session_start();
if(isset($_POST['delete'])){
    $dossard = $_POST['delete'];
    $query = "DELETE FROM athletes WHERE dossard = '$dossard'";
    $con -> query($query);
    header("location: ../adminpanel.php#lists");
    exit();
}

?>


<?php    
    $isUpdated = false;
if(isset($_POST['confirme'])){
    $dossard = $_SESSION['dossard'];
    $chrono = $_POST['chrono'];
    $query ="UPDATE athletes SET chrono = '$chrono' WHERE dossard = $dossard";
    $con -> query($query);
    $isUpdated = true;
}


if (isset($_POST['modify']) || isset($_SESSION['dossard'])) {

    if(!isset($_SESSION['dossard'])) {
        $_SESSION['dossard'] = $_POST['modify'];
    }
    $dossard = $_SESSION['dossard'];
    $query = "SELECT * FROM athletes WHERE dossard = $dossard";
    $result = $con->query($query);
    $row = $result->fetch_all(MYSQLI_ASSOC)[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marathone App</title>
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery/jQuerySource.js"></script>
</head>
<body class=" bg-warning">

    <!-- header  -->
    <header class="bg-light position-fixed w-100 shadow-lg top-0" >
        <div class=" p-3">
            <span class="fs-5 fw-bolder"><span class="text-danger">M</span>Kesh</span>
        </div>
      </header>
    <!-- hero  -->
    <div class="container-fluid  d-flex flex-column justify-content-start mt-5 ">
        <div class="row mt-4">
            <div class="col-3 bg-light rounded-1 offset-1 d-flex justify-content-center align-items-center flex-column">
                <img src="../images/dossard.jpg" alt="" class="w-100 ">
                <span class="position-absolute fs-2 fw-bolder text-light dossard w-100 text-center"> &ThinSpace; <?= str_pad($row['dossard'], 4, 0, STR_PAD_LEFT) ?> </span>
            </div>
            <div class="col-7 bg-light p-3 row">
                <div class="col-12 ">
                    <p class="fs-2">First Name : <?= $row['nom'] ?></p>
                </div>
                <div class="col-12 ">
                    <p class="fs-2">Last Name : <?= $row['prenom'] ?></p>
                </div>
                <div class="col-12 ">
                    <p class="fs-2">Sexe : <?= $row['sexe'] ?></p>
                </div>
                <div class="col-12 ">
                    <p class="fs-2">Age : <?= $row['age'] ?></p>
                </div>
                <div class="col-12 ">
                    <p class="fs-2">Best Chrono : <?= $row['meilleurChrono'] ?></p>
                </div><form action="" method="post">
                <div class="col-12 ">
                    <p class="fs-2">
                        Chrono :
                        <input type="text" name="chrono" value="<?= $row['chrono'] ?>">
                    </p>
                </div>      
                <?php 
                    if ($isUpdated){

                ?>     
                <div class="row">
                    <h4 class=" text-success">
                        Updated Successfully
                    </h4>
                </div> 
                <?php 
                    }
                ?> 
                <div class="row">
                    <button class="btn btn-success w-100 p-1" name="confirme">
                        Confirme
                    </button>
                </div></form>
                <a href="../adminPanel.php#lists" class="btn btn-warning w-100 mt-2 ">
                    Back To Lists
                </a>
            </div>                 
     

        </div>            
    </div>



</body>
</html>
<?php
}
?>



