<?php

    include("config.php");

    // kalau tidak ada id di query string
    if( !isset($_GET['id']) ){
        header('Location: list-siswa.php');
    }

    //ambil id dari query string
    $id = $_GET['id'];

    // buat query untuk ambil data dari database
    $sql = "SELECT * FROM calon_siswa WHERE id=$id";
    $query = mysqli_query($db, $sql);
    $siswa = mysqli_fetch_assoc($query);

    // jika data yang di-edit tidak ditemukan
    if( mysqli_num_rows($query) < 1 ){
        die("data tidak ditemukan...");
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Formulir Edit Siswa | SMK Coding</title>
    </head>

    <body>
        <div class="container">
            
            <h3>Formulir Edit Siswa</h3>

            <form action="proses-edit.php" method="POST" class="login-email">

                <fieldset>

                    <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

                    <label for="nama">Nama: </label>
                    <div class="input-group">
                        <input class="input" type="text" name="nama" placeholder="nama lengkap" value="<?php echo $siswa['nama'] ?>" />
                    </div>

                    <label for="alamat">Alamat: </label>
                    <div class="input-group">
                        <textarea name="alamat" class="input"><?php echo $siswa['alamat'] ?></textarea>
                    </div>

                    <label for="jenis_kelamin">Jenis Kelamin: </label>
                    <div class="input-group">
                    <?php $jk = $siswa['jenis_kelamin']; ?>
                        <ul>
                            <li><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked": "" ?>> Laki-laki</li>
                            <li><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked": "" ?>> Perempuan</li>
                        </ul>
                    </div>

                    <label for="agama">Agama: </label>
                    <div class="input-group">
                        <?php $agama = $siswa['agama']; ?>
                        <select name="agama" class="input">
                            <option <?php echo ($agama == 'Islam') ? "selected": "" ?>>Islam</option>
                            <option <?php echo ($agama == 'Kristen') ? "selected": "" ?>>Kristen</option>
                            <option <?php echo ($agama == 'Hindu') ? "selected": "" ?>>Hindu</option>
                            <option <?php echo ($agama == 'Budha') ? "selected": "" ?>>Budha</option>
                            <option <?php echo ($agama == 'Atheis') ? "selected": "" ?>>Atheis</option>
                        </select>
                    </div>

                    <label for="sekolah_asal">Sekolah Asal: </label>
                    <div class="input-group">
                    <input class="input" type="text" name="sekolah_asal" placeholder="nama sekolah" value="<?php echo $siswa['sekolah_asal'] ?>" />
                    </div>

                    <div class="submit">
                    <input type="submit" value="Simpan" name="simpan" class="btn"/>
                    </div>

                </fieldset>


            </form>
        </div>
    </body>

        <style>
        body {
            width: 100%;
            min-height: 100vh;
            background: linear-gradient(rgba(194, 103, 103, 0.5), rgba(58, 32, 127, 0.5)), url(images/bg5.jpg);
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        fieldset{
            padding: 15px;
            border-radius: 20px;
            box-shadow: 0 0 5px rgba(0,0,0,.3);
        }
        .container{
        width: 500px;
        min-height: 200px;
        background: #FFF;
        border-radius: 20px;
        box-shadow: 0 0 5px rgba(0,0,0,.3);
        padding: 40px 30px;
        position: relative;
        margin: 100px auto;
        text-align: center;
        }        
        .container .login-email .input-group {
        width: 100%;
        padding: 40px;
        height: 10px;
        margin-bottom: 20px;
        position: relative;
        left: -20px;
        }
        h3{
            position: relative;
            margin-bottom: 20px;
            margin-top: -20px;
            padding:10px;
            text-align: center;
            font-size: 2rem;
        }
        li{
            position: relative;
            display: inline-block;
            padding: 5px;
        }
        ul{
            position: relative;
            top: -40px;
            left: 30%;
            padding:10px;
            list-style: none;
            width: 120px;
            min-height: 40px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 5px rgba(0,0,0,.3);
            align: center;
        }
        .input{
            border-radius: 20px;
            padding: 7px;
            width: 60%;
            position: relative;
            bottom: 10px;
            left: -15px;
            top: -10px;
        }
        label{
        position: relative;
        font-size: 20px;
        color: #000;
        top: 10px;
        }

        .submit{
        text-align: center;
        margin-bottom: 15px;
        }
        .submit .btn{
        width: 80%;
        padding: 15px 20px;
        text-align: center;
        border: none;
        background: #a29bfe;
        outline: none;
        border-radius: 250px;
        font-size: 1rem;
        color: #FFF;
        cursor: pointer;
        transition: .3s;
        }
        .submit .btn:hover {
        transform: translateY(-5px);
        background: #4e4c57;
        }
    </style>

</html>