<?php
    $nama_database = "tempahan";
    
    $sambungan = mysqli_connect("localhost", "root", "", $nama_database);
    if ( !$sambungan) {
          die ("sambungan gagal");
    }
?>