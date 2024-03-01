
<?php 
session_start();
    require_once  ('./php/connection.php');
    $query = " SELECT dossard, nom, prenom, pays, sexe, meilleurChrono FROM athletes ORDER BY nom";
    if (isset($_GET['sexe']) && $_GET['sexe'] == "men")
        $query = " SELECT dossard, nom, prenom, pays, sexe, meilleurChrono FROM athletes WHERE sexe = 'M' ORDER BY nom";

    if (isset($_GET['sexe']) && $_GET['sexe'] == "women")
        $query = " SELECT dossard, nom, prenom, pays, sexe, meilleurChrono FROM athletes WHERE sexe = 'F' ORDER BY nom";
    $result = $con ->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marathone App</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap/bootstrap.min.css">
    <script src="./js/jquery/jQuerySource.js"></script>
    <script src="./js/dataTable/dataTable.js"></script>
    <script src="./js/dataTable/dataTableBootstrap.js"></script>
    <link rel="stylesheet" href="./css/dataTable/cloudflar.css">
    <link rel="stylesheet" href="./css/dataTable/dataTable.css">
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
                    <a href="./index.php" class="btn text-end fw-bold">Home</a>
                </div>
                <div class="col align-content-center justify-content-center d-flex p-3">
                    <a href="./lists.php" class="btn text-center fw-bold text-danger">Lists</a>
                </div>
                <div class="col align-content-center justify-content-center d-flex p-3">
                    <a href="./result.php" class="btn text-center fw-bold">Result</a>
                </div>
                <div class="col align-content-end justify-content-end d-flex py-3 w-100">
                    <a href="./adminpanel.php" class="btn text-end fw-bold btn-outline-warning w-100 text-center">Admin Panel</a>
                </div>

                <?php if(isset($_SESSION['member'])){ ?>

                <div class="col align-content-center justify-content-end d-flex p-3">
                    <a href="./profile.php" class="btn text-end fw-bold btn-warning w-100 text-center">Profile</a>
                </div>

                <?php } ?>

            </div>
        </div>
    </header>
    <!-- hero  -->
    <div class="container-fluid hero d-flex flex-column justify-content-center">
        <div class="row px-5">
            <div class="col d-flex flex-column align-items-center">
                <h1 class="text-center w-75 fw-bolder">Choose a gender To Show </h1>
                <p class="text-center w-75">
    
                </p>
                <p>
                    <a href="lists.php?sexe=men" class="btn btn-warning fw-bolder px-5 py-2 mx-2">Male</a>
                    <a href="lists.php?sexe=women" class="btn btn-warning fw-bolder px-5 py-2 mx-2">Female</a>
                </p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row p-3 bg-light">
            <div class="col-12 ">
                <table id="athletes" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Dossard</th>
                            <th>Sexe</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Country</th>
                            <th>Best Chrono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($row = $result -> fetch_assoc()){
                        ?>
                        <tr>
                            <td> <?= $row['dossard'] ?> </td>
                            <td> <?= $row['sexe'] ?> </td>
                            <td> <?= $row['nom'] ?> </td>
                            <td> <?= $row['prenom'] ?> </td>
                            <td> <?= $row['pays'] ?> </td>
                            <td> <?= $row['meilleurChrono'] ?> </td>
                        </tr>

                        <?php        
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Dossard</th>
                            <th>Sexe</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Country</th>
                            <th>Best Chrono</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

<script>
    new DataTable('#athletes');

</script>
      
</body>
</html>