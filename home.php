<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            position: absolute;
            top     : 15%;
            left    : 10%;
            height  : 500px;
            width   : 80%;
        }

        .content {
            display         : flex;
            flex-direction  : column;
            align-items     : center;
            font-size       : 20pt;
            background-color: #cad1ff;
            height          : 100%;
            border          : black 1px solid;
            box-shadow      : rgba(0, 0, 0, 0.6) 0px 8px 16px -8px;
        }

        .header {
            width           : 100%;
            height          : 60px;
            display         : flex;
            flex-direction  : row;
            align-items     : center;
            justify-content : space-between;
            background-color: #f9ffca;
        }

        .title {
            margin-left: 20px;
        }

        .navbar a {
            text-decoration: none;
            margin         : 0px 20px;
            color          : black;
        }

        .navbar .active {
            text-decoration: underline;
        }

        .logout {
            margin-right: 20px;
        }

        .logout a{
            text-decoration: none;
            color          : black;
        }
        
        .main {
            height         : 70%;
            display        : flex;
            align-items    : center;
            flex-direction : row;
            justify-content: space-around;
        }

        .main b{
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['success']) != ""){
    ?>
        <script>
            alert("<?php echo $_SESSION['success'] ?>");
        </script>
    <?php
        }
        $_SESSION['success'] = null;
    ?>

    <div class="content">
        <div class="header">
            <div class="title">Aplikasi Pengelolaan Keuangan</div>
            <div class="navbar">
                <a href="" class="active">Home</a>
                <a href="profile.php">Profile</a>
            </div>

            <div class="logout"><a href="logout.php">Logout</a></div>
        </div>
        
        <div class="main">
            Halo <?php echo "<b>".$_SESSION['namaDepan']." ".$_SESSION['namaTengah']." ".$_SESSION['namaBelakang']."</b>"; ?>, Selamat datang di Aplikasi Pengelolaan Keuangan
        </div>
    </div>
</body>
</html>