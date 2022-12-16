<?php

$servername    = "localhost";
$user          = "root";
$password      = "";
$database      = "php_login";

$koneksi = mysqli_connect($servername,$user,$password,$database);
if (!$koneksi){
	  die("Koneksi gagal".mysqli_connect_error());
// } else {
//     echo "Koneksi berhasil";
}

function signup($data) {
    global $koneksi;

    $username   = strtolower(stripslashes($data["username"]));
    $password   = mysqli_real_escape_string($koneksi, $data["password"]);
    $confirm    = mysqli_real_escape_string($koneksi, $data["confirm"]);

    $query  = mysqli_query($koneksi, "SELECT username FROM db_users WHERE username = '$username'");
    
    if(mysqli_fetch_assoc($query)) {
        echo "<script> alert('Username already exists. Please enter another username.'); </script>";
        return false;
    }

    if($password !== $confirm) {
        echo "<script> alert('Incorrect password confirmation'); </script>";
        return false;
    }

    header('Location: login.php');

    $password   = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($koneksi, "INSERT INTO db_users VALUES('', '$username', '$password')");

    return mysqli_affected_rows($koneksi);

}

?>