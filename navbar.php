<?php include('config/config.php'); ?>
<link rel="stylesheet" href="css/nav.css" />
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<!-- <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->

<nav class="nav">
  <a href="profile.php" class="nav__link">
    <ion-icon src="img/person-outline.svg" class="nav__icon"></ion-icon>
    <span class="nav__icon">Profil</span>
  </a>
  <a href="qrcode.php" class="nav__link">
    <ion-icon src="img/qr-code-outline.svg"class="nav__icon"></ion-icon>
    <span class="nav__icon">My QRCharge</span>
  </a>
  <a href="horodateur.php" class="nav__link">
    <ion-icon src="img/hourglass-outline.svg"class="nav__icon"></ion-icon>
    <span class="nav__icon">Horodateur</span>
  </a>
  <a href="<?php echo($url_root_dev.'/'.$url_chargeTime.'?id='.$_SESSION['iduse']) ?>" class="nav__link">
    <ion-icon src="img/battery-charging-outline.svg"class="nav__icon"></ion-icon>
    <span class="nav__icon">Ma Charge</span>
  </a>
  <a href="logout.php" class="nav__link">
    <ion-icon src="img/settings-outline.svg"class="nav__icon"></ion-icon>
    <span class="nav__icon">Deconnexion</span>
  </a>
  <!-- <a href="setting.php" class="nav__link">
    <ion-icon src="img/settings-outline.svg"class="nav__icon"></ion-icon>
    <span class="nav__icon">Setting</span>
  </a> -->
</nav>
