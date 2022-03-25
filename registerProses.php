<?php
    session_start();

    if(isset($_POST['submit'])){
        if($_POST['namaDepan'] != "" && $_POST['namaTengah'] != "" && $_POST['namaBelakang'] != "" && $_POST['tempatLahir'] != "" && $_POST['tglLahir'] != "" && $_POST['nik'] != "" && $_POST['wargaNegara'] != "" && $_POST['email'] != "" && $_POST['alamat'] != "" && $_POST['kodePos'] != "" && $_FILES['fotoProfil']['name'] != "" && $_POST['username'] != "" && $_POST['password1'] != "" && $_POST['password2'] != ""){
            $namaDepan = $_POST['namaDepan'];
            $namaTengah = $_POST['namaTengah'];
            $namaBelakang = $_POST['namaBelakang'];
            $tempatLahir = $_POST['tempatLahir'];
            $tglLahir = DateTime::createFromFormat("Y-m-d", $_POST['tglLahir']);
            $nik = $_POST['nik'];
            $wargaNegara = $_POST['wargaNegara'];
            $email = $_POST['email'];
            $noHP = $_POST['noHP'];
            $alamat = $_POST['alamat'];
            $kodePos = $_POST['kodePos'];
            $username = $_POST['username'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            
            $isTrue = false;
            if(strlen($namaDepan) < 3 || strlen($namaTengah) < 3 || strlen($namaBelakang) < 3){
                $_SESSION['failed'] = "Jumlah karakter 'Nama Depan / Tengah / Belakang' tidak boleh dibawah 3 karakter";
            }
            else if(strlen($tempatLahir) < 3){
                $_SESSION['failed'] = "Jumlah karakter 'Tempat Lahir' tidak boleh dibawah 3 karakter";
            }
            else if((2022 - $tglLahir->format("Y")) < 17){
                $_SESSION['failed'] = "'Umur' tidak boleh dibawah 17 tahun";
            }
            else if(!is_numeric($nik) || strlen($nik) != 16){
                $_SESSION['failed'] = "Panjang 'NIK' harus 16 digit dan berupa number only";
            }
            else if(strlen($wargaNegara) < 2){
                $_SESSION['failed'] = "Jumlah karakter 'Warga Negara' tidak boleh dibawah 2 karakter";
            }
            else if(!is_numeric($noHP) || (strlen($noHP) != 12 && strlen($noHP) != 13)){
                $_SESSION['failed'] = "Panjang 'No HP' harus 12 atau 13 digit dan berupa number only";
            }
            else if(strlen($alamat) < 6){
                $_SESSION['failed'] = "Jumlah karakter Alamat tidak boleh dibawah 6 karakter";
            }
            else if(!is_numeric($kodePos) || strlen($kodePos) != 5){
                $_SESSION['failed'] = "Panjang Kode Pos harus 5 digit dan berupa number only";
            }
            else if(strlen($username) < 6){
                $_SESSION['failed'] = "Jumlah karakter Username tidak boleh dibawah 6 karakter";
            }
            else if($password1 != $password2){
                $_SESSION['failed'] = "Password 1 dengan Password 2 tidak sesuai";
            }
            else{
                $_SESSION['namaDepan'] = $namaDepan;
                $_SESSION['namaTengah'] = $namaTengah;
                $_SESSION['namaBelakang'] = $namaBelakang;
                $_SESSION['tempatLahir'] = $tempatLahir;
                $_SESSION['tglLahir'] = $tglLahir;
                $_SESSION['nik'] = $nik;
                $_SESSION['wargaNegara'] = $wargaNegara;
                $_SESSION['email'] = $email;
                $_SESSION['noHP'] = $noHP;
                $_SESSION['alamat'] = $alamat;
                $_SESSION['kodePos'] = $kodePos;
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password1;
                $_SESSION['success'] = "Success Register Account";

                $_SESSION['fotoName'] = $_FILES['fotoProfil']['name'];
                $_SESSION['tempName'] = $_FILES['fotoProfil']['tmp_name'];
                $_SESSION['dirTujuan'] = "fotoProfil/";
                move_uploaded_file($_SESSION['tempName'], $_SESSION['dirTujuan'].$_SESSION['fotoName']);
                
                $isTrue = true;
            }

            if($isTrue)
                header("location:welcome.php");
            else
                header("location:register.php");
        }
        else{
            $_SESSION['failed'] = "Seluruh Field tidak boleh kosong";
            header("location:register.php");
        }
    }
?>