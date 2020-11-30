<?
	// Conex&atilde;o com o banco de dados
$conn = @mysql_connect("colima.mysql.dbaas.com.br", "colima", "linera13579") or die ("Problemas na conex&atilde;o do sistema.");
$db = @mysql_select_db("colima", $conn) or die ("Problemas na conex&atilde;o");


?>