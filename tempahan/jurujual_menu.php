<?php 
include("keselamatan.php");  
?>

<link rel="stylesheet" href="amenu.css">

<header>
    <img class="logo" src="imej/logo_old.png">
    <img class="kelab" src="imej/namakedai.png">
</header>

<nav>
    <ul>
        <li>
            <a href="#"><b>JURUJUAL</b></a>
            <ul>
                <li><a href="jurujual_insert.php">Tambah</a></li>
                <li><a href="jurujual_senarai.php">Senarai</a></li>
            </ul>
        </li>
    </ul>
    <ul>
        <li>
            <a href="#"><b>PELANGGAN</b></a>
            <ul>
                <li><a href="pelanggan_insert.php">Tambah</a></li>
                <li><a href="pelanggan_carian.php">Carian</a></li>
                <li><a href="pelanggan_senarai.php">Senarai</a></li>
            </ul>
        </li>
    </ul>
    <ul>
        <li>
            <a href="#"><b>MAKANAN</b></a>
            <ul>
                <li><a href="makanan_insert.php">Tambah</a></li>
                <li><a href="makanan_senarai.php">Senarai</a></li>
            </ul>
        </li>
    </ul>
    <ul>
        <li>
            <a href="laporan_pilih.php"><b>LAPORAN</b></a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="import.php"><b>IMPORT</b></a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="logout.php"><b>LOG KELUAR</b></a>
        </li>
    </ul>
</nav>