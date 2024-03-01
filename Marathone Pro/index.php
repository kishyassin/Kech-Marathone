<?php
session_start();

if(isset($_SESSION['member'])){
    header("location: member.php");
    exit();
}

require_once('./php/connection.php');
$query = "SELECT COUNT(nom) AS user_count FROM athletes";
$result = $con->query($query);
if ($result) {
    $count = mysqli_fetch_assoc($result);
    if ($count['user_count']) {
        $countAll = $count['user_count'];
    } else
        $countAll = 0;
} else {
    // Handle query execution error
    echo "Error executing query: " . mysqli_error($con);
}

// male 
$query = "SELECT COUNT(nom) AS user_count FROM athletes where sexe = 'M'";
$result = $con->query($query);
if ($result) {
    $count = mysqli_fetch_assoc($result);
    if ($count['user_count']) {
        $countMen = $count['user_count'];
    } else
        $countMen = 0;
} else {
    // Handle query execution error
    echo "Error executing query: " . mysqli_error($con);
}


// female 
$query = "SELECT COUNT(nom) AS user_count FROM athletes where sexe = 'F'";
$result = $con->query($query);
if ($result) {
    $count = mysqli_fetch_assoc($result);
    if ($count['user_count']) {
        $countFemale = $count['user_count'];
    } else
        $countFemale = 0;
} else {
    // Handle query execution error
    echo "Error executing query: " . mysqli_error($con);
}
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
    <script src="./js/bootstrap/bootstrap.min.js"></script>
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
                    <a href="./adminpanel.php" class="btn text-center fw-bold btn-outline-warning w-100">Admin Panel</a>
                </div>
                <div class="col align-content-center justify-content-end d-flex p-3">
                    <a href="#login" class="btn text-end fw-bold btn-warning w-100 text-center">Log In </a>
                </div>
            </div>
        </div>
    </header>
    <!-- hero  -->
    <div class="container-fluid hero d-flex flex-column justify-content-center">
        <div class="row px-5">
            <div class="col d-flex flex-column align-items-center">
                <h1 class="text-center w-75 fw-bolder">Harness the Spirit of <span class="text-warning">Marrakech</span> International <span class="text-warning">Marathon</span> Adventure Awaits</h1>
                <p class="text-center w-75">
                    Join us for an unforgettable experience in the heart of Marrakech.
                    Lace up your running shoes and embark on a journey through vibrant streets,
                    historic landmarks, and the scenic beauty of Morocco.
                    The Marrakech International Marathon awaits, where every step is a stride
                    towards excitement and cultural discovery.
                </p>
                <p>
                    <a href="#login" class="btn btn-warning fw-bolder px-5 py-2 mx-2">Log In</a>
                    <a href="#inscription" class="btn btn-outline-warning px-5 fw-bolder text-light py-2 mx-2 border-2 ">Inscription</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Statistics -->
    <div class="container-fluid bg-light pb-5 ">
        <div class="row">
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

    <!-- log in section  -->
    <div class="container-fluid bg-warning pb-5" id="login">
        <div class="row ">
            <div class="row">
                <div class="col">
                    <h1 class="text-center text-white mt-4 mb-3 fw-bolder">Already a Member ? Welcome Back</h1>
                </div>
            </div>
            <hr>
            <div class=" col-8 offset-2 ">
                <form class="bg-body p-4 rounded-3" action="./php/login.php" method="post">
                    <div class="col">
                        <h2 class="text-center pb-4">Log In </h2>
                    </div>
                    <div class="col">
                        <h5 class=" text-success text-center"><?= isset($_SESSION['created']) ? "Your Account is created successfully" : "" ?></h5>
                    </div>
                    <div class="col">
                        <h5 class="text-danger"><?= isset($_SESSION['falseLogin']) ? "Username Or Password Incorrect" : "" ?></h5>
                    </div>

                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-text">@</div>
                            <input type="text" class="form-control p-2 shadow-none border-2" placeholder="Username" name="username1" autocomplete="off" value="<?= isset($_SESSION['falseLogin']) ? $_SESSION['falseLogin']['username'] : (isset($_COOKIE['login']) ? $_COOKIE['login'] : '') ?>">
                        </div>
                    </div>

                    <div class="col mt-3">
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control p-2 border-2 shadow-none border-2" placeholder="Password" required value="<?= isset($_SESSION['falseLogin']) ? $_SESSION['falseLogin']['password'] : (isset($_COOKIE['pwd']) ? $_COOKIE['pwd'] : '') ?>">
                            <div class="input-group-text show">Show</div>
                        </div>
                    </div>
                    <hr>
                    <?php
                    unset($_SESSION['falseLogin']);
                    unset($_SESSION['created']);
                    ?>
                    <div class="col">
                        <input type="checkbox" name="rememberMe" id="rememberMe" class="form-check-input border-3 shadow-sm">
                        <label for="rememberMe" class="form-label px-1 ">Remember Me</label>
                    </div>
                    <div class="col">
                        <button class="btn btn-warning w-100 mt-2 p-2 fw-bolder" name="ok">
                            Log In
                        </button>
                    </div>
                    <div class="col">
                        <p class="mt-4">Don't Have An Account Yet? <a href="#inscription">Sign Un</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- paragraph section  -->
    <div class="container-fluid bg-light">
        <div class="row p-4 pb-5 pt-4">
            <div class="row">
                <div class="col">
                    <h1 class="text-center text-black mb-3 fw-bolder">The Marrakech International Marathon Experience</h1>
                </div>
            </div>
            <hr>
            <div class="col row">
                <div class="col-6  col-lg-6 col-sm-12">
                    <p class="fs-5 p-2">The Marrakech International Marathon is an annual spectacle that captivates runners and enthusiasts from around the globe. Nestled against the backdrop of the enchanting city of Marrakech, this marathon is not just a race; it's an immersive experience that seamlessly blends the thrill of athletic competition with the rich cultural tapestry of Morocco. Participants traverse a scenic route, winding through the city's historic quarters, lively markets, and picturesque landscapes. As the rhythmic pounding of footsteps echoes against the ancient walls, runners absorb the vibrant energy of Marrakech, making each kilometer a unique adventure. Whether you're a seasoned athlete seeking a new challenge or a recreational runner craving a taste of the extraordinary, the Marrakech International Marathon promises an unforgettable journey, where the spirit of sport converges with the allure of one of North Africa's most iconic cities. Lace up, join the global community of runners, and embark on a marathon that goes beyond the finish line, leaving you with enduring memories of endurance, camaraderie, and the magic of Marrakech.</p>
                </div>
                <div class="col-6  col-lg-6 col-sm-12">
                    <img src="./images/marathoneExp.jpg" alt="" class="w-100">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-warning pb-5" id="inscription">
        <div class="row ">
            <div class="row">
                <div class="col">
                    <h1 class="text-center text-white mt-4 mb-3 fw-bolder">New here? welcome</h1>
                </div>
            </div>
            <hr>
            <div class=" col-8 offset-2 ">
                <form class="bg-body p-4 rounded-3" method="post" action="php/inscription.php">
                    <div class="col">
                        <h2 class="text-center pb-4">Create an Account</h2>
                    </div>
                    <div class="col row pb-3">
                        <div class="col-6">
                            <input type="text" autocomplete="off" placeholder="First Name" class="form-control p-2 border-2 shadow-none" name="fname">
                        </div>
                        <div class="col-6">
                            <input type="text" autocomplete="off" placeholder="Last Name" class="form-control p-2 border-2 shadow-none" name="lname">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-text">@</div>
                            <input type="text" autocomplete="off" class="form-control p-2 shadow-none border-2" placeholder="Username" name="username2" autocomplete="false" id="username2">
                        </div>
                        <div id="validation" class="col"></div>
                    </div>
                    <div class="col row">
                        <div class="col-6 mt-3">
                            <select name="sexe" id="sexe" class="form-select shadow-none p-2 border-2  " required>
                                <option value="" disabled selected>Sexe</option>
                                <option value="F">Female</option>
                                <option value="M">Male</option>
                            </select>
                        </div>
                        <div class="col-6 mt-3">
                            <input type="number" autocomplete="off"" name=" mChrono" id="mChrono" class="form-control p-2 border-2 shadow-none" placeholder="Best Chrono" required>
                        </div>
                    </div>
                    <div class="col">
                        <input type="number" autocomplete="off" name="age" id="age" class="form-control mt-3 shadow-none border-2 " placeholder="Age" required>
                    </div>
                    <div class="col">
                        <input type="text" autocomplete="off" name="pays" id="pays" class="form-control mt-3 shadow-none border-2 " placeholder="Morocco" required>
                    </div>
                    <div class="col mt-3">
                        <div class="input-group">
                            <input type="password" autocomplete="off" name="password2" id="password2" class="form-control p-2 border-2 shadow-none border-2" placeholder="Password" required>
                            <div class="input-group-text show">Show</div>
                        </div>
                    </div>
                    <div class="col mt-3">
                        <div class="input-group">
                            <input type="password" autocomplete="off" name="confirmPassword" id="ConfirmPassword" class="form-control p-2 border-2 shadow-none border-2" placeholder="Confirm Password" required>
                            <div class="input-group-text show">Show</div>
                        </div>
                    </div>
                    <div class="col" id="confirmation">

                    </div>
                    <hr>
                    <div class="col">
                        <input type="checkbox" name="logmein" id="logmein" class="form-check-input border-3 shadow-sm">
                        <label for="logmein" class="form-label px-1 ">Log Me In </label>
                    </div>
                    <div class="col">
                        <button class="btn btn-warning w-100 mt-2 p-2 fw-bolder" name="ok2" id="ok2">
                            Create
                        </button>
                    </div>
                    <div class="col">
                        <p class="mt-4">Already Have an Account? <a href="#login">Log In</a> </p>
                    </div>
                </form>
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

    <script>
        $(document).ready(function() {
            // username validation 
            $('#username2').keyup(function() {
                var inputValue = $(this).val();
                if (inputValue != '') {
                    $.ajax({
                        url: 'php/actionForUsername.php',
                        method: 'POST',
                        data: {
                            usernameInput: inputValue
                        },
                        success: function(response) {
                            $("#validation").html(response);
                            // $("#ok2").attr($("#validation p").data("allow"))
                            $("#validation p").data('allow') == "disabled" ? $('#ok2').prop('disabled', true) : $('#ok2').prop('disabled', false);
                        }
                    })
                } else {
                    $("#validation").html('');
                    $('#ok2').prop('disabled', false)
                }
            })

            // password confirmation 
            $("#ConfirmPassword").keyup(function() {
                if ($("#password2").val() != '') {
                    if ($("#password2").val() != $("#ConfirmPassword").val()) {
                        $("#confirmation").html('<p class="text-danger">Passwords Doesn\'t match</p>')
                        $('#ok2').prop('disabled', true)
                    } else {
                        $("#confirmation").html('')
                        $('#ok2').prop('disabled', false)
                    }
                } else
                    $("#confirmation").html('<p class="text-danger">Please enter e valid password</p>')
            })
            $("#password2").keyup(function() {
                if ($("#ConfirmPassword").val() != '') {
                    if ($("#password2").val() != $("#ConfirmPassword").val()) {
                        $("#confirmation").html('<p class="text-danger">Passwords Doesn\'t match</p>')
                        $('#ok2').prop('disabled', true)
                    } else {
                        $("#confirmation").html('')
                        $('#ok2').prop('disabled', false)
                    }

                }

            })

            // password SHOW / HIDE 
            $(".show").on("click", function() {
                var passwordField = $(this).prev("input");
                var fieldType = passwordField.attr("type");

                // Toggle between password and text
                passwordField.attr(
                    "type",
                    fieldType === "password" ? "text" : "password"
                );
            });
        })
    </script>
</body>

</html>