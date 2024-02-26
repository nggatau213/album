<?php 
include 'config.php';

$id = $_GET['foto_id'];
mysql_query("DELETE FROM `foto` WHERE `foto`.`foto_id` = '$id'")or die(mysql_error());
 
header("location:index.php?pesan=hapus");
?>

