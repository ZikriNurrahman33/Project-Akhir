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
    if (isset($_GET['id_kursi'])) {
        $id_kursi=input($_GET["id_kursi"]);

        $sql="select * from kursi where id_kursi = $id_kursi";
        $hasil=mysqli_query($kon,$sql) or die("Query error : " . mysqli_error($kon));
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_kursi=htmlspecialchars($_POST["id_kursi"]);
        $id_kursi=input($_POST["id_kursi"]);
        $nama=input($_POST["nama"]);
        $id_teater=input($_POST["id_teater"]);

        //Query update data pada tabel anggota
        $sql="update kursi set
			id_kursi='$id_kursi',
			nama='$nama',
			id_teater='$id_teater'
			where id_kursi=$id_kursi";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:kursi.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>ID Kursi:</label>
            <input type="text" name="id_kursi" class="form-control" value="<?php echo $data['id_kursi']; ?>" placeholder="Masukan ID Kursi" required />

        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Masukan Nama" required/>

        </div>
        <div class="form-group">
            <label>ID Teater:</label>
            <input type="text" name="id_teater" class="form-control" value="<?php echo $data['id_teater']; ?>" placeholder="Masukan ID Teater" required/>

        </div>

        <input type="hidden" name="id_kursi" value="<?php echo $data['id_kursi']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>