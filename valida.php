<?php
// Conex&atilde;o com o banco de dados

$servername = "187.45.196.184";
$username = "fenac_teste";
$password = "linera13579";
$dbname = "fenac_teste";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$login = $_POST['login']; 
$senha = $_POST['senha']; 

	
$sql = "SELECT * FROM tabela_usuario where login='$login' and senha='$senha'";
$result = $conn->query($sql);
	
	

$user = $result->fetch_assoc() ;


if ($user == "")
{ 


header( "Location: erro.php" ) ;


	
}else{

	$id_usuario = $user["id_usuario"] ;
	
	//inicio uma Sessao (session e similar a uma gaveta movel)
	session_start();
	
	//gravo as informa��es das vari�veis dentro das sess�es
	$_SESSION['login']=$login;
	$_SESSION['id_usuario']=$id_usuario;


	echo $login;

	echo $_SESSION['login'];
	echo $_SESSION['id_usuario'];


	//gravo as informa��es das vari�veis dentro das sess�es
	
	//Pronto agora redirecione o usu�rio para a p�gina secreta
	
	//abre a p�gina secretaaaa
	//header ("Location:menu.php");
	

}
//exiba um alerta dizendo que a senha esta errada
?>

