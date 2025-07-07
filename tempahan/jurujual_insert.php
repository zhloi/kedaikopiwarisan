<?php
     /* Program ini bertujuan untuk
        memasukkan jurujual yang baru
        pastikan idjurujual tidak sama
        semasa memasukkan data  */

    include("sambungan.php");
	include("jurujual_menu.php");

	if (isset($_POST["submit"])) {
		$idjurujual = $_POST["idjurujual"];
		$katalaluan = $_POST["katalaluan"];
		$namajurujual = $_POST["namajurujual"];
		
		$sql = "insert into jurujual values('$idjurujual', '$katalaluan', '$namajurujual')";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true)
			echo "<h4>Berjaya tambah</h4>";
		else
			echo "<h4>Ralat : $sql<br>".mysqli_error($sambungan)."</h4>";
	}
?>

<link rel="stylesheet" href="aborang.css">
<link rel="stylesheet" href="abutton.css">

<h3 class="panjang">BORANG TAMBAH JURUJUAL</h3>
<form class="panjang" action="jurujual_insert.php" method="post">
    <table>
        <tr>
            <td>ID Jurujual</td>
            <td><input required type="text" 
            name="idjurujual" placeholder="cth: J01"  
            pattern="[A-Z0-9]{3}" 
            oninvalid="this.setCustomValidity('Sila masukkan 3 aksara')" 
            oninput="this.setCustomValidity('')"
            <?php  
                       $sql = "SELECT * FROM jurujual ORDER BY idjurujual DESC LIMIT 1";
                       $result = mysqli_query($sambungan, $sql);
                       $bilrekod = mysqli_num_rows($result);
                       if ($bilrekod > 0) { 
                   		   $jurujual = mysqli_fetch_array($result);
                   		   $idjurujual = ++$jurujual["idjurujual"];
		              }
		              else
			             $idjurujual = "J01";
		              echo "value = '$idjurujual'";                    
                   
            ?>
            readonly></td>
        </tr>
        <tr>
            <td>Nama Jurujual</td>
            <td><input type="text" name="namajurujual" placeholder="Cth: Loi"></td>
        </tr>
        <tr>
            <td>Kata Laluan</td>
            <td><input type="text" name="katalaluan" placeholder="maksimum 8 aksara"></td>
        </tr>
    </table>
    <button class="tambah" type="submit" name="submit">Tambah</button>
</form>