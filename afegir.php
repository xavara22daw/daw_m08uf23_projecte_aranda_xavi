<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Attribute;
use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);
?>
<html>
    <head>
    	<title>Aplicacion</title>
    </head>
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
    <body>
    	
    	<form action="afegir.php" method="POST">
    	<h2>Formulari per afegir usuaris</h2>
    			User id: <input required type="text" name="uid"><br>
    			Unitat organitzativa: <input required type="text" name="unorg"><br>
    			Número de id de l'usuari: <input required type="number" name="num_id"><br>
    			Número de id del grup: <input required type="number" name="grup"><br>
    			Directori personal: <input required type="text" name="dir_pers"><br>
    			Login shell: <input required type="text" name="sh"><br>
    			cn: <input required type="text" name="cn"><br>
    			sn: <input required type="text" name="sn"><br>
    			Nom: <input required type="text" name="nom"><br>
    			Mòbil: <input required type="text" name="mobil"><br>
    			Adressa: <input required type="text" name="adressa"><br>
    			Telèfon: <input required type="text" name="telefon"><br>
    			Títol: <input required type="text" name="titol"><br>
    			Descripció: <input required type="text" name="descripcio"><br>
    			<input type="submit" value="Afegir usuari"/>
    			<input type="reset" value="Netejar formulari"/>
    			<p><a href="menu.php">Torna al menú</a></p>
    		</form>
    		<?php 
    		if ($_POST['uid'] && $_POST['unorg'] && $_POST['num_id'] && $_POST['grup'] && $_POST['dir_pers'] && $_POST['sh'] && $_POST['cn'] && $_POST['sn'] && $_POST['nom'] && $_POST['mobil'] && $_POST['adressa'] && $_POST['telefon'] && $_POST['titol'] && $_POST['descripcio']){
    		    $uid = $_POST['uid'];
    		    $unorg = $_POST['unorg'];
    		    $num_id = $_POST['num_id'];
    		    $grup = $_POST['grup'];
    		    $dir_pers = $_POST['sh'] ;
    		    $sh = $_POST['dir_pers'] ;
    		    $cn = $_POST['cn'] ;
    		    $sn = $_POST['sn'];
    		    $nom = $_POST['nom'];
    		    $mobil = $_POST['mobil'];
    		    $adressa = $_POST['adressa'];
    		    $telefon = $_POST['telefon'];
    		    $titol = $_POST['titol'];
    		    $descripcio = $_POST['descripcio'];
    		    $objcl = array(
    		        'inetOrgPerson',
    		        'organizationalPerson',
    		        'person',
    		        'posixAccount',
    		        'shadowAccount',
    		        'top'
    		    );
    		    
    		    $domini = 'dc=fjeclot,dc=net';
    		    $opcions = [
    		        'host' => 'zend-xaarsa.fjeclot.net',
    		        'username' => "cn=admin,$domini",
    		        'password' => 'fjeclot',
    		        'bindRequiresDn' => true,
    		        'accountDomainName' => 'fjeclot.net',
    		        'baseDn' => 'dc=fjeclot,dc=net'
    		    ];
    		    $ldap = new Ldap($opcions);
    		    $ldap->bind();
    		    $nova_entrada = [];
    		    Attribute::setAttribute($nova_entrada, 'objectClass', $objcl);
    		    Attribute::setAttribute($nova_entrada, 'uid', $uid);
    		    Attribute::setAttribute($nova_entrada, 'uidNumber', $num_id);
    		    Attribute::setAttribute($nova_entrada, 'gidNumber', $grup);
    		    Attribute::setAttribute($nova_entrada, 'homeDirectory', $dir_pers);
    		    Attribute::setAttribute($nova_entrada, 'loginShell', $sh);
    		    Attribute::setAttribute($nova_entrada, 'cn', $cn);
    		    Attribute::setAttribute($nova_entrada, 'sn', $sn);
    		    Attribute::setAttribute($nova_entrada, 'givenName', $nom);
    		    Attribute::setAttribute($nova_entrada, 'mobile', $mobil);
    		    Attribute::setAttribute($nova_entrada, 'postalAddress', $adressa);
    		    Attribute::setAttribute($nova_entrada, 'telephoneNumber', $telefon);
    		    Attribute::setAttribute($nova_entrada, 'title', $titol);
    		    Attribute::setAttribute($nova_entrada, 'description', $descripcio);
    		    $dn = 'uid=' . $uid . ',ou=' . $unorg . ',dc=fjeclot,dc=net';
    		    if ($ldap->add($dn, $nova_entrada))
    		        echo "<p>Usuari creat correctament!</p>";
    		}
    		?>
    		
    </body>
</html>