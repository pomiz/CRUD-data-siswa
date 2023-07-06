<?php 

    include("config.php"); 

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pendaftaran Siswa Baru | SMK Coding</title>
    </head>

    <body>
        <div class="container">
            <h3>Siswa yang sudah mendaftar</h3>

            <div class="tambah">
                <a href="form-daftar.php">[+] Tambah Baru</a>
            </div>

            <br>
            <div class="tbl">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Sekolah Asal</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "SELECT * FROM calon_siswa";
                        $query = mysqli_query($db, $sql);

                        while($siswa = mysqli_fetch_array($query)){
                            echo "<tr>";

                            echo "<td>".$siswa['id']."</td>";
                            echo "<td>".$siswa['nama']."</td>";
                            echo "<td>".$siswa['alamat']."</td>";
                            echo "<td>".$siswa['jenis_kelamin']."</td>";
                            echo "<td>".$siswa['agama']."</td>";
                            echo "<td>".$siswa['sekolah_asal']."</td>";

                            echo "<td>";
                            echo "<a href='form-edit.php?id=".$siswa['id']."'>Edit</a> / ";
                            echo "<a href='hapus.php?id=".$siswa['id']."'>Hapus</a>";
                            echo "</td>";

                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            
            <p>Total: <?php echo mysqli_num_rows($query) ?></p>

            <a href="berhasil_login.php">kembali</a>
        </div>
    </body>

    <style>
        body {
            width: 100%;
            min-height: 100vh;
            background: linear-gradient(rgba(194, 103, 103, 0.5), rgba(58, 32, 127, 0.5)), url(images/bg5.jpg);
            background-position: center;
            background-size: cover;
            justify-content: center;
            align-items: center;
            display: flex;
        }
        .container{
            width: 700px;
            min-height: 100px;
            background: #FFF;
            border-radius: 20px;
            box-shadow: 0 0 5px rgba(0,0,0,.3);
            padding: 40px 30px;
            position: relative;
            margin: 100px auto;
            text-align: center;
        }    
        a{
            text-decoration: none;
            color: #765bf0;
            font-size: 20px;
        }  
        h3{
            color: #000;
            font-family: 'poppin';
            font-weight: 400;
            font-size: 32px;
        }
        .tambah{
            top: -20px;
            position: relative;
        }
        table {
            position: relative;
            border-collapse: collapse;
        }
        td, th {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</html>