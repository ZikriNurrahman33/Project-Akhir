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
    if (isset($_GET['id_transaksi'])) {
        $id_transaksi=input($_GET["id_transaksi"]);

        $sql="select * from transaksi where id_transaksi=$id_transaksi";
        $hasil=mysqli_query($kon,$sql) or die("Query error : " . mysqli_error($kon));
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_transaksi=htmlspecialchars($_POST["id_transaksi"]);
        $id_operator=input($_POST["id_operator"]);
        $id_jadwal=input($_POST["id_jadwal"]);
        $id_kursi=input($_POST["id_kursi"]);
        $jumlah_dibayar=input($_POST["jumlah_dibayar"]);
        $kembalian=input($_POST["kembalian"]);

        //Query update data pada tabel anggota
        $sql="update transaksi set
			id_transaksi='$id_transaksi',
			id_operator='$id_operator',
			id_jadwal='$id_jadwal',
			id_kursi='$id_kursi',
			jumlah_dibayar='$jumlah_dibayar',
            kembalian='$kembalian'
			where id_transaksi=$id_transaksi";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:transaksi.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>ID Transaksi:</label>
            <input type="text" name="id_transaksi" class="form-control" value="<?php echo $data['id_transaksi']; ?>" placeholder="Masukan ID Transaksi" required />

        </div>
        <div class="form-group">
            <label>ID Operator:</label>
            <input type="text" name="id_operator" class="form-control" value="<?php echo $data['id_operator']; ?>" placeholder="Masukan ID Operator" required/>

        </div>
        <div class="form-group">
            <label>ID Jadwal:</label>
            <input type="text" name="id_jadwal" class="form-control" value="<?php echo $data['id_jadwal']; ?>" placeholder="Masukan ID Jadwal"required/>
        </div>
        <div class="form-group">
            <label>ID Kursi:</label>
            <input type="text" name="id_kursi" class="form-control" value="<?php echo $data['id_kursi']; ?>" placeholder="Masukan Produksi" required/>
        </div>
        <div class="form-group">
            <label>Jumlah Dibayar:</label>
            <input type="text" name="jumlah_dibayar" class="form-control" value="<?php echo $data['jumlah_dibayar']; ?>" placeholder="Masukan Jumlah yang Dibayar" required/>
        </div>
        <div>
            <label>Kembalian:</label>
            <input type="text" name="kembalian" class="form-control" value="<?php echo $data['kembalian']; ?>" placeholder="Masukan Kembalian" required/>
        </div>

        <input type="hidden" name="id_transaksi" value="<?php echo $data['id_transaksi']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>