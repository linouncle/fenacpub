<?php


//	Busca
$codigo = $_GET['codigo'];
$referencia_antiga = $_GET['referencia_antiga'];

$negociacao = $_GET['negociacao'];
$tipo = $_GET['tipo'];
$subtipo = $_GET['subtipo'];

$condominio = $_GET['condominio'];
$edificio = $_GET['edificio'];
$endereco=$_GET['endereco'];

$pieces_endereco = explode(" ", $endereco);


if($pieces_endereco[0]=="rua" or $pieces_endereco[0]=="avenida" or $pieces_endereco[0]=="alameda" or $pieces_endereco[0]=="Rua" or $pieces_endereco[0]=="Avenida" or $pieces_endereco[0]=="Alameda"){
$endereco = $pieces_endereco[1];	
	if($pieces_endereco[2]!=""){
		$endereco = $pieces_endereco[1].' '. $pieces_endereco[2];
	}
	if($pieces_endereco[3]!=""){
		$endereco = $pieces_endereco[1].' '. $pieces_endereco[2].' '. $pieces_endereco[3];
	}
}

//$endereco = utf8_encode($endereco);

$cidade=$_GET['cidade'];

$fotos=$_GET['fotos'];
$qualidade_fotos=$_GET['qualidade_fotos'];

$numero=$_GET['numero'];
$complemento=$_GET['complemento'];
$andar=$_GET['andar'];
$andar_maximo=$_GET['andar_maximo'];

if($andar_maximo!=""){
	$andar_maximo=$andar_maximo.'0';
}else{
	$andar_maximo='1000';
}

$valor_inicial = $_GET['valor_inicial'];
$pieces = explode(",", $valor_inicial);
$valor_inicial = str_replace("." , "" , $pieces[0] ); // Primeiro tira os pontos

$valor_final = $_GET['valor_final'];
$pieces = explode(",", $valor_final);
$valor_final = str_replace("." , "" , $pieces[0] ); // Primeiro tira os pontos


$valor_locacao_inicial = $_GET['valor_locacao_inicial'];
$pieces = explode(",", $valor_locacao_inicial);
$valor_locacao_inicial = str_replace("." , "" , $pieces[0] ); // Primeiro tira os pontos

$valor_locacao_final = $_GET['valor_locacao_final'];
$pieces = explode(",", $valor_locacao_final);
$valor_locacao_final = str_replace("." , "" , $pieces[0] ); // Primeiro tira os pontos


$dia_inicio = $_GET['dia_inicio'];
$mes_inicio = $_GET['mes_inicio'];
$ano_inicio = $_GET['ano_inicio'];

$data_inicial = $ano_inicio.'-'.$mes_inicio.'-'.$dia_inicio;

$dia_termino = $_GET['dia_termino'];
$mes_termino = $_GET['mes_termino'];
$ano_termino = $_GET['ano_termino'];

$data_final = $ano_termino.'-'.$mes_termino.'-'.$dia_termino;


$dia_inicio_check = $_GET['dia_inicio_check'];
$mes_inicio_check = $_GET['mes_inicio_check'];
$ano_inicio_check = $_GET['ano_inicio_check'];

$data_inicial_check = $ano_inicio_check.'-'.$mes_inicio_check.'-'.$dia_inicio_check;

$dia_termino_check = $_GET['dia_termino_check'];
$mes_termino_check = $_GET['mes_termino_check'];
$ano_termino_check = $_GET['ano_termino_check'];

$data_final_check = $ano_termino_check.'-'.$mes_termino_check.'-'.$dia_termino_check;


$dia_inicio_alteracao = $_GET['dia_inicio_alteracao'];
$mes_inicio_alteracao = $_GET['mes_inicio_alteracao'];
$ano_inicio_alteracao = $_GET['ano_inicio_alteracao'];

$data_inicial_alteracao = $ano_inicio_alteracao.'-'.$mes_inicio_alteracao.'-'.$dia_inicio_alteracao;

$dia_termino_alteracao = $_GET['dia_termino_alteracao'];
$mes_termino_alteracao = $_GET['mes_termino_alteracao'];
$ano_termino_alteracao = $_GET['ano_termino_alteracao'];

$data_final_alteracao = $ano_termino_alteracao.'-'.$mes_termino_alteracao.'-'.$dia_termino_alteracao;


$bairros = $_GET['bairros'];

	for($i=0; $i<sizeof($bairros); $i++){
  	$query .= ($i+1!=sizeof($bairros)) ? $bairros[$i]."," : $bairros[$i].")";
	
  	$sele_bairros = implode("','", $bairros);
	}


$proprietario = $_GET['proprietario'];
$corretor = $_GET['corretor'];
$id_corretor = $_GET['corretor'];
$indicador = $_GET['indicador'];




$area_total_minimo = $_GET['area_total_minimo'];
$area_total_maximo = $_GET['area_total_maximo'];
$area_util_minimo = $_GET['area_util_minimo'];
$area_util_maximo = $_GET['area_util_maximo'];

$habitese_minimo = $_GET['habitese_minimo'];
$habitese_maximo = $_GET['habitese_maximo'];


$iptu_inicial = $_GET['iptu_inicial'];
$pieces = explode(",", $iptu_inicial);
$iptu_inicial = str_replace("." , "" , $pieces[0] ); // Primeiro tira os pontos

$iptu_final = $_GET['iptu_final'];
$pieces = explode(",", $iptu_final);
$iptu_final = str_replace("." , "" , $pieces[0] ); // Primeiro tira os pontos

$condominio_inicial = $_GET['condominio_inicial'];
$pieces = explode(",", $condominio_inicial);
$condominio_inicial = str_replace("." , "" , $pieces[0] ); // Primeiro tira os pontos

$condominio_final = $_GET['condominio_final'];
$pieces = explode(",", $condominio_final);
$condominio_final = str_replace("." , "" , $pieces[0] ); // Primeiro tira os pontos

$metro_minimo = $_GET['metro_minimo'];
$pieces = explode(",", $metro_minimo);
$metro_minimo = str_replace("." , "" , $pieces[0] ); // Primeiro tira os pontos

$metro_maximo = $_GET['metro_maximo'];
$pieces = explode(",", $metro_maximo);
$metro_maximo = str_replace("." , "" , $pieces[0] ); // Primeiro tira os pontos

$quartos_minimo = $_GET['quartos_minimo'];
$quartos_maximo = $_GET['quartos_maximo'];
$suites_minimo = $_GET['suites_minimo'];
$suites_maximo = $_GET['suites_maximo'];
$vagas_minimo = $_GET['vagas_minimo'];
$vagas_maximo = $_GET['vagas_maximo'];
$site = $_GET['site'];
$lancamento = $_GET['lancamento'];
$placa = $_GET['placa'];
$ativo = $_GET['ativo'];
$permuta = $_GET['permuta'];

$portais = $_GET['portais'];

$descritivo = $_GET['descritivo'];

$caracteristicas = $_GET['caracteristicas'];

if($caracteristicas==""){
	$caracteristicas = $_GET['caracteristicas'];
	
	$caracteristicas = urldecode($caracteristicas) ;
	$caracteristicas = str_replace("'","",$caracteristicas);
	
}

if($caracteristicas==""){
	$caracteristicas_eou = $_GET['caracteristicas_eou'];
	
	$caracteristicas_eou = urldecode($caracteristicas_eou) ;	
}


if($caracteristicas!=""){
	
	$tem_caracteristicas=1;
	
		$caracteristicas = explode(',', $caracteristicas);
		
		if(sizeof($caracteristicas)>0){
			
			for($i=0; $i<sizeof($caracteristicas); $i++){
			$query .= ($i+1!=sizeof($caracteristicas)) ? $caracteristicas[$i]."," : $caracteristicas[$i].")";
		  
			$sele_caracteristicas = implode("','", $caracteristicas);
			
			}	
		}
		
		$sele_caracteristicas = str_replace("',' ","','",$sele_caracteristicas);
}



 $pagina=$_GET['pagina'];


 $filtro=$_GET['filtro'];
 
 if($filtro=="vazio"){
	$filtro=" "; 
 }
	
if($filtro==""){
	
	
	if($codigo!=""){
		$explodir = explode(",",$codigo);
		if($explodir[1]!=""){
			$filtro =" and id_imovel in ($codigo)";
		}else{
		$filtro =" and id_imovel='$codigo'";	
		}
		
	}
	
	if($referencia_antiga!=""){
		$filtro =" and referencia_antiga='$referencia_antiga'";	
	}
	
	
	
	if($edificio!=""){
		$filtro = $filtro. " and edificio LIKE _utf8  '%$edificio%' COLLATE utf8_unicode_ci";	
	}
	
	if($endereco!=""){
		$filtro = $filtro. " and endereco LIKE _utf8  '%$endereco%' COLLATE utf8_unicode_ci";	
	}
	
	if($bairros!=""){
		$filtro = $filtro. " and bairro IN ('$sele_bairros')";	
	}
	
	if($cidade!="0" and $cidade!=""){
		$filtro = $filtro. " and cidade = '$cidade'";	
	}
	
	
	if($condominio!=""){
		$filtro = $filtro. " and condominio  LIKE _utf8  '%$condominio%' COLLATE utf8_unicode_ci";	
	}
	
	if($numero!=""){
		$filtro = $filtro. " and numero='$numero'";	
	}
	
	if($complemento!=""){
		
		$andar=$andar.'0';
		$filtro = $filtro. " and complemento LIKE '%$complemento%'";		
	}
	
	if($andar!=""){	
		$filtro = $filtro. " and complemento BETWEEN $andar and $andar_maximo ";		
	}
	
		
	if($descritivo!=""){
		$filtro = $filtro. " and descricao LIKE _utf8 '%$descritivo%'  COLLATE utf8_unicode_ci";		
	}
	
	//valor compra
	if($valor_inicial!="" or $valor_final!=""){
		
		if($valor_inicial=="" ){
		$filtro = $filtro. " and valor BETWEEN '1' AND '$valor_final'";	
		
		}else if($valor_final=="" ){
		$filtro = $filtro. " and valor >= '$valor_inicial'";	
		
		}else{
		$filtro = $filtro. " and valor BETWEEN '$valor_inicial' AND '$valor_final'";	
		}
	}
	
	//valor locacao
	if($valor_locacao_inicial!="" or $valor_locacao_final!=""){
		
		if($valor_locacao_inicial=="" ){
		$filtro = $filtro. " and valor_locacao BETWEEN '1' AND '$valor_locacao_final'";
		
		}else if($valor_locacao_final=="" ){
		$filtro = $filtro. " and valor_locacao >= '$valor_locacao_inicial'";	
		
		}else{
		$filtro = $filtro. " and valor_locacao BETWEEN '$valor_locacao_inicial' AND '$valor_locacao_final'";	
		}
	
	}
	
	if($iptu_final!=""){
		$filtro = $filtro. " and iptu BETWEEN '$iptu_inicial' AND '$iptu_final'";	
	}
	
	if($condominio_final!=""){
		$filtro = $filtro. " and valor_condominio BETWEEN '$condominio_inicial' AND '$condominio_final'";	
	}
	
	if($dia_inicio!="0" and $dia_inicio!=""){
		
		if($corretor!="0" and $corretor!=""){
			$filtro = $filtro. " and tabela_imovel.data BETWEEN '$data_inicial' AND '$data_final'";
		}else{
			
			$filtro = $filtro. " and data BETWEEN '$data_inicial' AND '$data_final'";
		}
	}
	
	if($proprietario!="0" and $proprietario!=""){
		$filtro = $filtro. " and proprietario='$proprietario'";	
	}
	
	//area total
	if($area_total_minimo!="" or $area_total_maximo!=""){
		
		if($area_total_minimo=="" ){
		$filtro = $filtro. " and area_total  BETWEEN '1' AND '$area_total_maximo'";	
		
		}else if($area_total_maximo=="" ){
		$filtro = $filtro. " and area_total >= '$area_total_minimo'";	
		
		}else{
		$filtro = $filtro. " and area_total  BETWEEN '$area_total_minimo' AND '$area_total_maximo'";	
		}
		
	}
	
	//area util
	if($area_util_minimo!="" or $area_util_maximo!=""){
		
		if($area_util_minimo=="" ){
		$filtro = $filtro. " and area_util  BETWEEN '1' AND '$area_util_maximo'";	
		
		}else if($area_util_maximo=="" ){
		$filtro = $filtro. " and area_util >= '$area_util_minimo'";	
		
		}else{
		$filtro = $filtro. " and area_util  BETWEEN '$area_util_minimo' AND '$area_util_maximo'";	
		}
		
	}
	
	//habitese
	//habitese
	if($habitese_minimo!="" or $habitese_maximo!=""){
		
		if($habitese_minimo=="" ){
		$filtro = $filtro. " and habitese  BETWEEN '1' AND '$habitese_maximo'";	
		
		}else if($habitese_maximo=="" ){
		$filtro = $filtro. " and habitese >= '$habitese_minimo'";	
		
		}else{
		$filtro = $filtro. " and habitese  BETWEEN '$habitese_minimo' AND '$habitese_maximo'";	
		}
		
	}
	
	//
	
	//metro quadrdado
	if($metro_minimo!="" or $metro_maximo!=""){
		
		if($metro_minimo=="" ){
		$filtro = $filtro. " and metro_quadrado  BETWEEN '1' AND '$metro_maximo'";	
		
		}else if($metro_maximo=="" ){
		$filtro = $filtro. " and metro_quadrado >= '$metro_minimo'";	
		
		}else{
		$filtro = $filtro. " and metro_quadrado  BETWEEN '$metro_minimo' AND '$metro_maximo'";	
		}
		
	}
	
	
	//quartos
	if($quartos_minimo!="" or $quartos_maximo!=""){
		
		if($quartos_minimo=="" ){
		$filtro = $filtro. " and quartos  BETWEEN '1' AND '$quartos_maximo'";	
		
		}else if($quartos_maximo=="" ){
		$filtro = $filtro. " and quartos >= '$quartos_minimo'";	
		
		}else{
		$filtro = $filtro. " and quartos  BETWEEN '$quartos_minimo' AND '$quartos_maximo'";	
		}
		
	}
	
	
	//area total
	if($suites_minimo!="" or $suites_maximo!=""){
		
		if($suites_minimo=="" ){
		$filtro = $filtro. " and suites  BETWEEN '1' AND '$suites_maximo'";	
		
		}else if($suites_maximo=="" ){
		$filtro = $filtro. " and suites >= '$suites_minimo'";	
		
		}else{
		$filtro = $filtro. " and suites  BETWEEN '$suites_minimo' AND '$suites_maximo'";	
		}
		
	}
	
	
	//area total
	if($vagas_minimo!="" or $vagas_maximo!=""){
		
		if($vagas_minimo=="" ){
		$filtro = $filtro. " and vagas  BETWEEN '1' AND '$vagas_maximo'";	
		
		}else if($vagas_maximo=="" ){
		$filtro = $filtro. " and vagas >= '$vagas_minimo'";	
		
		}else{
		$filtro = $filtro. " and vagas  BETWEEN '$vagas_minimo' AND '$vagas_maximo'";	
		}
		
	}
	
	
	//
	

	
	if($site!=""){
		$filtro = $filtro. " and site='$site'";	
	}
	
	if($lancamento!=""){
		$filtro = $filtro. " and lancamento='$lancamento'";	
	}
	
	if($placa!=""){
		$filtro = $filtro. " and placa='$placa'";	
	}
	
	if($indicador!=""){
		$filtro = $filtro. " and indicador LIKE _utf8  '%$indicador%' COLLATE utf8_unicode_ci";	
	}
	
	
	if($permuta!=""){
		$filtro = $filtro. " and permuta='$permuta'";	
	}
	
	if($negociacao!="0" and $negociacao!=""){
		$filtro = $filtro. " and negociacao in ($negociacao, 3)";	
	}
	
	if($tipo!="0" and $tipo!=""){
		$filtro = $filtro. " and tipo='$tipo'";	
	}
	
	
	if($subtipo!="Todos" and $subtipo!=""){
		$filtro = $filtro. " and subtipo='$subtipo'";	
	}


}




?>