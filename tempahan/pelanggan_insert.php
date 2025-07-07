<?php
	include("sambungan.php");
	include("jurujual_menu.php");

	if (isset($_POST["submit"])) {
		$idpelanggan = $_POST["idpelanggan"];
		$katalaluan = $_POST["katalaluan"];
		$namapelanggan = $_POST["namapelanggan"];

		$sql = "insert into pelanggan values('$idpelanggan', '$katalaluan', '$namapelanggan')";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true)
			echo "<h4>Berjaya tambah</h4>";
		else
			echo "<h4>Ralat : $sql<br>".mysqli_error($sambungan)."</h4>";
	}
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<main>

<h3 class="panjang">BORANG TAMBAH PELANGGAN</h3>
<form class="panjang" action="pelanggan_insert.php" method="post">
    <table>
        <tr>
            <td class="warna">ID Pelanggan</td>
            <td><input required type="text" 
            name="idpelanggan" placeholder="cth: P065"  
            pattern="[A-Z0-9]{4}" 
            oninvalid="this.setCustomValidity('Sila masukkan 4 aksara')" 
            oninput="this.setCustomValidity('')"
            <?php  
                       $sql = "SELECT * FROM pelanggan ORDER BY idpelanggan DESC LIMIT 1";
                       $result = mysqli_query($sambungan, $sql);
                       $bilrekod = mysqli_num_rows($result);
                       if ($bilrekod > 0) { 
                   		   $pelanggan = mysqli_fetch_array($result);
                   		   $idpelanggan = ++$pelanggan["idpelanggan"];
		              }
		              else
			             $idpelanggan = "P001";
		              echo "value = '$idpelanggan'";                    
                   
            ?>
            readonly>
            </td>
        </tr>
        <tr>
            <td class="warna">Nama Pelanggan</td>
            <td><input type="text" name="namapelanggan" placeholder="cth: Hajar"></td>
        </tr>    
        <tr>
            <td class="warna">Kata Laluan</td>
            <td><input type="text" name="katalaluan" placeholder="maksimum 8 aksara"></td>
        </tr>
    </table>
    <button class="tambah" type="submit" name="submit">Tambah</button>
</form>


</main>