<?php
    session_start();
    unset($_SESSION['isAdmin']);
    unset($_SESSION['member']);
    header("location: ../index.php")
?>