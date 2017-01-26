<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
</head>
<body>
    <a href ="create.php">Tambah</a>
    <br><br>
    <table border ="2" width ="100%" cellpadding ="3" cellspacing ="3">
        <tr>
           
    	    <th>Nama</th>
    	    <th>Alamat</th>
    	    <th>Telepon</th>
    	    <th>Tempat Lahir</th>
    	    <th>Tanggal Lahir</th>
            <th>email</th>
    	    <th>Opsi</th>

        </tr>

        <?php
            $query ="SELECT * FROM user";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $data=$stmt->fetchAll(PDO::FETCH_BOTH);
            foreach($data as $user)
            {
        ?>
        <tr>
        <td><?=$user['nama']?></td>
        <td><?=$user['alamat']?></td>
        <td><?=$user['telepon']?></td>
        <td><?=$user['tmpt_lahir']?></td>
        <td><?=$user['tgl_lahir']?></td>
        <td><?=$user['email']?></td>
        </td>
        <td>
        <a href ="hapus.php?aksi=hapus&id=<?=$user['id_user']?>">Hapus</a>
        <a href ="edit.php?id=<?=$user['id_user']?>">Edit</a>
        </td>
        </tr>
       <?php
            }
        ?>
    </table>
</body>
</html>