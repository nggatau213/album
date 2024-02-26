<?php 
session_start();

if( isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require 'config/config.php';

if( isset($_POST['daftar'])){
    if(register($_POST) > 0){
        echo "<script>
        alert('anda berhasil mendaftar');
        document.location.href = 'login.php';
        </script>";
    }else{
       echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <br><br>
    <div class="product-card ">
    <div class="container col-xl-10"> 
    <div class="card">  
    <h1>Daftar</h1>
    <form action="" method="post">
    <div class="card-body">
        <div class="row mb-3">  
            <label class="col-sm-2 col-form-label " for="username">Username</label>
            <div class="col-sm-5">
            <input class="form-control" type="text" name="username" autocomplete="off" required="required"/>
        </div>
        </div>
        
        <div class="row mb-3">  
            <label class="col-sm-2 col-form-label " for="password">Password</label>
            <div class="col-sm-5">
            <input class="form-control" type="text" name="password" autocomplete="off" required="required"/>
        </div>
        </div>

        <div class="row mb-3"> 
            <label class="col-sm-2 col-form-label " for="email">Email</label>
            <div class="col-sm-5">
            <input class="form-control" type="email" name="email" autocomplete="off" required="required"/>
        </div>
        </div>

        <div class="row mb-3"> 
            <label class="col-sm-2 col-form-label " for="nama_lengkap">Nama Lengkap</label>
            <div class="col-sm-5">
            <input class="form-control" type="text" name="nama_lengkap" autocomplete="off" required="required"/>
        </div>
        </div>

        <div class="row mb-3"> 
            <label class="col-sm-2 col-form-label " for="alamat">Alamat</label>
            <div class="col-sm-5">
            <input class="form-control" type="text" name="alamat" autocomplete="off" required="required"/>
        </div>
        </div>

        <label>
             <button class="btn btn-success" type="submit" name="daftar">Daftar</button>
        </label>
        </div>
        </div>
 
    </form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>