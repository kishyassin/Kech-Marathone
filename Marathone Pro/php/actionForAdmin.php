<?php 
session_start();
require_once('./connection.php');
if(isset($_POST['ok'])){
    if($_POST['username'] == "admin" && $_POST['password'] == "admin"){
        $_SESSION['isAdmin'] = true;
    }
    else {
        $_SESSION['isAdmin'] = false;
        $_SESSION['adminFalse'] = true;
    }
}

if(isset($_POST['update'])){
    unset($_SESSION['index']);
    unset($_SESSION['athletes']);
    header("location: ../adminPanel.php#athletes");
}

if(isset($_POST['continue'])){
    $dataRecievedTab = explode('#', $_POST['continue']);
    $dossard = (int) $dataRecievedTab[0];
    $chrono = (float) $dataRecievedTab[1];
    $query = "UPDATE athletes SET chrono = ? WHERE dossard = ?";
    $stmt = $con -> prepare($query);
    $stmt -> bind_param("id",$chrono , $dossard);
    $stmt -> execute();
    $_SESSION['athletes'][$_SESSION['index']]['chrono'] = $chrono;
    
    if($_SESSION['index']+1 >= count($_SESSION['athletes']) )
        $_SESSION['index'] = -1;
    $_SESSION['index'] +=1;
    echo $_SESSION['athletes'][$_SESSION['index']]['dossard']
    . '#' . $_SESSION['athletes'][$_SESSION['index']]['nom']
    . '#' . $_SESSION['athletes'][$_SESSION['index']]['prenom']
    . '#' . $_SESSION['athletes'][$_SESSION['index']]['pays']
    . '#' . (isset($_SESSION['athletes'][$_SESSION['index']]['chrono']) ? $_SESSION['athletes'][$_SESSION['index']]['chrono'] : '');
    exit();
}


if(isset($_POST['next'])){
    if($_SESSION['index']+1 == count($_SESSION['athletes']) )
        $_SESSION['index'] = -1;
    $_SESSION['index'] +=1;
    echo $_SESSION['athletes'][$_SESSION['index']]['dossard']
    . '#' . $_SESSION['athletes'][$_SESSION['index']]['nom']
    . '#' . $_SESSION['athletes'][$_SESSION['index']]['prenom']
    . '#' . $_SESSION['athletes'][$_SESSION['index']]['pays']
    . '#' . (isset($_SESSION['athletes'][$_SESSION['index']]['chrono']) ? $_SESSION['athletes'][$_SESSION['index']]['chrono'] : '');
    exit();
}

if(isset($_POST['precedent'])){
        if($_SESSION['index'] == 0 )
            $_SESSION['index'] = count($_SESSION['athletes']);
            $_SESSION['index'] -=1;
        echo $_SESSION['athletes'][$_SESSION['index']]['dossard']
        . '#' . $_SESSION['athletes'][$_SESSION['index']]['nom']
        . '#' . $_SESSION['athletes'][$_SESSION['index']]['prenom']
        . '#' . $_SESSION['athletes'][$_SESSION['index']]['pays']
        . '#' . (isset($_SESSION['athletes'][$_SESSION['index']]['chrono']) ? $_SESSION['athletes'][$_SESSION['index']]['chrono'] : '');
    exit();
}


if(isset($_POST['dateOk'])){
    $newDate = $_POST['date'];
    echo $newDate;
    echo "hello world";
    $file = fopen("../listsDate.txt","w");
    fwrite($file, $newDate);
    fclose($file);
    header("location: ../adminPanel.php#athletes");
    exit();
}


header("location: ../adminPanel.php");
exit();
?>