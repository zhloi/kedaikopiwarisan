<?php
include("sambungan.php");
include("pelanggan_menu.php");

$loginFailed = false;

if (isset($_POST["submit"])) {
    $userid = $_POST["userid"];
    $katalaluan = $_POST["katalaluan"];

    // Check pelanggan
    $sql = "SELECT * FROM pelanggan WHERE idpelanggan = '$userid' AND katalaluan = '$katalaluan'";
    $result = mysqli_query($sambungan, $sql);
    if (mysqli_num_rows($result) == 1) {
        $pelanggan = mysqli_fetch_array($result);
        $_SESSION["idpelanggan"] = $pelanggan["idpelanggan"];
        $_SESSION["nama"] = $pelanggan["namapelanggan"];
        $_SESSION["status"] = "pelanggan";
        header("Location: index.php");
        exit();
    }

    // Check jurujual
    $sql = "SELECT * FROM jurujual WHERE idjurujual = '$userid' AND katalaluan = '$katalaluan'";
    $result = mysqli_query($sambungan, $sql);
    if (mysqli_num_rows($result) == 1) {
        $jurujual = mysqli_fetch_array($result);
        $_SESSION["idpelanggan"] = $jurujual["idjurujual"];
        $_SESSION["nama"] = $jurujual["namajurujual"];
        $_SESSION["status"] = "jurujual";
        header("Location: jurujual_senarai.php");
        exit();
    }

    // If neither matched
    $loginFailed = true;
}
?>

<link rel="stylesheet" href="abutton.css">
<link rel="stylesheet" href="aborang.css">

<body>
<h3>LOG MASUK</h3>
<form action="login.php" method="post">
    <table>
<tr>
  <td style="width: 450px; padding: 5px;">
    <div style="position: relative; width: 100%; max-width: 450px; margin: 0 auto;">
      <img src="imej/user.png" style="position: absolute; left: 8px; top: 50%; transform: translateY(-50%); width: 24px; height: 24px; pointer-events: none;">
      <input 
        type="text" 
        name="userid" 
        placeholder="idpelanggan" 
        required 
        style="padding-left: 40px; width: 100%; height: 35px; font-size: 16px; box-sizing: border-box;">
    </div>
  </td>
</tr>

<tr>
  <td style="width: 450px; padding: 5px;">
    <div style="position: relative; width: 100%; max-width: 450px; margin: 0 auto;">
      <img src="imej/lock.png" style="position: absolute; left: 8px; top: 50%; transform: translateY(-50%); width: 24px; height: 24px; pointer-events: none;">
      <input 
        type="password" 
        name="katalaluan" 
        placeholder="katalaluan" 
        id="passwordInput" 
        required 
        style="padding-left: 40px; padding-right: 40px; width: 100%; height: 35px; font-size: 16px; box-sizing: border-box;">
      <img id="toggleIcon" src="imej/show.png" alt="Tunjuk Kata Laluan" style="cursor:pointer; position: absolute; right: 8px; top: 50%; transform: translateY(-50%); width: 24px; height: 24px;">
    </div>
  </td>
</tr>

    </table>
    <button class="login" type="submit" name="submit">Log Masuk</button>
    <button class="signup" type="button" onclick="window.location='signup.php'">Daftar Baru</button><br><br>
    Jika belum ada 'idpelanggan' klik Daftar Baru<br>
    Lupa ID Pelanggan? Click <a href="carian_pelanggan.php" style= color: white>Sini</a>!
</form>

<!-- Modal for login failure -->
<div id="customModal1" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal1()">&times;</span>
        <p>Salah ID atau katalaluan. Sila cuba lagi.</p>
    </div>
</div>

<script>
// Password toggle
document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('passwordInput');
    const toggleIcon = document.getElementById('toggleIcon');

    toggleIcon.addEventListener('click', () => {
        const isPassword = passwordInput.type === 'password';
        passwordInput.type = isPassword ? 'text' : 'password';
        toggleIcon.src = isPassword ? 'imej/hide.png' : 'imej/show.png';
        toggleIcon.alt = isPassword ? 'Sembunyi Kata Laluan' : 'Tunjuk Kata Laluan';
    });

    // Show modal if login failed
    <?php if ($loginFailed): ?>
        showLoginError();
    <?php endif; ?>
});

// Modal controls
function showLoginError() {
    document.getElementById("customModal1").style.display = "block";
}
function closeModal1() {
    document.getElementById("customModal1").style.display = "none";
}
window.onclick = function(event) {
    var modal = document.getElementById("customModal1");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
