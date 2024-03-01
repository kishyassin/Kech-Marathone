<?php 
session_start();
if (isset($_POST['ok2'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $sexe = $_POST['sexe'];
    $age = $_POST['age'];
    $pays = $_POST['pays'];
    $mChrono = $_POST['mChrono'];
    $username2 = $_POST['username2'];
    $password2 = $_POST['password2'];

    require_once('./connection.php');
    // Assuming your table has columns like fname, lname, sexe, age, pays, meilleurChrono, username, password
    $query = "INSERT INTO athletes (dossard ,nom, prenom, sexe, age, pays, meilleurChrono,chrono , login, passWord) VALUES (NULL ,?, ?, ?, ?, ?, ?, NULL , ? , ?)";
    $stmt = $con->prepare($query);

    // Assuming your parameters are of the types: 'sssisiss'
    $stmt->bind_param('sssisiss', $fname, $lname, $sexe, $age, $pays, $mChrono, $username2, $password2);

    // Execute the statement
    $stmt->execute();



    if (isset($_POST['logmein'])){
        $_SESSION['member']['dossard'] = $con -> insert_id;
        $_SESSION['member']['nom'] = $fname;
        $_SESSION['member']['prenom'] = $lname;
        $_SESSION['member']['sexe'] = $sexe;
        $_SESSION['member']['age'] = $age;
        $_SESSION['member']['meilleurChrono'] = $mChrono;
        $_SESSION['member']['chrono'] = NULL;   
        $_SESSION['member']['login']= $username2;
        $_SESSION['member']['pwd']= $password2; 
        // Close the statement and the database connection
        $stmt->close();
        $con->close();
        header('location: ../member.php');
        exit();
    }
    else{
        $_SESSION['created'] = "true";
        header('location: ../index.php#login');
        exit();
    }
}


?>