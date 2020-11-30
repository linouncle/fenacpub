<?

  session_start();
$conn = @mysql_connect("sistema_coli.mysql.dbaas.com.br", "sistema_coli", "linera13579") or die ("Problemas na conex&atilde;o do sistema.");
$db = @mysql_select_db("sistema_coli", $conn) or die ("Problemas na conex&atilde;o");


$id_imovel = $_GET['id_imovel']; 


	$sql_confere_usuario = mysql_query("SELECT * FROM tabela_favorito where id_imovel='$id_imovel' and id_usuario='$id_usuario'");
	$confere_usuario = mysql_fetch_object($sql_confere_usuario);
	
	if($confere_usuario ==""){
			$sql = mysql_query("INSERT INTO tabela_favorito VALUES ('', '".$id_imovel."', '".$id_usuario."')");	
	}



?>