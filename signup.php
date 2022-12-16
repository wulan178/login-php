<?php

include "koneksi.php";

if (isset($_POST["signup"])) {

    if (signup($_POST) > 0) {
        echo "<script> alert ('new user was added'); </script>";
    } else {
        echo mysqli_error($koneksi);
    }
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
    <title>Sign up</title>
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
            <div class="card border-light card-body text-white px-5 pt-4 pb-0 mb-4">
                <div class="profile text-center mb-4 mt-0">
                    <img src="img/id.svg" style="height: 110px; width: auto;">
                </div>
                <form action="" method="POST">
                    <div class="username px-2">
                        <label for="username" class="form-label mb-0">Username:</label>
                        <input type="text" name="username" id=username class="form-control mb-4" placeholder="Username">
                    </div>
                    <div class="password px-2">
                        <label for="password" class="form-label mb-0">Password:</label>
                        <input type="password" name="password" id="password" class="form-control mb-4" placeholder="Password">
                    </div>
                    <div class="confirm px-2">
                        <label for="confirm" class="form-label mb-0">Confirm password:</label>
                        <input type="password" name="confirm" id="confirm" class="form-control mb-5" placeholder="Confirm password">
                    </div>
                    <div class="btn-reg text-center px-0">
                        <button type="submit" name="signup" class="btn px-4 py-2 fw-bold">SIGN UP</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>