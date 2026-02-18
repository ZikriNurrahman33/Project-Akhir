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
    if (isset($_GET['id_transaksi'])) {
        $id_transaksi=htmlspecialchars($_GET["id_transaksi"]);

        $sql="delete from transaksi where id_transaksi='$id_transaksi' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:transaksi.php");

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
            <th>ID Transaksi</th>
            <th>ID Operator</th>
            <th>ID Jadwal</th>
            <th>ID Kursi</th>
            <th>Jumlah Dibayar</th>
            <th>Kembalian</th>
            <th>Created</th>
            
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from transaksi";
        include "menu.php";
        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["id_transaksi"]; ?></td>
                <td><?php echo $data["id_operator"];   ?></td>
                <td><?php echo $data["id_jadwal"];   ?></td>
                <td><?php echo $data["id_kursi"];   ?></td>
                <td><?php echo $data["jumlah_dibayar"];   ?></td>
                <td><?php echo $data["kembalian"];   ?></td>
                <td><?php echo $data["created_at"];   ?></td>
                
                <td>
                    <a href="update-transaksi.php?id_transaksi=<?php echo htmlspecialchars($data['id_transaksi']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_transaksi=<?php echo $data['id_transaksi']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create-transaksi.php" class="btn btn-primary" role="button">Tambah Data</a>

</div>
</body>
</html>