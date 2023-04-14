<!DOCTYPE html>
<html>
<head>
	<title>Aplicació</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
			background-color: #f1f1f1;
		}
		
		header {
			background-color: #333;
			color: #fff;
			padding: 20px;
		}
		
		nav {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		
		nav a {
			color: #fff;
			text-decoration: none;
			font-size: 18px;
			margin-right: 20px;
		}
		
		nav a:hover{
			color:orange;
		}
		
		h1 {
			font-size: 36px;
			margin: 40px 0 20px 0;
			text-align: center;
		}
		
		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
			margin-top:80px;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
		}
	</style>
</head>
<body>
	<header>
		<nav>
			<a href="visualitzar.php">Visualitzar les dades d'un usuari</a>
			<a href="afegir.php">Afegir usuari</a>
			<a href="esborrar.php">Esborrar usuari</a>
			<a href="modificar.php">Modificar usuari</a>
			<a href="index.php">Torna a la pàgina inicial</a>
		</nav>
	</header>
	<div class="container">
		<h1>Benvinguts a l'aplicació de base de dades amb LDAP de xaarsa</h1>
		<p>Aquesta aplicació us permet gestionar els usuaris d'un servidor LDAP de manera senzilla i eficaç.</p>
		<p>Per començar, seleccioneu una de les opcions del menú superior.</p>
	</div>
</body>
</html>