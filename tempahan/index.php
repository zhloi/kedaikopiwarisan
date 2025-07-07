<?php
    include("sambungan.php");
    include("pelanggan_menu.php");
    
    echo "<link rel='stylesheet' href='abutton.css'>";
    echo "<link rel='stylesheet' href='ascroll.css'>";
    echo "<link rel='stylesheet' href='aloader.css'>";


echo "
    <div id='loader-wrapper'>
        <div id='loader'>
            <div class='progress-bar'>
                <div class='progress-fill'></div>
            </div>
            <p id='loading-text'></p>
            <button id='skip-loader' style='margin-top: 20px; padding: 8px 16px; font-size: 14px; cursor: pointer;'>Skip</button>
        </div>
    </div>
";

    echo "<main class='menu'>";
    
    $sql = "select * from makanan";
    $result = mysqli_query($sambungan, $sql);

    if (isset($_SESSION["idpelanggan"])) {
        $idpelanggan = $_SESSION["idpelanggan"];
        while($makanan = mysqli_fetch_array($result)) {
        echo "<figure>
              <img class='home' src='imej/$makanan[gambar]'>
              <figcaption>
                <form method='post' action='tempahan_insert.php'>
                    Bilangan <input type='number' min='1' max='50' value='1' name='bilangan' class='styled-input'>
                    <input type=hidden name=idpelanggan value=$idpelanggan>
                    <input type=hidden name=idmakanan value=$makanan[idmakanan]>
                    <button class='tempah' type='submit' name='submit'>Tempah</button>
                </form>
              </figcaption>
            </figure>";
        }
    }
    else
        while ($makanan = mysqli_fetch_array($result)) {
            echo "<figure><img class='home' src='imej/$makanan[gambar]'></figure>";
        }
    echo "</main>";
?>
<script>
  function revealOnScroll() {
    const figures = document.querySelectorAll("figure");

    figures.forEach(figure => {
      const rect = figure.getBoundingClientRect();
      const windowHeight = window.innerHeight;
      if (rect.top < windowHeight - 100) {
        figure.classList.add("active");
      } else {
        figure.classList.remove("active");
      }
    });
  }

  window.addEventListener("scroll", revealOnScroll);
  window.addEventListener("load", revealOnScroll);
</script>

<script>
window.onload = function () {
  const loaderWrapper = document.getElementById('loader-wrapper');
  const progressFill = document.querySelector('.progress-fill');
  const loadingText = document.getElementById('loading-text');
  const messages = [
    'Menyelaraskan tekanan mesin espresso...',
    'Mengukus susu digital...',
    'Menghubungkan anda ke aroma kopi segar...',
    'Jangan risau... takkan ghost macam ex anda.',
    'Kejap je lagi... loading dengan penuh kasih sayang.'
  ];

  let width = 0;
  let messageIndex = 0;
  let progressInterval;
  let messageInterval;

  // Updates loading messages on fixed interval
  function startMessageLoop() {
    loadingText.textContent = messages[messageIndex];
    messageInterval = setInterval(() => {
      messageIndex = (messageIndex + 1) % messages.length;
      loadingText.textContent = messages[messageIndex];
    }, 2500);
  }

  // Simulates progress bar loading
  function simulateLoading() {
    let delay = 30;

    progressInterval = setInterval(() => {
      if (width >= 100) {
        clearInterval(progressInterval);
        clearInterval(messageInterval);
        loaderWrapper.style.display = 'none';
        document.body.style.overflow = 'auto';
        sessionStorage.setItem('loaderShown', 'true');
      } else {
        width += 0.5;
        progressFill.style.width = width + '%';
      }
    }, delay);
  }

  if (!sessionStorage.getItem('loaderShown')) {
    document.body.style.overflow = 'hidden';
    startMessageLoop();  // Start messages immediately
    simulateLoading();   // Start loading independently

    document.getElementById('skip-loader').addEventListener('click', () => {
      clearInterval(progressInterval);
      clearInterval(messageInterval);
      loaderWrapper.style.display = 'none';
      document.body.style.overflow = 'auto';
      sessionStorage.setItem('loaderShown', 'true');
    });
  } else {
    loaderWrapper.style.display = 'none';
    document.body.style.overflow = 'auto';
  }
};
</script>
