<?
	// Conex&atilde;o com o banco de dados
$conn = @mysql_connect("sistema_coli.mysql.dbaas.com.br", "sistema_coli", "linera13579") or die ("Problemas na conex&atilde;o do sistema.");
$db = @mysql_select_db("sistema_coli", $conn) or die ("Problemas na conex&atilde;o");



?>