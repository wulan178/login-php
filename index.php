<?php

session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit; 
}

include "koneksi.php";
include "./index/koneksi.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./index/style.css">
    <title>Data Mahasiswa</title>
</head>
<body>
    <div class="container-fluid px-4 pt-4 pb-5 mb-5">
        <div class="row mx-auto text-center">
            <h2 class="mb-5 fw-bolder">DATA MAHASISWA STMIK IKMI CIREBON</h2>

            <!-- Kolom Pencarian -->
            <form action="pencarian.php" method="GET" class="row text-start mb-4">
                <div class="col-lg-3 col-md-6 col-sm-6 py-auto" style="display: flex;height: 30px;">
                    <input type="text" name="cari" class="form-control" placeholder="Cari data mahasiswa">
                    <button type="submit" value="Cari" class="btn btn-cari">Cari</button>
                </div>
                <div class="col-lg-9 col-md-6 col-sm-6"></div>
            </form>


            <!-- Tabel Data Mahasiswa-->
            <div class="col-lg-12">
                <div class="card shadow card-data">
                    <div class="card-header text-white fs-5 fw-bold py-2 title-data">DATA MAHASISWA</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr class="th-data">
                                    <th scope="col">NO.</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">PRODI</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql2   = "SELECT * FROM data_mahasiswa order by id desc";
                                $q2     = mysqli_query($koneksi, $sql2);
                                $urutan = 1;

                                while ($r2 = mysqli_fetch_array($q2)) {
                                    $id     = $r2['id'];
                                    $nim    = $r2['nim'];
                                    $nama   = $r2['nama'];
                                    $prodi  = $r2['prodi'];
                                    $email  = $r2['email'];
                                ?>

                                    <tr>
                                        <th scope="row" style="font-size: 15px;"><?php echo $urutan++ ?></th>
                                        <td scope="row" style="font-size: 15px;"><?php echo $nim ?></td>
                                        <td scope="row" style="font-size: 15px;"><?php echo $nama ?></td>
                                        <td scope="row" style="font-size: 15px;"><?php echo $prodi ?></td>
                                        <td scope="row" style="font-size: 15px;"><?php echo $email ?></td>
                                        <td scope="row" >
                                            <a href="index.php?op=edit&id=<?php echo $id ?>">
                                                <button type="button" class="btn btn-info text-white py-0 pb-1 mb-2"><small>Edit</small></button>
                                            </a>
                                            <a href="index.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Anda yakin ingin menghapus data?')">
                                                <button type="button" class="btn btn-danger text-white py-0 pb-1"><small>Hapus</small></button>
                                            </a>
                                        </td>
                                    </tr>
                                    
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <a href="logout.php" class="btn btn-warning px-3 mt-4 py-2 fw-bold">LOG OUT</a>
            </div>
        </div>
    </div>
</body>
</html>