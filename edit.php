<?php
    require_once "koneksi.php";
    if(isset($_GET["id"]))
    {
        $user_id = $_GET['id'];
        $stmt = $db->prepare("select * from user where id_user ='$user_id'");
        $stmt->execute();
        $user = $stmt->fetch();
    }
    if(isset($_POST['submit']))
    {
        $user_id = $_POST['id_user'];
        $stmt = $db->prepare("select * from user where id_user ='$user'");
        $stmt->execute();
        $user = $stmt->fetch();
      
    try
     {
        $params = [
       'nama' => $_POST['nama'],
       'alamat' =>$_POST['alamat'],
       'telepon' =>$_POST['telepon'],
       'tmpt_lahir' =>$_POST['tmpt_lahir'],
       'tgl_lahir' =>$_POST['tgl_lahir'],
       'id_user' =>$_POST['id_user'],
          ];
        $stmt = $db->prepare("update user set nama=:nama,alamat=:alamat,telepon=:telepon,tmpt_lahir=:tmpt_lahir,tgl_lahir=:tgl_lahir where 
        id_user =:id_user");
        $stmt->execute($params);
        header("location: index.php");
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
?>

 <!DOCTYPE html>
  <html>
    <head>
    <meta charset = "utf-8">
    <title></title>
    </head>
    <body>
    <form action ="edit.php" method ="post" accept-charset ="utf-8">
        <input type ="hidden" name="id_user" value ="<?=$user['id_user']?>">
        <p>Nama</p>
        <input type ="text" name ="nama" id ="nama" value ="<?=$user['nama']?>">
        <p>Alamat</p>
        <input type ="text" name ="alamat" id ="alamat" value ="<?=$user['alamat']?>">
        <p>Telepon</p>
        <input type ="text" name ="telepon" id ="telepon" value ="<?=$user['telepon']?>">
        <p>Tempat Lahir</p>
        <input type ="text" name ="tmpt_lahir" id ="tmpt_lahir" value ="<?=$user['tmpt_lahir']?>">
        <p>Tanggal Lahir</p>
        <input type ="date" name ="tgl_lahir" id ="tgl_lahir" value ="<?=$user['tgl_lahir']?>">
        <br><br>
        <input type ="submit" name ="submit" value ="Simpan" id ="submit">
    </form> 
    </body>
</html>