<!DOCTYPE html>
<html>
<head>
	<title>Inscription à QRCharge</title>
	<link rel="stylesheet" type="text/css" href="login/css/misspassword.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
</head>
<body>
	<div class="container">
		<div class="login-content">
			<form action="misspassword.php" method="post">
    		<img src="login/img/undraw_forgot_password.svg">
				<h2>QRCharge</h2>
				<h3 class="subtitle_renew">Renouvelez votre mot de passe</h3>
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
           		<div class="input-div pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Confirm Password</h5>
           		    	<input type="password" class="input" name="confirmPassword" id="confirmPassword">
            	   </div>
								 <span><ion-icon src="login/img/eye.svg" class="lock_icon" aria-hidden="true" id="eye2" onclick="confirmtoggle()"></ion-icon></span>
            	</div>
							<a href="register.php" class="any_cmpt">Retour</a>
              <input type="submit" class="btn" value="Confirmation">
							<?php
							include('config/config.php');
							if (isset($_POST['username']) & isset($_POST['password']) & isset($_POST['confirmPassword'])) {
								if ($_POST['username']<>"" & $_POST['password']<>"" & $_POST['confirmPassword']<>"") {

									//On verifie les mots de passe sont identifique

									if ($_POST['password'] == $_POST['confirmPassword']) {

										//Si il le sont, on verifie si le username existe
										$sql = "SELECT * FROM users WHERE username = ?";
										$stmt = $mysqli->prepare($sql);
										$stmt->bind_param('s', $_POST['username']);
										$stmt->execute();
										$VerifAccount = $stmt->get_result()->fetch_assoc();

										//si le user existe alors on modifie le mot de passe
										if ($_POST['username'] == $VerifAccount["username"]) {
											$pwd = $_POST['password'];
											$pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
											$pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);

											$sql0 = "SET SQL_SAFE_UPDATES = 0" ;
											$sql = "UPDATE users SET password = ? WHERE username = ?";
											$sql2 = "SET SQL_SAFE_UPDATES = 1" ;
											//$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
											$statement0 = $mysqli->prepare($sql0);
											$stmt = $mysqli->prepare($sql);
											$statement2 = $mysqli->prepare($sql2);

											$stmt->bind_param('ss', $pwd_hashed, $_POST['username']);
											$statement0->execute();
											$account = $stmt->execute();
											$statement2->execute();

											if ($account == true) {
												echo nl2br("<h3>Votre mot de passe à bien été modifié! \r\n vous pouvez vous reconnecter </h3>");
											}
											else {
												echo "<h3>Erreur interne lors de la modification de votre mot de passe !</h3>";
											}
										}
										else {
											echo "<h3>Le nom d'utilisateur que vous avez renseigné, n'existe pas</h3>";
										}
									}
									else {
										echo "<h3>Les mots de passe ne sont pas identifique</h3>";
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
