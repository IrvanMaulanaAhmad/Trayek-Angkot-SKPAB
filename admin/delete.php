<?php
    session_start();
    include '../conn.php';

    if($_SESSION['auth'] != true){
        header("location:../auth/login.php");
    }

    $id = $_GET['id'];
    $query = "DELETE FROM angkot WHERE id = '$id'";
    mysqli_query($conn, $query);
    header("location:index.php");
?>