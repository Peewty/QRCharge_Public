<!DOCTYPE html>
<html>
<head>
	<title>Connexion à QRCharge</title>
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
			<form action="register.php" method="post">
				<img src="login/img/avatar.svg">
				<h2 class="title">Connexion</h2>
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
							<a href="index.php" class="any_cmpt">Retour</a>
            	<a href="misspassword.php">Mot de passe oublié ?</a>
            	<input type="submit" class="btn" value="Login">
							<?php
								include('config/config.php');
								session_start();
								if ($_SERVER['REQUEST_METHOD'] === 'POST') {
									if($_POST['password']!='' and $_POST['username']!='')
									{
										$pwd = $_POST['password'];
										$username = $_POST['username'];
										$pwd_peppered = hash_hmac("sha256", $pwd, $pepper);

										$sql = "SELECT * FROM users  WHERE username = ? ";
										$stmt = $mysqli->prepare($sql);
										$stmt->bind_param('s', $_POST['username']);
										$stmt->execute();
										$pwd_hashed = $stmt->get_result()->fetch_assoc();
										//echo(gettype($pwd_hashed)); => For Debug

										if (password_verify($pwd_peppered, $pwd_hashed["password"])) {
												// echo $pwd_hashed["id"].'\n';
												$_SESSION['session_id'] = session_id();
												$_SESSION['iduse'] = $pwd_hashed["id"];
												$_SESSION['login_user'] = $pwd_hashed["username"];
												echo "<h3>Password matches</h3>";

												$filename = '/qrcode/'.$pwd_hashed["username"].$pwd_hashed["id"]; //A modifier pour etre en corélahion avec qrcode (glob)
												if (file_exists($filename)) {
													?>
													<script>
														location.replace("horodateur.php")
													</script>
													<?php
												}
												else {
													?>
													<script>
														location.replace("qrcode.php")
													</script>
													<?php
													}
										}
										else {
												echo "<h3>Password incorrect</h3>";
										}
									}
									else {
									?>
									<script>
										sleep(5000);
										location.replace("register.php")
									</script>
									<?php
										echo "<h3>Veuillez renseigner vos identifiant !</h3>";
									}
								}

							?>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="login/js/main.js"></script>
</body>
</html>
