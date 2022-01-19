<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="icon" href="/img/favicon.ico" type="image/x-icon">!-->
    <title>QRCharge</title>

    <link rel="stylesheet" href="../css/qrcode.css" />
  </head>
  <body>
    <?php
    include('../config/config.php');
    include ('../config/session.php');
    include('../phpqrcode/qrlib.php'); //On inclut la librairie au projet
    //include('phpqrcode/qrconfig.php');


    echo $_SESSION['login_user'];
    echo $_SESSION['iduse'];
    $lien=$url_root_dev.'/'.$url_chargeTime.'?id='.$_SESSION['iduse']; // Vous pouvez modifier le lien selon vos besoins
    QRcode::png($lien, 'img/TEST_QRCODE.png', QR_ECLEVEL_H, 4, 4); ?> <br> <?php // On crée notre QR Code
    //QRcode::png('Hello', 'qrcode/qrcode_canvas.png', QR_ECLEVEL_H)
    ?>
    <div class="content">
      <h1>
        <img src="img/TEST_QRCODE.png" alt="MyQRCode"/>
        <!-- <img src="qrcode/qrcode_canvas.png" alt="MyQRCode"/>!-->
      </h1>
      <a href="<?php echo $url_root_dev.'/'.$url_chargeTime.'?id=25' ?>"><?php echo $url_root_dev.'/'.$url_chargeTime.'?id=25'; ?></a></br>
      <a href="<?php echo $url_root_dev.'/'.$url_chargeTime.'?id=27' ?>"><?php echo $url_root_dev.'/'.$url_chargeTime.'?id=27'; ?></a></br>
      <a href="<?php echo $lien; ?>"><?php echo $lien; ?></a>
      <h2>Scannez-moi pour savoir le temps de recharge restant</h2>
    </div>
      <a href="../horodateur.php">horodateur</a>
  </body>
</html>
