<?
	$conn = @mysql_connect("sistema_coli.mysql.dbaas.com.br", "sistema_coli", "linera13579") or die ("Problemas na conex&atilde;o do sistema.");
$db = @mysql_select_db("sistema_coli", $conn) or die ("Problemas na conex&atilde;o");


	$sql_imovel = mysql_query("SELECT * FROM tabela_imovel");
	while($imovel = mysql_fetch_object($sql_imovel)){
		

$pieces = explode(",", $imovel->valor_condominio);
$valor_condominio = str_replace("." , "" , $pieces[0] ); // Primeiro tira os pontos

$id_imovel = $imovel->id_imovel;

	$sql_alterar = mysql_query("UPDATE tabela_imovel SET  valor_condominio='$valor_condominio' WHERE id_imovel ='$id_imovel' "); 	
	
	}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
