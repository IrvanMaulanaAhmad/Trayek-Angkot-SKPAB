<?php
    session_start();
    include '../conn.php';

    if($_SESSION['auth'] != true){
        header("location:../auth/login.php");
    }

    $no = 1;

    $query = "SELECT * FROM angkot";
    $data = mysqli_query($conn, $query);
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
    <title>Dashboard | Trayek Angkot & SKPAB</title>
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
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">John Abraham </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
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
                        <table class="table table-hover">
                            <thead>
                                <tr colspan="7" scope="col"><a href="add.php" class="btn btn-primary"><i class="fas fa-plus"></i> Add Data</a></tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">No Kendaraan</th>
                                    <th scope="col">Jenis Kendaraan</th>
                                    <th scope="col">Pemilik</th>
                                    <th scope="col">Tanggal Masa Awal</th>
                                    <th scope="col">Tanggal Berlaku</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                while($result = mysqli_fetch_assoc($data)){ ?>
                                <tr>
                                    <td><?=$no?></td>
                                    <td><?=$result['no_kendaraan']?></td>
                                    <td><?=$result['jenis_kendaraan']?></td>
                                    <td><?=$result['pemilik']?></td>
                                    <td><?=date('d-m-Y', strtotime($result['tanggal_masa_awal']))?></td>
                                    <td><?=date('d-m-Y', strtotime($result['tanggal_berlaku']))?></td>
                                    <td>
                                        <a href="edit.php?id=<?=$result['id']?>" class="btn btn-success"><i class="fas fa-pencil-alt"></i> Edit</a>
                                        <a href="delete.php?id=<?=$result['id']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                    </td>
                                </tr>
                                <?php $no++; }
                            ?>
                            </tbody>
                        </table>
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