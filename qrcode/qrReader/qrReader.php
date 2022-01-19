<?php
  include('config.php');
  date_default_timezone_set('Europe/Paris');
  require __DIR__ . "/vendor/autoload.php";

  $qrcode = new Zxing\QrReader('qrcode/image-qrcode_H.png');
  $text = $qrcode->text(); //return decoded text from QR Code
  echo file_get_contents($text);
  ?>
<!--</br>
  <a href="http://qrcharge/horodateur.php" target="_blank">Opens On Another Tab</a>
