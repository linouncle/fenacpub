<?php
// Conex&atilde;o com o banco de dados
$conn = @mysql_connect("sistema_coli.mysql.dbaas.com.br", "sistema_coli", "linera13579") or die ("Problemas na conex&atilde;o do sistema.");
$db = @mysql_select_db("sistema_coli", $conn) or die ("Problemas na conex&atilde;o");






$login = $_POST['login']; 
$senha = $_POST['senha']; 

$sql = mysql_query("SELECT * FROM tabela_usuario where login='$login' and senha='$senha'");

$user = mysql_fetch_object($sql) ;



if ($user == "")
{ 


header( "Location: erro.php" ) ;


}else if($user->ativo=='1'){
	
	header( "Location: erro.php" ) ;

	
}else
{


//aqui vai entrar a novidade, antes de redirecionarmos
//vamos salvar algumas informações para utilizar depois

//primeiro eu dou o valor 1 para a variável $validacao

 	// Cria uma função que retorna o timestamp de uma data no formato DD/MM/AAAA
	function geraTimestamp($data) {
	$partes = explode('/', $data);
	return mktime(0, 0, 0, $partes[1], $partes[0], $partes[2]);
	}
	
	if($user->provisorio == "1"){
			$hoje_compara = date("d/m/Y");
			
			list ($dia, $mes, $ano) = split ('[/.-]', $user->data_termino);
			$provisorio_compara = $dia.'/'.$mes.'/'.$ano;
			
			$time_inicial = geraTimestamp($hoje_compara);
			$time_final = geraTimestamp($provisorio_compara);
			
			$diferenca = $time_final - $time_inicial; 
			$dias = (int)floor( $diferenca / (60 * 60 * 24));
	
				if($dias < 0 ){
					header( "Location: erro.php" ) ;
					$valida_provisorio = "1";
				}
	}
	
if($valida_provisorio != "1"){
	
	$id_usuario = $user->id_usuario ;
	
	
	
	//inicio uma Sessao (session e similar a uma gaveta movel)
	session_start();
	
	//gravo as informações das variáveis dentro das sessões
	$_SESSION['login']=$login;
	$_SESSION['id_usuario']=$id_usuario;
	
	//Pronto agora redirecione o usuário para a página secreta
	
	//abre a página secretaaaa
	header ("Location:menu.php");
	}

}
//exiba um alerta dizendo que a senha esta errada
?>

