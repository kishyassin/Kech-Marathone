<?php     
session_start();

if (isset($_POST['rememberMe'])){
    $login = $_SESSION['member']['login'];
    $pwd = $_SESSION['member']['pwd'];
    setcookie('login',$login,time()+100*24*60*60 , "/");
    setcookie('pwd',$pwd,time()+100*24*60*60 , "/");
}else{
    if(isset($_COOKIE['login']))
        setcookie('login',$login,time()-100, "/");
    if(isset($_COOKIE['pwd']))
        setcookie('pwd',$pwd,time()-100, "/");
}

if (isset($_POST['logout'])){
    unset($_SESSION['member']);
    header("Location: ../index.php#login");
    exit(); 
}

// delete profil 
if (isset($_POST['delete'])){
    require_once ("./connection.php");
    $query = "DELETE FROM athletes WHERE dossard = ?";
    $stmt = $con -> prepare($query);
    $stmt -> bind_param('i',$_SESSION['member']['dossard']);
    $stmt -> execute();
    unset($_SESSION['member']);
    if(isset($_COOKIE['login']))
        setcookie('login',$login,time()-100, "/");
    if(isset($_COOKIE['pwd']))
        setcookie('pwd',$pwd,time()-100, "/");
    header("Location: ../index.php#login");
    exit(); 
}


?>