<?php
    require("konfigurasi.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Diri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <table border="1" align="center" style="text-align: center;">
        <tr>
            <th>Nama</th> 
            <th>NIM</th>
            <th>Fakultas</th>
            <th>Jenis Kelamin</th>
            <th>Gambar</th>
        </tr>
        <?php
            $kueri = $pdo -> prepare("SELECT * FROM tb_mahastudent");
            $kueri -> execute();
            while ($data = $kueri -> fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?php echo $data['nama'];?></td>
            <td><?php echo $data['nim'];?></td>
            <td><?php echo $data['fakultas'];?></td>
            <td><?php echo $data['gender'];?></td>
            <td><img src="<?php echo $data['gambar'];?>" width="25%"></td>
        </tr>
        <?php
            }
        ?>
    </table>
    <center>
    <a href="form.php">Tambah Data Mahastudent</a>
    </center>
</body>
</html>