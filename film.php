<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
</head>
<body>
<div class="container">
    <br>
    <h4>Data Tiket Film Bioskop</h4>
<?php

    include "koneksi.php";

    //Cek apakah ada nilai dari method GET dengan nama id_anggota
    if (isset($_GET['id_film'])) {
        $id_film=htmlspecialchars($_GET["id_film"]);

        $sql="delete from film where id_film='$id_film' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Judul Film</th>
            <th>Genre</th>
            <th>Rating</th>
            <th>Produksi</th>
            <th>Distributor</th>
            <th>Durasi</th>
            <th>Country</th>
            
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from film";
        include "menu.php";
        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["id_film"]; ?></td>
                <td><?php echo $data["judul"];   ?></td>
                <td><?php echo $data["genre"];   ?></td>
                <td><?php echo $data["rating"];   ?></td>
                <td><?php echo $data["produksi"];   ?></td>
                <td><?php echo $data["distributor"];   ?></td>
                <td><?php echo $data["durasi"];   ?></td>
                <td><?php echo $data["country"];   ?></td>
                
                <td>
                    <a href="update.php?id_film=<?php echo htmlspecialchars($data['id_film']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_film=<?php echo $data['id_film']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>

</div>
</body>
</html>