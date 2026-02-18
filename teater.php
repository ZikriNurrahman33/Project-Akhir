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
    if (isset($_GET['id_teater'])) {
        $id_teater=htmlspecialchars($_GET["id_teater"]);

        $sql="delete from teater where id_teater='$id_teater' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:teater.php");

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
            <th>Nama</th>
            <th>Created At</th>
            <th>Updated At</th>
            
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from teater";
        include "menu.php";
        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["id_teater"]; ?></td>
                <td><?php echo $data["nama"];   ?></td>
                <td><?php echo $data["created_at"];   ?></td>
                <td><?php echo $data["updated_at"];   ?></td>
                
                <td>
                    <a href="update-teater.php?id_teater=<?php echo htmlspecialchars($data['id_teater']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_teater=<?php echo $data['id_teater']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create-teater.php" class="btn btn-primary" role="button">Tambah Data</a>

</div>
</body>
</html>