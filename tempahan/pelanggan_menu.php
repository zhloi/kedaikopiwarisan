<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<link rel="stylesheet" href="amenu.css">

<header id="pageHeader">
    <img class="logo" src="imej/logo_old.png">
    <img class="kelab" src="imej/namakedai.png">
</header>

<nav>
    <ul>
        <li>
            <a href="index.php"><b>MENU</b></a>
        </li>
    </ul>
    <ul>
        <li>
           <?php
               if (isset($_SESSION["idpelanggan"])) 
                   echo "<a href='tempahan_senarai.php'><b>TEMPAHAN</b></a>";
               else     
                   echo "<a href='javascript:papar();'><b>TEMPAHAN</b></a>";
            ?> 
        </li>
    </ul>
    <ul>
        <li>
           <?php
               if (isset($_SESSION["idpelanggan"])) 
                   echo "<a href='pelanggan_update_user.php'><b>PROFIL</b></a>";
               else     
                   echo "<a href='javascript:papar();'><b>PROFIL</b></a>";
            ?> 
        </li>
    </ul>
    <ul>
        <li>
           <?php
               if (isset($_SESSION["idpelanggan"])) 
                   echo "<a href='logout.php'><b>LOG KELUAR</b></a>";
               else     
                   echo "<a href='login.php'><b>LOG MASUK</b></a>";
            ?>   
        </li>
    </ul> 
    
    <?php
       if (isset($_SESSION["idpelanggan"])) {
          $idpelanggan = $_SESSION["idpelanggan"]; 
          $sql = "select * from pelanggan where idpelanggan = '$idpelanggan' "; 
          $result = mysqli_query($sambungan, $sql);
          $pelanggan = mysqli_fetch_array($result);   
          echo "<span class='welcome-message'>Selamat datang $pelanggan[namapelanggan]</span>";
       } 
    ?> 
</nav>


<body>
<div id="customModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <p>Sila log masuk untuk paparan halaman</p>
    </div>
</div>
</body>


<script>
    function papar() {
    document.getElementById("customModal").style.display = "block";
}

function closeModal() {
    document.getElementById("customModal").style.display = "none";
}

// Close the modal when the user clicks anywhere outside of the modal
window.onclick = function(event) {
    var modal = document.getElementById("customModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script>
  window.addEventListener("scroll", function () {
    const header = document.getElementById("pageHeader");
    const scrollY = window.scrollY;

    // You can tweak the range (0 to 150) to control when the fade happens
    let opacity = 1 - Math.min(scrollY / 150, 1);
    header.style.opacity = opacity;
  });
</script>