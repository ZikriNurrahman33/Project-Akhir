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

        $id_film=input($_POST["id_film"]);
        $judul=input($_POST["judul"]);
        $genre=input($_POST["genre"]);
        $rating=input($_POST["rating"]);
        $produksi=input($_POST["produksi"]);
        $distributor=input($_POST["distributor"]);
        $durasi=input($_POST["durasi"]);
        $country=input($_POST["country"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into film (id_film,judul,genre,rating,produksi,distributor,durasi,country) values
		('$id_film','$judul','$genre','$rating','$produksi','$distributor','$durasi','$country')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>ID Film:</label>
            <input type="text" name="id_film" class="form-control" placeholder="Masukan ID Film" required/>
        </div>
        <div class="form-group">
            <label>Judul:</label>
            <input type="text" name="judul" class="form-control" placeholder="Masukan Judul film" required />

        </div>
        <div class="form-group">
            <label>Genre:</label>
            <input type="text" name="genre" class="form-control" placeholder="Masukan Genre" required/>

        </div>
        <div class="form-group">
            <label>Rating:</label>
            <input type="text" name="rating" class="form-control" placeholder="Masukan rating" required/>

        </div>
        <div class="form-group">
            <label>Produksi:</label>
            <input type="text" name="produksi" class="form-control" placeholder="Masukan Produksi" required/>
        </div>
        <div class="form-group">
            <label>Distributor:</label>
            <input type="text" name="distributor" class="form-control" placeholder="Masukan Distributor" required/>
        </div>
        <div class="form-group">
            <label>Durasi:</label>
            <input type="text" name="durasi" class="form-control" placeholder="Masukan Durasi" required/>
        </div>
        <div class="form-group">
            <label>Country:</label>
            <input type="text" name="country" class="form-control" placeholder="Masukan Country" required/>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>