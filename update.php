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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_film
    if (isset($_GET['id_film'])) {
        $id_film=input($_GET["id_film"]);

        $sql="select * from film where id_film=$id_film";
        $hasil=mysqli_query($kon,$sql) or die("Query error : " . mysqli_error($kon));
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_film=htmlspecialchars($_POST["id_film"]);
        $judul=input($_POST["judul"]);
        $genre=input($_POST["genre"]);
        $rating=input($_POST["rating"]);
        $produksi=input($_POST["produksi"]);
        $distributor=input($_POST["distributor"]);
        $durasi=input($_POST["durasi"]);
        $country=input($_POST["country"]);

        //Query update data pada tabel anggota
        $sql="update film set
			judul='$judul',
			genre='$genre',
			rating='$rating',
			produksi='$produksi',
			distributor='$distributor',
            durasi='$durasi',
            country='$country'
			where id_film=$id_film";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Judul:</label>
            <input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" placeholder="Masukan Judul" required />

        </div>
        <div class="form-group">
            <label>Genre:</label>
            <input type="text" name="genre" class="form-control" value="<?php echo $data['genre']; ?>" placeholder="Masukan Genre" required/>

        </div>
        <div class="form-group">
            <label>Rating:</label>
            <input type="text" name="rating" class="form-control" value="<?php echo $data['rating']; ?>" placeholder="Masukan Rating"required/>
        </div>
        <div class="form-group">
            <label>Produksi:</label>
            <input type="text" name="produksi" class="form-control" value="<?php echo $data['produksi']; ?>" placeholder="Masukan Produksi" required/>
        </div>
        <div class="form-group">
            <label>Distributor:</label>
            <input type="text" name="distributor" class="form-control" value="<?php echo $data['distributor']; ?>" placeholder="Masukan distributor" required/>
        </div>
        <div>
            <label>Durasi:</label>
            <input type="text" name="durasi" class="form-control" value="<?php echo $data['durasi']; ?>" placeholder="Masukan Durasi" required/>
        </div>
        <div>
            <label>Country:</label>
            <input type="text" name="country" class="form-control" value="<?php echo $data['country']; ?>" placeholder="Masukan Country" required/>
        </div>

        <input type="hidden" name="id_film" value="<?php echo $data['id_film']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>