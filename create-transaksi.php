<!DOCTYPE html>
<html>
<head>
    <title>Tiket Bioskop</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";
    
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_transaksi=input($_POST["id_transaksi"]);
        $id_operator=input($_POST["id_operator"]);
        $id_jadwal=input($_POST["id_jadwal"]);
        $id_kursi=input($_POST["id_kursi"]);
        $jumlah_dibayar=input($_POST["jumlah_dibayar"]);
        $kembalian=input($_POST["kembalian"]);
        $created_at=input($_POST["created_at"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into transaksi (id_transaksi,id_operator,id_jadwal,id_kursi,jumlah_dibayar,kembalian,created_at) values
		('$id_transaksi','$id_operator','$id_jadwal','$id_kursi','$jumlah_dibayar','$kembalian','$created_at')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:transaksi.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>ID Transaksi:</label>
            <input type="text" name="id_transaksi" class="form-control" placeholder="Masukan ID Transaksi" required/>
        </div>
        <div class="form-group">
            <label>ID Operator:</label>
            <input type="text" name="id_operator" class="form-control" placeholder="Masukan ID Operator" required />

        </div>
        <div class="form-group">
            <label>ID Jadwal:</label>
            <input type="text" name="id_jadwal" class="form-control" placeholder="Masukan ID Jadwal" required/>
        </div>
        <div class="form-group">
            <label>ID Kursi:</label>
            <input type="text" name="id_kursi" class="form-control" placeholder="Masukan ID Kursi" required/>
        </div>
        <div class="form-group">
            <label>Jumlah Dibayar:</label>
            <input type="text" name="jumlah_dibayar" class="form-control" placeholder="Masukan Jumlah Yang Dibayarkan" required/>
        </div>
        <div class="form-group">
            <label>Kembalian:</label>
            <input type="text" name="kembalian" class="form-control" placeholder="Masukan Kembalian" required/>
        </div>
        <div class="form-group">
            <label>Created:</label>
            <input type="text" name="created_at" class="form-control" placeholder="Masukan Tanggal Dibuat" required/>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>