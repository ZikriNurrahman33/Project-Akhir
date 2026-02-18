<?php
    session_start();
    //panggil dahulu file koneksi.php :
    include "koneksi.php";

    //ekstrak method dari form login.php:
    extract($_POST);

    //panggil perintah sql untuk mencocokan username dan password dengan yang ada di database
    //mysql_query digunakan untuk mengirimkan perintah sql ke server
    //$con adalah nama variabel dari perintah mysqli_connect() pada file koneksi.php
    $sql = mysqli_query($kon,"SELECT * FROM login WHERE username='$user' and password='$pass'");

    //jika benar (terdapat record)
    if(mysqli_num_rows($sql)>0){
        //memanggil isi record dari tabel
        $row = mysqli_fetch_array($sql);
        
        echo "<script>alert('Selamat, Anda Berhasil Login Sebagai $row[data]. Welcome!');
        </script>";
        echo "<meta content='0; url=film.php' http-equiv='refresh'>";
    }
    //jika salah (jika tidak ada username dan password yang sama)
    else{
        echo "<script>alert('Anda Gagal Login! Silahkan Ulangi');</script>";
        echo "<meta content='0; url=index.php' http-equiv='refresh'>";
    }
?>