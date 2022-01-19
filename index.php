<!DOCTYPE html>
<html>
<head>
	<title>Inscription à QRCharge</title>
	<link rel="stylesheet" type="text/css" href="login/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
</head>
<body>
	<img class="wave" src="login/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="login/img/undraw_electric_car.svg">
		</div>
		<div class="login-content">
			<form action="index.php" method="post">
				<img src="login/img/avatar.svg">
				<h3>Bienvenue</h3>
				<h2 class="title">Inscription</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
										<input type="text" class="input" name="username">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password" id="password">
            	   </div>
								 <span><ion-icon src="login/img/eye.svg" class="lock_icon" aria-hidden="true" id="eye" onclick="toggle()"></ion-icon></span>
            	</div>
							<a href="register.php" class="any_cmpt">Déjà un compte ?</a>
            	<input type="submit" class="btn" value="Inscription">
							<?php
							include('config/config.php');
							if (isset($_POST['password'])) {
								if ($_POST['password']<>"" & $_POST['username']<>"") {

									//On verifie si le username est deja utilise
									$sql = "SELECT username FROM users WHERE username = ?";
									$stmt = $mysqli->prepare($sql);
									$stmt->bind_param('s', $_POST['username']);
									$stmt->execute();
									$VerifAccount = $stmt->get_result()->fetch_assoc();

									//si le user existe alors on demande un nouveau user
									if ($_POST['username'] == $VerifAccount["username"]) {
										echo "<h3>Le nom d'utilisateur est déjà utilisé. Veuillez en choisir un nouveau s'il vous plaît !</h3>";
									}
									else {
									$pwd = $_POST['password'];
									$pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
									$pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);

									$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
									$stmt = $mysqli->prepare($sql);
									$stmt->bind_param('ss', $_POST['username'], $pwd_hashed);
									$account = $stmt->execute();

									if ($account == true) {
										echo "<h3>Votre compte à bien été créé !</h3>";
									}
									else {
										echo "Erreur interne lors de la creation du compte";
									}
								}
							}
							else {
									echo "<h3>Veuillez renseigner tout les identifiants demandés s'il vous plait !</h3>";
								}
							}
							?>
							</form>
						</div>
					</div>
					<script type="text/javascript" src="login/js/main.js"></script>
</body>
</html>
