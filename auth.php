<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Ldap;

ini_set('display_errors', 0);

?>
<html>
	<head>
		<title>
			AUTENTICACIÓ AMB LDAP 
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
		
div {
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
			margin-top:80px;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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
		</style>
	</head>
	<body>
<?php 
if ($_POST['cts'] && $_POST['adm']){
    $opcions = [
        'host' => 'zend-xaarsa.fjeclot.net',
        'username' => "cn=admin,dc=fjeclot,dc=net",
        'password' => 'fjeclot',
        'bindRequiresDn' => true,
        'accountDomainName' => 'fjeclot.net',
        'baseDn' => 'dc=fjeclot,dc=net',
    ];
    $ldap = new Ldap($opcions);
    $dn='cn='.$_POST['adm'].',dc=fjeclot,dc=net';
    $ctsnya=$_POST['cts'];
    try{
        $ldap->bind($dn,$ctsnya);
        header("location: menu.php");
    } catch (Exception $e){
        echo "<div>";
        echo "<h2>Contrasenya incorrecta</h2><br>";
        echo "<p>Torna a la pàgina de login i intenta-ho un altre cop.</p><br>";
        echo "<p><a href='index.php'>Torna a la pàgina inicial</a></p>";
        echo "</div>";
    }
}
?>	
	</body>
</html>