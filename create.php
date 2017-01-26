<?php
require_once "koneksi.php";
$nama=isset($_POST['nama'])?$_POST['nama']:"";
$alamat=isset($_POST['alamat'])?$_POST['alamat']:"";
$telepon=isset($_POST['telepon'])?$_POST['telepon']:"";
$tmpt_lahir=isset($_POST['tmpt_lahir'])?$_POST['tmpt_lahir']:"";
$tgl_lahir=date("Y-m-d");
$submit=isset($_POST['submit'])?$_POST['submit']:"";
if ($submit=="Simpan")
{
    $query=$db->prepare("insert into user values('','$nama','$alamat','$telepon','$tmpt_lahir','$tgl_lahir')");
    $query->execute();
    echo"<script>alert('Data Tersimpan');location.href='index.php'</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title></title>
</head>
<body>
    <form action ="create.php" method ="post" accept-charset ="utf-8">
        <p>Nama</p>
        <input type ="text" name ="nama" id ="nama">
        <p>Alamat</p>
        <input type ="text" name ="alamat" id ="alamat">
        <p>Telepon</p>
        <input type ="text" name ="telepon" id ="telepon">
        <p>Tempat Lahir</p>
        <input type ="text" name ="tmpt_lahir" id ="tmpt_lahir">
        <p>Tanggal Lahir</p>
        <input type ="date" name ="tgl_lahir" id ="tgl_lahir">
        <p>email</p>
        <input type="text " name="email" id="email">
        <br><br>
        <input type ="submit" name ="submit" value ="Simpan" id ="submit">
    </form> 
</body>
</html>