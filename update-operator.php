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
    if (isset($_GET['id_operator'])) {
        $id_operator=input($_GET["id_operator"]);

        $sql="select * from operator where id_operator = $id_operator";
        $hasil=mysqli_query($kon,$sql) or die("Query error : " . mysqli_error($kon));
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_operator=htmlspecialchars($_POST["id_operator"]);
        $id_operator=input($_POST["id_operator"]);
        $nama=input($_POST["nama"]);
        $password=input($_POST["password"]);

        //Query update data pada tabel anggota
        $sql="update operator set
			id_operator='$id_operator',
			nama='$nama',
			password='$password'
			where id_operator=$id_operator";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:operator.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>ID operator:</label>
            <input type="text" name="id_operator" class="form-control" value="<?php echo $data['id_operator']; ?>" placeholder="Masukan ID Operator" required />

        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Masukan Nama" required/>

        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="text" name="password" class="form-control" value="<?php echo $data['password']; ?>" placeholder="Masukan ID Password" required/>

        </div>

        <input type="hidden" name="id_operator" value="<?php echo $data['id_operator']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>