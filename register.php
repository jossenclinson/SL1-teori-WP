<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            position   : absolute;
            top        : 15%;
            left       : 10%;
            height     : 500px;
            width      : 80%;
        }

        .content {
            display         : flex;
            flex-direction  : column;
            align-items     : center;
            background-color: #c2f0f7;
            height          : 100%;
            border          : black 1px solid;
            box-shadow      : rgba(0, 0, 0, 0.6) 0px 8px 16px -8px;
        }

        .content caption {
            margin   : 30px 0px;
            font-size: 26pt;
        }

        .content table {
            font-size: 16pt;
            border-spacing: 20px 1.5rem;
        }

        .content td {
            vertical-align: top;
        }

        .submitCancel {
            width          : 80%;
            display        : flex;
            flex-direction : row;
            justify-content: right;
        }

        .submitCancel a {
            text-decoration : none;
            color           : black;
            background-color: #fdd7ac;
        }

        .submitCancel input {
            background-color: #adf59f;
        }

        .submitCancel a,
        .submitCancel input {
            font-size : 16pt;
            border    : black 2px solid;
            margin    : 10px 20px;
            padding   : 5px 40px;
            box-shadow: rgba(0, 0, 0, 0.6) 0px 8px 16px -8px;
        }

        .submitCancel a:hover,
        .submitCancel input:hover {
            opacity: 0.7;
            cursor : pointer;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['failed']) != ""){
    ?>
            <script>
                alert("<?php echo $_SESSION['failed'] ?>");
            </script>
    <?php
        }
        $_SESSION['failed'] = null;
    ?>
    <form action="registerProses.php" method="post" class="content" enctype="multipart/form-data">
        <table class="forms">
            <caption>Register</caption>
            <tr>
                <td>Nama Depan</td>
                <td><input type="text" name="namaDepan"></td>
                <td>Nama Tengah</td>
                <td><input type="text" name="namaTengah"></td>
                <td>Nama Belakang</td>
                <td><input type="text" name="namaBelakang"></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td><input type="text" name="tempatLahir"></td>
                <td>Tgl Lahir</td>
                <td><input type="date" name="tglLahir"></td>
                <td>NIK</td>
                <td><input type="text" name="nik"></td>
            </tr>
            <tr>
                <td>Warga Negara</td>
                <td><input type="text" name="wargaNegara"></td>
                <td>Email</td>
                <td><input type="email" name="email"></td>
                <td>No HP</td>
                <td><input type="text" name="noHP"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" style="height: 60px"></td>
                <td>Kode Pos</td>
                <td><input type="text" name="kodePos"></td>
                <td>Foto Profil</td>
                <td><input type="file" name="fotoProfil" accept="image/*"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
                <td>Password 1</td>
                <td><input type="password" name="password1"></td>
                <td>Password 2</td>
                <td><input type="password" name="password2"></td>
            </tr>
        </table>
        <div class="submitCancel">
            <a href="welcome.php">Kembali</a>
            <input type="submit" name="submit" value="Register">
        </div>
    </form>
</body>
</html>