<?php
    require_once "koneksi.php";
$aksi=isset($_GET['aksi'])?$_GET['aksi']:"";
if($aksi=="hapus")
{
    $id=isset($_GET['id'])?$_GET['id']:"";
    $query=$db->prepare("delete from user where id_user ='$id_user'");
    $query->execute();
    echo"<script>alert('Data Terhapus');location.href='index.php'</script>";
}
?>