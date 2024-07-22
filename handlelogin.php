<?php
session_start();
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_POST['loggedin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT email, password FROM user WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $resultEmail, $resultPassword);
    mysqli_stmt_fetch($stmt);
    if ($email == $resultEmail && $password == $resultPassword) {
        $_SESSION["loggedin"] = true;
        $_SESSION["email"] = $resultEmail;
        header("Location: /forum/index.php");
        exit();
    } else {
        echo "<script type='text/javascript'>
                    alert('Please enter correct email or password...');
                    window.location.href='index.php';
              </script>";
    }

    mysqli_stmt_close($stmt);
}
?>