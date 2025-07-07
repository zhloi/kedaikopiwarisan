<?php
    include("sambungan.php");
    include("jurujual_menu.php");

	$idpelanggan = $_POST["idpelanggan"];

	$sql = "select * from pelanggan where idpelanggan = '$idpelanggan'";

	$result = mysqli_query($sambungan, $sql);
	while($pelanggan = mysqli_fetch_array($result)) {
            $namapelanggan = $pelanggan["namapelanggan"];
            $katalaluan = $pelanggan["katalaluan"];
	}
?>

<link rel="stylesheet" href="asenarai.css">
<link rel="stylesheet" href="abutton.css">

<main>
    <table class="maklumat">
        <caption>MAKLUMAT PELANGGAN</caption>
        <tr>
            <th>Perkara</th>
            <th>Maklumat</th>
        </tr>
        <tr>
            <td class="maklumat">ID pelanggan</td>
            <td class="maklumat"><?php echo $idpelanggan; ?></td>
        </tr>
        <tr>
            <td class="maklumat">Nama</td>
            <td class="maklumat"><?php echo $namapelanggan; ?></td>
        </tr>
        <tr>
            <td class="maklumat">Kata Laluan</td>
            <td class="maklumat"><?php echo $katalaluan; ?></td>
        </tr>
    </table>
</main>