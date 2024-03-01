<?php session_start() ?>

<!-- statistics  -->
<?php 
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

<!-- get athletes from db  -->
<?php
    require_once('./php/connection.php');
    $query = "SELECT dossard, nom, prenom, pays FROM athletes WHERE chrono is NULL ORDER BY dossard";
    $result =  $con ->query($query);
    if(!isset($_SESSION['athletes'] ))
        $_SESSION['athletes'] = $result->fetch_all(MYSQLI_ASSOC);
    if(!isset($_SESSION['index']))
        $_SESSION['index']=0;
?>



<?php 
    require_once  ('./php/connection.php');
    $query = " SELECT dossard, nom, prenom, pays, chrono FROM athletes";
    $result = $con ->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap/bootstrap.min.css">
    <script src="./js/jquery/jQuerySource.js"></script>
    <script src="./js/dataTable/dataTable.js"></script>
    <script src="./js/dataTable/dataTableBootstrap.js"></script>
    <link rel="stylesheet" href="./css/dataTable/cloudflar.css">
    <link rel="stylesheet" href="./css/dataTable/dataTable.css">
    <script src="./js/js Chart/chartSourceCode.js"></script>

</head>
<body class="bg-warning ">
    <header class="container-fluid position-fixed top-0 bg-light shadow-lg">
        <div class="row">
            <div class="col-5">
                <span class="fs-5 fw-bolder h-100 w-100 align-content-center justify-content-start d-flex p-3"><span class="text-danger">M</span>Kesh</span>
            </div>
            <div class="col-7 row">
                <div class="col align-content-center justify-content-end d-flex p-3">
                    <a href="./index.php" class="btn text-end fw-bold text-danger">Home</a>
                </div>
                <div class="col align-content-center justify-content-center d-flex p-3">
                    <a href="#lists" class="btn text-center fw-bold">Lists</a>
                </div>
                <div class="col align-content-center justify-content-center d-flex p-3">
                    <a href="./result.php" class="btn text-center fw-bold">Result</a>
                </div>
                <?php 
                    if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']){
                ?>

                <div class="col align-content-end justify-content-end d-flex py-3 w-100">
                    <a href="#modifyChrono" class="btn text-end fw-bold btn-outline-warning w-100 text-center">Modify </a>
                </div>
                <div class="col align-content-center justify-content-end d-flex p-3">
                    <a href="./php/adminLogOut.php" class="btn text-end fw-bold btn-warning w-100 text-center">Log Out</a>
                </div>

                <?php 
                    }else{

                 
                ?>
                <div class="col align-content-end justify-content-end d-flex py-3 w-100">
                    <a href="./index.php#login" class="btn text-end fw-bold btn-outline-warning w-100 text-center">User Login </a>
                </div>
                <?php 

                    }
                ?>
            </div>
        </div>
    </header>

    <?php 
        if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']){
    ?>

    <div class="container col-11 mt-5 p-4">
        <div class="row">
            <div class="col bg-light ">
                <h1 class="text-center p-3">
                    Statistics for athletes 
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-5 bg-light p-4">
                <canvas id="myChart"></canvas>
            </div>
            <div class="col-7 bg-light p-4 d-flex justify-content-around align-items-center">
                <div class="row d-flex justify-content-around align-items-center">
                    <div class="col-10  p-3 row">
                        <div class="col-6 text-center d-flex justify-content-evenly align-items-center">
                            <span class=" fw-bolder  fs-3 ">Men</span>
                            <img src="./images/man.webp" width="50" height="50" alt="">
                        </div>
                        <div class="col-6 d-flex justify-content-evenly align-items-center">
                            <span class=" fw-bolder  fs-2 "><?= $countMen ?></span>
                        </div>
                    </div>
                    <div class="col-10  p-3 row">
                        <div class="col-6 text-center d-flex justify-content-evenly align-items-center">
                            <span class=" fw-bolder  fs-3 ">Women</span>
                            <img src="./images/woman.webp" width="50" height="50" alt="">
                        </div>
                        <div class="col-6 d-flex justify-content-evenly align-items-center">
                            <span class=" fw-bolder  fs-2 "><?= $countFemale ?></span>
                        </div>
                    </div>
                    <div class="col-10  p-3 row">
                        <div class="col-6 text-center d-flex justify-content-evenly align-items-center">
                            <span class=" fw-bolder  fs-3 ">Total</span>
                            <img src="./images/ppl.png" width="50" height="50" alt="">
                        </div>
                        <div class="col-6 d-flex justify-content-evenly align-items-center">
                            <span class=" fw-bolder fs-2 "><?= $countAll ?></span>
                        </div>
                    </div>
                    <div class="col-10  p-3 row mt-4">
                        <div class="col">
                            <a class="btn btn-success border-2 w-100" href="#modifyChrono">Modify Chrono</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-success border-2 w-100" href="#lists">Lists of runners</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-danger border-2 w-100" href="php/adminLogOut.php">Log Out</a>
                        </div>
                    </div>
                </div>
                <div id="modifyChrono"></div>
            </div>
        </div>
        <div class="row mt-2  justify-content-center d-flex bg-light position-relative" >
            <form action="./php/actionForAdmin.php" method="post" class=" w-100 h-100">
                <div class="col-12 bg-light p-3 w-100 d-flex align-items-center justify-content-center">
                    <h1 class="text-center">
                        Modify Chrono  
                    </h1>
                    <button name="update" class="btn btn-success position-absolute top-0 m-1 mt-2 float-end end-0">Update</button>
                </div>

            </form>
            <div class="col-12 bg-light row p-2 mb-2">
                <div class="col-4 text-center">
                    <span class="fw-bold"><span class="bg-dark text-light p-1 px-2 rounded-2 ">shift</span>+<span class="bg-dark text-light p-1 px-2 rounded-2 ">Left Arrow</span> to Precedent</span>
                </div>
                <div class="col-4 text-center">
                    <span class="fw-bold"><span class="bg-dark text-light p-1 px-2 rounded-2 ">Enter</span> to Confirme</span>
                </div>
                <div class="col-4 text-center">
                    <span class="fw-bold"><span class="bg-dark text-light p-1 px-2 rounded-2 ">shift</span>+<span class="bg-dark text-light p-1 px-2 rounded-2 ">Right Arrow</span> to skip</span>
                </div>
            </div>
            <hr>
            <div class="col-12 bg-light row p-2 mt-3">
                <div class="col-1 text-center">
                </div>
                <div class="col-2 text-center align-items-center d-flex justify-content-center">
                    <input type="hidden" value="id">
                    <span class=" fw-bold fs-4">Dossard</span>
                </div>
                <div class="col-2 text-center align-items-center d-flex justify-content-center">
                    <span class=" fw-bold fs-4">First Name</span>
                </div>
                <div class="col-2 text-center align-items-center d-flex justify-content-center">
                    <span class=" fw-bold fs-4">Last name</span>
                </div>
                <div class="col-2 text-center align-items-center d-flex justify-content-center">
                    <span class=" fw-bold fs-4">Country</span>
                </div>
                <div class="col-2 text-center align-items-center d-flex justify-content-center">
                    <span class=" fw-bold fs-4">Chrono</span>
                </div>
                <div class="col-1 text-center align-items-center d-flex justify-content-center">
                </div>
            </div>


            <div class="col-12 bg-light row p-2">
                <div class="col-1 text-center">
                    <span class="fw-bold"> <button class="btn bg-black text-light" id="precedent"><</button> </span>
                </div>
                <div id="modifyProcess" class="col-10 row">

                    <?php 
                        if(count($_SESSION['athletes']) > 0){
                    ?>

                    <div class="col text-center align-items-center d-flex justify-content-center">
                        <span class=" fw-bold" id="dossard"><?=  $_SESSION['athletes'][$_SESSION['index']]['dossard'] ?></span>
                    </div>
                    <div class="col text-center align-items-center d-flex justify-content-center">
                        <span class=" fw-bold" id="nom"><?=  $_SESSION['athletes'][$_SESSION['index']]['nom'] ?></span>
                    </div>
                    <div class="col text-center align-items-center d-flex justify-content-center">
                        <span class=" fw-bold" id="prenom"><?=  $_SESSION['athletes'][$_SESSION['index']]['prenom'] ?></span>
                    </div>
                    <div class="col text-center align-items-center d-flex justify-content-center">
                        <span class=" fw-bold" id="pays"><?=  $_SESSION['athletes'][$_SESSION['index']]['pays'] ?></span>
                    </div>
                    <div class="col text-center align-items-center d-flex justify-content-center">
                        <input type="text" class=" form-control border-1 shadow-none " id="chrono" autocomplete="off">
                    </div>

                    <?php 
                        }else{
                            
                    ?>

                    <div class="col-12 text-center ">
                        <span class="fs-3 fw-bolde w-100">
                            All Chrono are Set 
                        </span>
                    </div>

                    <?php 
                        }
                    ?>
                </div>
                <div class="col-1 text-center align-items-center d-flex justify-content-center">
                    <span class="fw-bold"> <button class="btn bg-black text-light" id="next">></button> </span>
                </div>
            </div>

            <div class="col-12 bg-light row p-2">
                <div class="col-12 text-center">
                    <span class="fw-bold"> <button class="btn btn-dark col-10" id="continue">Confirm and Continue</button> </span>
                </div>
            </div>

        </div>
        <div class="row p-3 mt-2 bg-light" id="lists">
            <div class="col-12">
                <h1 class="text-center">List Of All Runners</h1>
            </div>
            <div class="col-12 ">
                <table id="athletes" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Dossard</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Country</th>
                            <th>Chrono</th>
                            <th>Modify</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                         if(isset($_SESSION['dossard']))
                            unset($_SESSION['dossard']);
                            while($row = $result -> fetch_assoc()){
                        ?>
                        <tr>
                            <td align="center"> <?= $row['dossard'] ?> </td>
                            <td align="center"> <?= $row['nom'] ?> </td>
                            <td align="center"> <?= $row['prenom'] ?> </td>
                            <td align="center"> <?= $row['pays'] ?> </td>
                            <td align="center"> <?= $row['chrono'] ?> </td>
                            <td align="center">
                                <form action="./php/adminList.php" method="post">
                                    <input type="image" src="images/modify.png" width="25" height="25" alt="voire">
                                    <input type="hidden" name="modify" value="<?=$row['dossard']?>">
                                </form>
                            </td>
                            <td align="center">
                                <form action="./php/adminList.php" method="post">
                                    <input type="image" src="images/delete.png" width="25" height="25" alt="delete">
                                    <input type="hidden" name="delete" value="<?= $row['dossard'] ?>">
                                </form>
                            </td>
                        </tr>

                        <?php        
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Dossard</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Country</th>
                            <th>Best Chrono</th>
                            <th>Modify</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <?php
            $dateLists = file('listsDate.txt')[0];
        ?>

        <div class="row">
            <form action="./php/actionForAdmin.php" class="col bg-light mt-2 d-flex justify-content-center p-3 align-items-center gap-1" method="post">
                <label for="date" class=" col h-100 align-items-center justify-content-center d-flex">Modify Date Of Results : </label>
                <input type="date" name="date" id="date" class=" form-control col" value="<?= $dateLists ?>">
                <input type="submit" name="dateOk" class="btn btn-warning col" value="Modify">
            </form>
        </div>
    </div>
    
    
    <?php 

        }else{

    ?>
    
    <div class="container-fluid mt-5 pt-2  pb-5" id="login">
        <div class="row">
            <div class=" mt-5 col-8 offset-2 ">
                <form class="bg-body p-4 rounded-3" action="./php/actionForAdmin.php" method="post">
                    <div class="col">
                        <h2 class="text-center pb-4">Log In (Admin) </h2>
                    </div>
                    <div class="col">
                        <h5 class=" text-danger"><?= isset($_SESSION['adminFalse'])?"Username Or Password of Admin is incorrect" : "" ?></h5>
                    </div>
                    <div class="col">
                        <h5 class="text-danger"></h5>
                    </div>

                    <div class="col">
                        <div class="input-group">
                          <input type="text" class="form-control p-2 shadow-none border-2"  placeholder="Username" name="username" autocomplete="off" value="admin">
                        </div>
                    </div>

                    <div class="col mt-3">
                        <div class="input-group">
                            <input type="password" name="password" id="password"  class="form-control p-2 border-2 shadow-none border-2" placeholder="Password" required  value="admin">
                            <div class="input-group-text show" >Show</div>
                        </div>                    
                    </div>
                    <hr>     
                    <?php unset($_SESSION['adminFalse']) ?>               
                    <div class="col">
                        <button class="btn btn-warning w-100 mt-2 p-2 fw-bolder" name="ok">
                            Log In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php 

        }
    ?>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'doughnut',
    data :  {
    labels: [
        'Women',
        'Men'
    ],
    datasets: [{
        label: '<?= $countAll ?>',
        data: [<?= $countFemale ?>, <?= $countMen ?>],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)'
        ],
        hoverOffset: 4
    }]
    }
  });
</script>
 

<script>
$(document).ready(function() {

    // when user press enter , then call the function of ajax request with argument of continue
    $(document).on('keydown click', function(event) {
        // Check if Enter key is pressed
        if (event.which === 13 || event.keyCode === 13) {
            performAjaxRequest("continue");
        }
    });

    // when user click shift+ right arrow call the function with parameter next 
    $(document).on('keydown click', function(event) {
        // Check if shift key is pressed and the right arrow key is pressed
        if ( event.shiftKey  && (event.which === 39 || event.keyCode === 39)) {
            performAjaxRequest("next");
        }
    });

    // when the user presses shift and left arrow call ajax request and pass precedent as parametr 
    $(document).on('keydown click', function(event) {
        // Check if shift key is pressed and the left arrow key is pressed
        if ( event.shiftKey  && (event.which === 37 || event.keyCode === 37)) {
            performAjaxRequest("precedent");
        }
    });

    // Bind the click event for the button with ID "continue" and pass continue as argument 
    $('#continue').on('click', function() {
        performAjaxRequest("continue");
    });

    // Bind the click event for the button with ID "continue" and pass next as argument
    $('#next').on('click', function() {
        performAjaxRequest("next");
    });

    // Bind the click event for the button with ID "continue" and pass precedent as argument
    $('#precedent').on('click', function() {
        performAjaxRequest("precedent");
    });

    function performAjaxRequest(argument) {
        // collect data to send to PHP 
        var dataToSend = $("#dossard").text() + "#" + $("#chrono").val();

        // Make an AJAX request using jQuery
        $.ajax({
            type: 'POST',
            url: './php/actionForAdmin.php',
            data: { [argument]: dataToSend },
            success: function(response) {
                var dataArray = response.split('#');
                if (dataArray.length > 1) {
                    $("#dossard").html(dataArray[0])
                    $("#nom").html(dataArray[1])
                    $("#prenom").html(dataArray[2])
                    $("#pays").html(dataArray[3])
                    $("#chrono").val(dataArray[4])
                }else {
                    $("#modifyProcess").html(response)
                }             

            }
        });
    }

});
</script>


<script>
    new DataTable('#athletes');

</script>
</body>
</html>