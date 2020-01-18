<?php
    session_start();
    include '../conn.php';

    if($_SESSION['auth'] != true){
        header("location:../auth/login.php");
    }

    $id = $_GET['id'];

    $query = "SELECT * FROM angkot WHERE id = '$id'";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);

    if(isset($_POST['submit'])){
        $no_kendaraan = $_POST['no_kendaraan'];
        $jenis_kendaraan = $_POST['jenis_kendaraan'];
        $pemilik = $_POST['pemilik'];
        $tgl_masa_awal = $_POST['tgl_masa_awal'];
        $tgl_berlaku = $_POST['tgl_berlaku'];

        $query = "UPDATE angkot SET no_kendaraan = '$no_kendaraan', jenis_kendaraan = '$jenis_kendaraan', pemilik = '$pemilik', tanggal_masa_awal = '$tgl_masa_awal', tanggal_berlaku = '$tgl_berlaku' WHERE id = '$id'";
        mysqli_query($conn, $query);
        header("location:index.php");
    }
?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../assets/assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="../assets/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../assets/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Edit Data | Trayek Angkot & SKPAB</title>
</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.php">Trayek Angkot & SKPAB</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- <div class="dashboard-wrapper"> -->
        <div class="">
            <br><br>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"></h5>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Nomor Kendaraan</label>
                                <input class="form-control" type="text" name="no_kendaraan" placeholder="nomor kendaraan" value="<?=$result['no_kendaraan']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kendaraan</label>
                                <input class="form-control" type="text" name="jenis_kendaraan" placeholder="jenis kendaraan" value="<?=$result['jenis_kendaraan']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Pemilik Kendaraan</label>
                                <input class="form-control" type="text" name="pemilik" placeholder="pemilik kendaraan" value="<?=$result['pemilik']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Masa Awal</label>
                                <input class="form-control" type="date" name="tgl_masa_awal" placeholder="Tanggal Masa Awal" value="<?=$result['tanggal_masa_awal']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Masa Berlaku</label>
                                <input class="form-control" type="date" name="tgl_berlaku" placeholder="Tanggal Masa Berlaku" value="<?=$result['tanggal_berlaku']?>" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="../assetsassets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="../assetsassets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../assetsassets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="../assetsassets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="../assetsassets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="../assetsassets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="../assetsassets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="../assetsassets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="../assetsassets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="../assetsassets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="../assetsassets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="../assetsassets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>