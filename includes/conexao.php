<?
	// Conex&atilde;o com o banco de dados fenac_teste.mysql.dbaas.com.br (187.45.196.184)
   // $conn = @mysql_connect("fenac_teste.mysql.dbaas.com.br", "fenac_teste", "linera13579") or die ("Problemas na conex&atilde;o do sistema.");
    $conn = @mysql_connect("187.45.196.184", "fenac_teste", "linera13579") or die ("Problemas na conex&atilde;o do sistema.");
    $db = @mysql_select_db("fenac_teste", $conn) or die ("Problemas na conex&atilde;o");

mysql_query("SET NAMES 'utf8'");
    mysql_query('SET character_set_connection=utf8');
    mysql_query('SET character_set_client=utf8');
    mysql_query('SET character_set_results=utf8');

/*

$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante

date_default_timezone_set('America/Sao_Paulo');

$data = date('Y-m-d'); // Salva a data e hora atual (formato MySQL)
$hora = date('H:i:s'); // Salva a data e hora atual (formato MySQL)

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


$sql = mysql_query("INSERT INTO tabela_log VALUES ('', '".$id_usuario."', '".$data."', '".$hora."', '".$ip."', '".$url."')");


		$sql_verifica_usuario = mysql_query("SELECT * FROM tabela_usuario where id_usuario='$id_usuario'");     
        $verifica_usuario = mysql_fetch_object($sql_verifica_usuario) ;
	
		///////////
		
		
	*/
		

?>