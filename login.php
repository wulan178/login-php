<?php

session_start();

if(isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

include "koneksi.php";

if (isset($_POST["login"])) {

    $username    = $_POST['username'];
    $password    = $_POST['password'];

    $query  = mysqli_query($koneksi, "SELECT * FROM db_users WHERE username = '$username'");

    if (mysqli_num_rows($query) === 1) {

        $row = mysqli_fetch_assoc($query);
        if (password_verify($password, $row['password'])) {

            $_SESSION["login"] = true;

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Log in</title>
</head>
<body>
    <div class="container-fluid">
        <div class="decore1"></div>
        <div class="decore2"></div>
        <div class="decore3"></div>
        <div class="decore4"></div>
        <div class="decore5"></div>
        <div class="decore6"></div>
        <div class="container py-5 mx-auto">
            <div class="card border-light card-body text-white px-5 pt-4 pb-0 mb-4 card-log">
                <form action="" method="POST">
                    <div class="profile text-center mb-5 mt-1">
                        <img src="img/user2.svg" style="height: 80px; width: auto; margin-bottom: 10px;">
                        <h5>Log in to your account</h5>
                    </div>

                    <?php
                    if (isset($error)) {
                    ?>
                        <div class="alert py-0 px-2 align-text-center" role="alert">
                            <small class="text-danger">Incorrect username or password!</small>
                        </div>
                        
                    <?php } ?>

                    <div class="username px-2">
                        <label for="username" class="form-label mb-0">Username:</label>
                        <input type="text" name="username" id=username class="form-control mb-4" placeholder="Username">
                    </div>
                    <div class="password px-2">
                        <label for="password" class="form-label mb-0">Password:</label>
                        <input type="password" name="password" id="password" class="form-control mb-5" placeholder="Password">
                        <div class="btn-log text-center px-2">
                            <button type="submit" name="login" class="btn px-4 py-2 fw-bold rounded-3 mb-5">LOG IN</button>
                        </div>
                    <div class="signup text-center mt-5 mb-n5">
                        <p>Don't have an account? <a href="signup.php" class="text-primary fw-bold">Sign up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>