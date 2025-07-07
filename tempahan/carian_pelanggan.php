<?php
    include("sambungan.php"); 
    include("pelanggan_menu.php");

if (isset($_POST['submit'])) {
    $namapelanggan = mysqli_real_escape_string($sambungan, $_POST['namapelanggan']);

    $sql = "SELECT idpelanggan, namapelanggan FROM pelanggan WHERE namapelanggan LIKE '%$namapelanggan%'";
    $result = mysqli_query($sambungan, $sql);

    if (mysqli_num_rows($result) > 0) {
        $message = "Pelanggan dijumpai:\n";
        while ($row = mysqli_fetch_assoc($result)) {
            $message .= "ID Pelanggan: " . $row['idpelanggan'] . " - Nama Pelanggan: " . $row['namapelanggan'] . "";
        }
    } else {
        $message = "Tiada pelanggan ditemui.";
    }

    // Escape for safe JavaScript output
    $safeMessage = json_encode($message); // Ensures proper escaping
    echo "<script>
        alert($safeMessage);
        window.location.href = 'carian_pelanggan.php'; // Redirect to original form page
    </script>";
}
?>


<link rel="stylesheet" href="abutton.css">
<link rel="stylesheet" href="aborang.css">
    
<h3 class="">Cari ID Pelanggan</h3>
<form class="" action="carian_pelanggan.php" method="post">
    <table style="width: 100%; max-width: 450px; margin: 0 auto;">
  <tr>
    <div style="position: relative; max-width: 450px; margin: 0 auto;">
  <input
    type="text"
    name="namapelanggan"
    placeholder="Nama Pelanggan"
    style="
      width: 100%;
      height: 35px;
      padding-left: 35px; /* space for icon */
      font-size: 16px;
      box-sizing: border-box;
    "
  >
  <img src="imej/search.png"
       alt="search"
       style="
         position: absolute;
         left: 8px;
         top: 50%;
         transform: translateY(-50%);
         width: 20px;
         height: 20px;
         pointer-events: none;
       "
  >
</div>
  </tr>
</table>
    <button class="cari" type="submit" name="submit">Cari</button>
</form>