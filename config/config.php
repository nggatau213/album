<?php

$conn = mysqli_connect("localhost","root","","gallery");



function register($data){
    global $conn;

    $username = $data['username'];
    $password = $data['password'];
    $email = $data['email'];
    $nama_lengkap = $data['nama_lengkap'];
    $alamat = $data['alamat'];

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    //seleksi
    if(mysqli_fetch_assoc($result)) {
        echo "<script>alert('username sudah digunakan')</script>";
        return false;
    }

    //password hash
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','$email','$nama_lengkap','$alamat')");
    return mysqli_affected_rows($conn);
    
}



function buat_album($data){
    global $conn;
    $nama_album = $data['nama_album'];
    $deskripsi = $data['deskripsi'];
    $tanggal = date("Y-m-d");
    $user = $data['userid'];

    mysqli_query($conn, "INSERT INTO album VALUES('','$nama_album','$deskripsi','$tanggal','$user')");
    return mysqli_affected_rows($conn);

}



function upload() {
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];


    if ($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!!');
        </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('yang anda upload bukan gambar!!');
        </script>";
        return false;
    }

    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

    return $namaFileBaru;
}


function tambah_foto($data){
    global $conn;
    $judul_foto = $data['judul_foto'];
    $deskripsi_foto = $data['deskripsi_foto'];
    $tanggal = date("Y-m-d");
    $album = $data['id_album'];
    $user = $data['userid'];

    //foto
      // gambar
      $foto = upload();
      if( !$foto) {
          return false;
      }

    mysqli_query($conn, "INSERT INTO foto VALUES('','$judul_foto','$deskripsi_foto','$tanggal','$foto','$album','$user')");
    return mysqli_affected_rows($conn);
}



?>