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
	        margin-bottom: 20px;
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
    	
    	<form action="modificar.php" method="POST">
    	<h2>Formulari per modificar usuaris</h2>
    			User id: <input required type="text" name="uid"><br>
    			Unitat organitzativa: <input required type="text" name="unorg"><br>
    			
  <label>
    <input checked type="radio" name="atribut" value="uidNumber">
    uidNumber
  </label><br>
  <label>
    <input type="radio" name="atribut" value="gidNumber">
    gidNumber
  </label><br>
  <label>
    <input type="radio" name="atribut" value="homeDirectory">
    Directori personal
  </label><br>
  <label>
    <input type="radio" name="atribut" value="loginShell">
    Shell
  </label><br>
  <label>
    <input type="radio" name="atribut" value="cn">
    cn
  </label><br>
  <label>
    <input type="radio" name="atribut" value="sn">
    sn
  </label><br>
  <label>
    <input type="radio" name="atribut" value="givenName">
    givenName
  </label><br>
  <label>
    <input type="radio" name="atribut" value="postalAddress">
    PostalAdress
  </label><br>
  <label>
    <input type="radio" name="atribut" value="mobile">
    mobile
  </label><br>
  <label>
    <input type="radio" name="atribut" value="telephoneNumber">
    telephoneNumber
  </label><br>
  <label>
    <input type="radio" name="atribut" value="title">
    title
  </label><br>
  <label>
    <input type="radio" name="atribut" value="description">
    description
  </label><br>
  <input type="text" name="nou_contingut">
    			<input type="submit" value="Modificar usuari"/>
    			<input type="reset" value="Netejar formulari"/>
    			<p><a href="menu.php">Torna al menú</a></p>
  </form>
    	<?php 
    	if($_POST['uid'] && $_POST['unorg'] && $_POST['nou_contingut']){
    	    # Atribut a modificar --> Número d'idenficador d'usuari
    	    #
    	    $atribut=$_POST['atribut']; # El número identificador d'usuar té el nom d'atribut uidNumber
    	    $nou_contingut= $_POST['nou_contingut'];
    	    #
    	    # Entrada a modificar
    	    #
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
    	    #
    	    # Modificant l'entrada
    	    #
    	    $ldap = new Ldap($opcions);
    	    $ldap->bind();
    	    $entrada = $ldap->getEntry($dn);
    	    if ($entrada){
    	        Attribute::setAttribute($entrada,$atribut,$nou_contingut);
    	        $ldap->update($dn, $entrada);
    	        echo "Atribut ".$atribut. " ha sigut modificat";
    	    } else echo "<p><b>Aquesta entrada no existeix</b></p><br><br>";
    	}
    	
    	?>
    	</body>
</html>