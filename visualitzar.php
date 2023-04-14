<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Ldap;

ini_set('display_errors',0);
?>
<html>
    <head>
        <title>
        	MOSTRANT DADES D'USUARIS DE LA BASE DE DADES LDAP
        </title>
        <style>
body {
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.6;
			color: #333;
			background-color: #f9f9f9;
			margin: 0;
			padding: 0;
		}
		
		
		form {
			margin-top:30px;
			margin-bottom: 20px;
			background-color: #fff;
			padding: 20px;
			border: 1px solid #ddd;
			border-radius: 5px;
			box-shadow: 0 2px 5px rgba(0,0,0,0.1);
			max-width: 600px;
			margin: 20 auto auto auto;
		}
		
		input[type="text"] {
			display: block;
			width: 100%;
			padding: 8px;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
			margin-bottom: 10px;
			font-size: 16px;
		}
		
		form input[type="text"],
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
		
		table {
			border-collapse: collapse;
			width: 100%;
			max-width: 600px;
			margin: 0 auto;
			margin-top: 20px;
			background-color: #fff;
			border: 1px solid #ddd;
			border-radius: 5px;
			box-shadow: 0 2px 5px rgba(0,0,0,0.1);
			margin-bottom:20px;
		}
		
		th,
		td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		
		th {
			background-color: #f2f2f2;
			font-weight: bold;
		}
		
p {
	text-align:center;
	margin-top:15px;
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

        </style>
    </head>
    	<body>
    		
    		<form action="visualitzar.php" method="GET">
    		<h2>Formulari de selecció d'usuari</h2>
    			Unitat organitzativa: <input type="text" name="ou"><br>
    			Usuari: <input type="text" name="usr"><br>
    			<input type="submit" value="Visualitzar usuari"/>
    			<input type="reset" value="Netejar formulari"/>
    			<p><a href="menu.php">Torna al menú</a></p>
    		</form>
    		<?php 
    		if ($_GET['usr'] && $_GET['ou']){
    		    $domini = 'dc=fjeclot,dc=net';
    		    $opcions = [
    		        'host' => 'zend-xaarsa.fjeclot.net',
    		        'username' => "cn=admin,$domini",
    		        'password' => 'fjeclot',
    		        'bindRequiresDn' => true,
    		        'accountDomainName' => 'fjeclot.net',
    		        'baseDn' => 'dc=fjeclot,dc=net',
    		    ];
    		    $ldap = new Ldap($opcions);
    		    $ldap->bind();
    		    $entrada='uid='.$_GET['usr'].',ou='.$_GET['ou'].',dc=fjeclot,dc=net';
    		    $usuari=$ldap->getEntry($entrada);
    		    if(empty($usuari)){
    		        echo "<p>L'usuari que busques no existeix, torna a intentar-ho</p><br>";
    		    }else{
    		        echo "<p><b><u>".$usuari["dn"]."</b></u></p>";
    		        echo "<table>";
    		        foreach ($usuari as $atribut => $dada) {
    		            
    		            if ($atribut != "dn") echo "<tr><td>".$atribut.":</td><td>".$dada[0].'</td></tr>';
    		        }
    		        echo "</table>";
    		    }
    		    
    		}
 
    		?>
    		
    	</body>
</html>