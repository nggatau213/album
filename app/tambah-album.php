<?php
session_start();
if( !isset($_SESSION['login'])) {
 header("location: ../login.php");
 exit;
}

require '../config/config.php';

$username = $_SESSION['username'];
$userid = $_SESSION['user_id'];

if( isset($_POST['buat_album'])){
    if(buat_album($_POST) > 0){
        echo "<script>
        alert('anda berhasil menambahkan album');
        document.location.href = 'index.php';
        </script>";
    }else{
       echo mysqli_error($conn);
    }
}
include'../template/bagian_atas.php';
include'../template/nav.php';
?>
    <div class="d-flex justify-content-center" style="height: 100vh;">
    <div class="row d-flex align-items-center">
    <div class="card">   
    <h1>Tambah Album</h1>
    <form action="" method="post">
        <input type="hidden" name="userid" value="<?php echo $userid ?>">

        <div class="mb-3">
            <label class="form-label" for="nama_album">Nama Album</label>
            <input class="form-control" type="text" name="nama_album">
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="deskripsi">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="" cols="30" rows="5"></textarea>
        </div>
        <p>
            <button type="submit" name="buat_album" class="btn btn-primary btn-sm">Tambah</button>
    </div>
    </div>
    </div>
    </form>
<?php include'../template/bagian_bawah.php'; ?>