<?php
if (isset($_POST['usernameInput'])) {
    require_once('./connection.php');

    // Use prepared statements to prevent SQL injection
    $query = "SELECT COUNT(login) AS user_count FROM athletes WHERE login = ?";
    
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $_POST['usernameInput']);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        $count = mysqli_fetch_assoc($result);
        if($count['user_count']){
            echo '<p class="text-danger" data-allow="disabled" >User Already Exists. Please Choose other username</p>';
        } else
            echo '<p class="text-success" data-allow=" " >Valide Username</p>';

    } else {
        // Handle query execution error
        echo "Error executing query: " . mysqli_error($con);
    }

    // Close the statement and the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
