<?php
session_start();
if( !isset($_SESSION['login'])) {
 header("location: ../login.php");
 exit;
}

require '../config/config.php';

$userid = $_SESSION['user_id'];

if( isset($_POST['tambah_foto'])){
    if(tambah_foto($_POST) > 0){
        echo "<script>
        alert('anda berhasil menambahkan foto');
        document.location.href = 'index.php';
        </script>";
    }else{
       echo mysqli_error($conn);
    }
}

include'../template/bagian_atas.php';
include'../template/nav.php';
?>
    <div class="d-flex justify-content-center" style="margin-top: 80px;">
    <div class="row d-flex align-items-center">
    <div class="card">
    <h1>Tambah Foto</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="userid" value="<?php echo $userid ?>">
        <div class="mb-3">
            <label class="form-label" for="judul_foto">Judul Foto</label>
            <input class="form-control" type="text" name="judul_foto">
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="deskripsi_foto">Deskripsi Foto</label>
            <textarea class="form-control" name="deskripsi_foto" id="" cols="5" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="foto">Masukan Foto</label>
            <input class="form-control" type="file" name="foto">
        </div>

        <p>
            <label>Plih Album</label>
            <select name="id_album" id="album">
                <?php
             $result = mysqli_query($conn, "SELECT * FROM album WHERE user_id = '$userid'");
             while($data = mysqli_fetch_array($result)) {
                ?>
                <option value="<?= $data['album_id'] ?>"><?php echo $data['nama_album'] ?></option>
                <?php
             }
                ?>
            </select>
        </p>
        <p>
            <button type="submit" name="tambah_foto" class="btn btn-primary btn-sm">Tambah</button>
        </p>
    </form>
</div>
</div>
</div>
<?php include'../template/bagian_bawah.php'; ?>