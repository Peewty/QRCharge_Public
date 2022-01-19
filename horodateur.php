<?php
include('config/config.php');
include('config/session.php');
date_default_timezone_set('Europe/Paris');
?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

      <title>Horodateur</title>
      <link rel="stylesheet" href="css/horodateur.css" />
    </head>
    <body>
      <div class="content">
          <form action="horodateur.php" method="post">
            <div class="forms">
              <label for="arrivalDate">Heure d'arrivé </label><input type="datetime" disabled="disabled" name="arrivalDate" value="<?php  echo date('d/m/Y H:i'); ?>" size="22"/><br />
              <label for="departureDate">Horaire de départ </label><input type="datetime-local" name="departureDate" value="" size="22"/><br />
              <input type="submit" class="btn" value="Valider"/>
            </div>
          </form>

       <?php
         if(isset($_POST['departureDate']))
         {
           $_POST['arrivalDate'] = date('Y-m-d H:i');
           $_POST['departureDate'] = preg_replace('/T+/', ' ',$_POST['departureDate']);
           if($_POST['arrivalDate']!='' and $_POST['departureDate']!='')
           {

               $diff_data = $_POST['arrivalDate'] < $_POST['departureDate'];
               if ($diff_data == 1)
               {
                 $sql = "INSERT INTO DCharge (departureDate, id_user) VALUES (?, ?)" ;
                 $statement = $mysqli->prepare($sql);
                 $statement->bind_param('si', $_POST['departureDate'], $_SESSION['iduse']);
                 $statement->execute();
                 ?>
                 <div class="forms">
                   <p class="p">Les données ont bien été enregistrées <span style='font-size:25px;'>&#128077;</span></p>
                 </div>
                 <?php
                // echo "Les données ont bien été enregistrées";
               }
               else {
                 ?>
                 <p class="p">la date de depart doit etre superieur a la date d'arrive !!!</p>
                 <?php
                 //echo "la date de depart doit etre superieur a la date d'arrive !!!";
               }
           }
           else {
             ?>
             <p class="p">Veuillez renseigner le champ date</p>
             <?php
             //echo "Veuillez renseigner le champ date";
           }
        }
          else
          {
          }
         ?>
         <!-- <div class="foot"><a href="<?php echo $url_qrcode ?>">Retour sur votre QRCharge</a></div> -->
       </div>
         <?php
         include('navbar.php');
         ?>
     </body>
</html>
