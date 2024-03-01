<?php 
session_start();
if (isset($_POST['ok'])){
    // handling form data 
    $login = $_POST['username1'];
    $pwd = $_POST['password'] ;
    require_once('./connection.php');

    // Use prepared statements to prevent SQL injection
    $query = "SELECT *  FROM athletes WHERE login = ? and password = ?";
    
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ss", $login , $pwd);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        // if the login and password exists 
        if (mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_array($result)) {
                $_SESSION['member']['dossard'] = $row['dossard'];
                $_SESSION['member']['nom'] = $row['nom'];
                $_SESSION['member']['prenom'] = $row['prenom'];
                $_SESSION['member']['sexe'] = $row['sexe'];
                $_SESSION['member']['age'] = $row['age'];
                $_SESSION['member']['meilleurChrono'] = $row['meilleurChrono'];
                $_SESSION['member']['chrono'] = $row['chrono'];
                $_SESSION['member']['login']= $row['login'];
                $_SESSION['member']['pwd']= $row['passWord'];
            }

            //  if the user checked RememberMe to remember his login and password 
            if (isset($_POST['rememberMe'])){
                setcookie('login',$login,time()+100*24*60*60 , "/");
                setcookie('pwd',$pwd,time()+100*24*60*60 , "/");
            }

            // if not , then check if he has already these cookies , then remove them 
            // in case the user choose log out and want to log in an other time butwithout remebering his login
            else{
                if(isset($_COOKIE['login']))
                    setcookie('login',$login,time()-100, "/");
                if(isset($_COOKIE['pwd']))
                    setcookie('pwd',$pwd,time()-100, "/");
            }
            header("Location: ../member.php");
            exit(); 
        }
        else {
            $_SESSION['falseLogin']['username'] = $login;
            $_SESSION['falseLogin']['password'] = $pwd;
            header("location:../index.php#login");
            exit();
        }
            
        
    } else {
        // Handle query execution error
        echo "Error executing query: " ;
    }


    // Close the statement and the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);



}


?>