<?php
    session_start();

    if(isset($_POST['submit'])){
        if(($_POST['username'] == $_SESSION['username']) && ($_POST['password'] == $_SESSION['password'])){
            $_SESSION['success'] = "Success Login";
            header("location:home.php");
        }
        else if(($_POST['username'] == "") || ($_POST['password'] == "")){
            $_SESSION['failed'] = "'Username' dan 'Password' tidak boleh kosong";
            header("location:login.php");
        }
        else{
            $_SESSION['failed'] = "Maaf Anda gagal Login, pastikan 'Username' dan 'Password' sesuai";
            header("location:login.php");
        }
    }

?>