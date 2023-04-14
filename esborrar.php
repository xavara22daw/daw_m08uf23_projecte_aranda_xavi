<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Attribute;
use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);
?>
<html>
    <head>
    	<title>Aplicacion</title>
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

		
p {
	text-align:center;
}
a {
	margin: auto;
	font-weight:bold;
	text-decoration:none;
	color:black;
}

a:hover{
	color:orange;
}

form {
			max-width: 500px;
			margin: 0 auto;
	        margin-bottom: 30px;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
			margin-top: 100px;
			border-radius: 5px;
		}

		form input[type="text"],
		form input[type="number"],
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
    </style>
    </head>
    <body>
    	
    	<form action="esborrar.php" method="POST">
    	<h2>Formulari per esborrar usuaris</h2>
    			User id: <input required type="text" name="uid"><br>
    			Unitat organitzativa: <input required type="text" name="unorg"><br>
    			<input type="submit" value="Esborrar usuari"/>
    			<input type="reset" value="Netejar formulari"/>
    			<p><a href="menu.php">Torna al menú</a></p>
    	</form>
    	<?php 
    	if($_POST['uid'] && $_POST['unorg']){
    	    $uid = $_POST['uid'];
    	    $unorg = $_POST['unorg'];
    	    $dn = 'uid='.$uid.',ou='.$unorg.',dc=fjeclot,dc=net';
    	    #
    	    #Opcions de la connexió al servidor i base de dades LDAP
    	    $opcions = [
    	    'host' => 'zend-xaarsa.fjeclot.net',
    	    'username' => 'cn=admin,dc=fjeclot,dc=net',
    	    'password' => 'fjeclot',
    	    'bindRequiresDn' => true,
    	    'accountDomainName' => 'fjeclot.net',
    	    'baseDn' => 'dc=fjeclot,dc=net',
    	    ];
    	    $ldap = new Ldap($opcions);
    	    $ldap->bind();
    	    try{
    	        $ldap->delete($dn);
    	        echo "<p><b>Entrada esborrada</b></p><br>";
    	    } catch (Exception $e){
    	        echo "<p><b>Aquesta entrada no existeix</b></p><br>";
    	    }
    	}
    	
    	?>
    		
    </body>
</html>