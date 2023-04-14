<html>
	<head>
		<title>
			Aplicacion
		</title>
		<style>
body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.5;
			margin: 0;
			padding: 0;
		}

		header {
			background-color: #333;
			color: #fff;
			padding: 10px;
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
		}

		nav {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		nav a {
			color: #fff;
			margin-right: 20px;
			text-decoration: none;
		}

		h1 {
			font-size: 36px;
			text-align: center;
			margin-top: 100px;
		}

		form {
			max-width: 500px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
			margin-top: 100px;
			border-radius: 5px;
			margin-bottom:100px;
		}

		form input[type="text"],
		form input[type="password"],
		form input[type="submit"],
		form input[type="reset"] {
			display: block;
			margin: 10px auto;
			padding: 10px;
			border-radius: 5px;
			border: none;
			background-color: #f2f2f2;
			width: 100%;
			max-width: 400px;
			font-size: 16px;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
		}

		form input[type="submit"] {
			background-color: #333;
			color: #fff;
			cursor: pointer;
			transition: background-color 0.2s ease;
		}

		form input[type="submit"]:hover {
			background-color: #444;
		}

		form input[type="reset"] {
			background-color: #999;
			color: #fff;
			cursor: pointer;
			transition: background-color 0.2s ease;
		}

		form input[type="reset"]:hover {
			background-color: #aaa;
		}

		h3 {
			text-align: center;
			margin-top: 10px;
		}
	</style>
	</head>
	<body>
		<h1>Benvingut a l'aplicació web d'accés de base de dades LDAP de xaarsa.</h1>
		<h3>Siusplau, inicia sessió amb un usuari administrador per accedir a les funcionalitats de l'aplicació</h3>
		<form action="auth.php" method="POST">
			Usuari amb permisos d'administració LDAP: <input type="text" name="adm"><br>
			Contrasenya de l'usuari: <input type="password" name="cts"><br>
			<input type="submit" value="Envia" />
			<input type="reset" value="Neteja" />
		</form>
	</body>
</html>