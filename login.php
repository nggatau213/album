<?php
session_start();

if( isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}
require 'config/config.php';

if ( isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if(mysqli_num_rows($result) === 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"]) ) {

            //set session
            $_SESSION["login"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $row["user_id"];

            header("location: app/index.php?pesan=login");
            exit;
        }
    }

    $error = true;
}

if( isset($error)){
  echo "<script> alert('Username / password anda salah!'); </script>";
 }
include'template/bagian_atas.php';
?>

    <div class="d-flex justify-content-center" style="height: 100vh;">
    <div class="row d-flex align-items-center">
    <div class="card">   
    <h1>Login</h1>
    <form action="" method="post">
            <div class="mb-3">
            <label class="form-label" for="username">Username</label>
            <input class="form-control" type="text" name="username">
            </div>

            <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input  class="form-control" type="password" name="password">
            </div>


            <label>
            <button class="btn btn-secondary" type="submit" name="login">Login</button>
            <a  class="btn btn-success" href="daftar.php" role="button">Daftar</a>
            </label>
    </form>
    </div>
    </div>
    </div>

<?php include'template/bagian_bawah.php'; ?>