<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/qrcode.css" />

    <script src="js/print.js"></script>
    <title>QRCharge</title>
  </head>
  <body>
    <?php
    include('config/config.php');
    include ('config/session.php');
    include('phpqrcode/qrlib.php'); //On inclut la librairie au projet
    //include('phpqrcode/qrconfig.php');

    //$lien=$url_root.'/'.$url_chargeTime; // Vous pouvez modifier le lien selon vos besoins
    $lien=$url_root.'/'.$url_chargeTime.'?id='.$_SESSION['iduse']; // Vous pouvez modifier le lien selon vos besoins
    $numqrcode = uniqid($_SESSION['iduse'],true);
    $verifqrcode = substr($numqrcode, 0, 2);

    $filename = "";
    $glob = glob("./qrcode/img/".$verifqrcode."*.png");

    if (empty($glob)) {
      //echo "le tableau est vide \n";
      $filename = QRcode::png($lien, 'qrcode/img/'.$numqrcode.'.png', QR_ECLEVEL_H, 4, 4); ?> <br> <?php // On crée notre QR Code
      ?>
      <p>Salut <?php echo $_SESSION['login_user']; ?><span style='font-size:25px;'>&#128075;</span></p>
      <div class="content" id="content_printable">
        <img src="<?php echo 'qrcode/img/'.$numqrcode.'.png' ?>" alt="MyQRCode">
      </div>
      <?php
    }
    else {
      foreach ($glob as $filename) {
        //echo "$filename size " . filesize($filename) . "\n";
      }
      ?>
      <p>Salut <?php echo $_SESSION['login_user']; ?><span style='font-size:25px;'>&#128075;</span></p>
      <div class="content" id="content_printable">
        <img src="<?php echo $filename ?>">
      </div>
      <?php
    }
    ?>
    <h2>Scannez-moi pour savoir le temps de recharge restant</h2>
    <input type="button" onclick="printDiv('content_printable')" value="Imprimer mon QRCharge" class="btn"/>

      <?php
      include('navbar.php');
      ?>

  </body>
</html>
