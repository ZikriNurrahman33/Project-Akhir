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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
    if (isset($_GET['id_jadwal'])) {
        $id_jadwal=input($_GET["id_jadwal"]);

        $sql="select * from jadwal where id_jadwal = $id_jadwal";
        $hasil=mysqli_query($kon,$sql) or die("Query error : " . mysqli_error($kon));
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_jadwal=htmlspecialchars($_POST["id_jadwal"]);
        $id_jadwal=input($_POST["id_jadwal"]);
        $hari=input($_POST["hari"]);
        $jam=input($_POST["jam"]);
        $harga=input($_POST["harga"]);
        $id_film=input($_POST["id_film"]);
        $id_teater=input($_POST["id_teater"]);

        //Query update data pada tabel anggota
        $sql="update jadwal set
			id_jadwal='$id_jadwal',
			hari='$hari',
			jam='$jam',
			harga='$harga',
			id_film='$id_film',
            id_teater='$id_teater'
			where id_jadwal=$id_jadwal";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index2.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>ID Jadwal:</label>
            <input type="text" name="id_jadwal" class="form-control" value="<?php echo $data['id_jadwal']; ?>" placeholder="Masukan ID Jadwal" required />

        </div>
        <div class="form-group">
            <label>Hari:</label>
            <input type="text" name="hari" class="form-control" value="<?php echo $data['hari']; ?>" placeholder="Masukan Hari" required/>

        </div>
        <div class="form-group">
            <label>Jam:</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $data['jam']; ?>" placeholder="Masukan Jam" required/>

        </div>
        <div class="form-group">
            <label>Harga:</label>
            <input type="text" name="harga" class="form-control" value="<?php echo $data['harga']; ?>" placeholder="Masukan Harga" required/>
        </div>
        <div class="form-group">
            <label>ID Film:</label>
            <input type="text" name="id_film" class="form-control" value="<?php echo $data['id_film']; ?>" placeholder="Masukan ID Film" required/>
        </div>
        <div>
            <label>ID Teater:</label>
            <input type="text" name="id_teater" class="form-control" value="<?php echo $data['id_teater']; ?>" placeholder="Masukan ID Teater" required/>
        </div>

        <input type="hidden" name="id_jadwal" value="<?php echo $data['id_jadwal']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>