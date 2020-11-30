<?
	// Conex&atilde;o com o banco de dados
$conn = @mysql_connect("localhost", "colima34_teste", "linera13579") or die ("Problemas na conex&atilde;o do sistema.");
$db = @mysql_select_db("colima34_teste", $conn) or die ("Problemas na conex&atilde;o");





$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante

date_default_timezone_set('America/Sao_Paulo');

$data = date('Y-m-d'); // Salva a data e hora atual (formato MySQL)
$hora = date('H:i:s'); // Salva a data e hora atual (formato MySQL)

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


$sql = mysql_query("INSERT INTO tabela_log VALUES ('', '".$id_usuario."', '".$data."', '".$hora."', '".$ip."', '".$url."')");


		$sql_verifica_usuario = mysql_query("SELECT * FROM tabela_usuario where id_usuario='$id_usuario'");     
        $verifica_usuario = mysql_fetch_object($sql_verifica_usuario) ;
	
		///////////
		
		if($verifica_usuario->remoto == 1){
			
		$sql_ip_vanessa = mysql_query("SELECT * FROM tabela_log where id_usuario='18' ORDER BY id_log DESC LIMIT 1");     
        $ip_vanessa = mysql_fetch_object($sql_ip_vanessa) ;
	
	
				if($ip_vanessa->ip != $ip){
					
					echo '<script type="text/javascript">
				   window.location = "http://www.colimaimoveis.com.br/sistema/erro.php?ip=sim"
			  </script>';
			  
				}
				
		}
		
		//////////
		if($verifica_usuario->hora_inicial !='00:00:00' or $verifica_usuario->hora_final !='00:00:00' ){
			
		
		if($verifica_usuario->hora_inicial > $hora or $verifica_usuario->hora_final < $hora){
			echo '<script type="text/javascript">
           window.location = "http://www.colimaimoveis.com.br/sistema/index.php"
      </script>';
		}
		
		}
		

?>