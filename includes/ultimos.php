 <script type="text/javascript">
$(function(){
  $('.add').on('click',function(){
    $(this).addClass('link_verde').text("Selecionado");
    var $acao	= "add";
    var $id_imovel 	= $(this).attr('rel');
    $.ajax({
      type: "POST",
      url: "includes/session.php",
      data: { 'acao':$acao,'id_imovel':$id_imovel }
    });
    return false;
  });
});
</script>



<?


		
		$sql_fachada = mysql_query("SELECT * FROM tabela_fotos WHERE id_imovel='$ultimos->id_imovel'  ORDER BY `order` ASC ");
		$fachada = mysql_fetch_object($sql_fachada);
		
		$foto = $fachada->arquivo;
		
		if($foto==""){
		$foto = 'img/logo_colima.jpg';
		}
		
		$sql_cliente = mysql_query("SELECT * FROM tabela_cliente where id_cliente='$ultimos->proprietario'");
		$cliente = mysql_fetch_object($sql_cliente);
		
		$sql_alteracao = mysql_query("SELECT * FROM tabela_alteracao where id_imovel='$ultimos->id_imovel' order by data DESC");
		$alteracao = mysql_fetch_object($sql_alteracao);
		
		$sql_check = mysql_query("SELECT * FROM tabela_check where id_imovel='$ultimos->id_imovel' order by data DESC");
		$check = mysql_fetch_object($sql_check);
		
		/////////////////////////////////////////////////////////////////////
		
		
		         if($ultimos->ativo=="0"){
					 $mesagem = 'ATIVO';
					 $estilo = 'ativo';
				 }else if($ultimos->ativo=="1"){
					 $mesagem = 'INATIVO';
					 $estilo = 'inativo';
				 }else if($ultimos->ativo=="2"){
					 $mesagem = 'VENDIDO';
					 $estilo = 'vendido';
				 }else if($ultimos->ativo=="3"){
					 $mesagem = 'ALUGADO';
					 $estilo = 'alugado';
				 }else if($ultimos->ativo=="4"){
					 $mesagem = 'Em negocia&ccedil;&atilde;o';
					 $estilo = 'negocia';
				 }
				 
     
			
			echo"<div class='imovel_home'>";
			echo"<div class='foto_imovel_home'>";
			echo"<img src='$foto' width='200px'>";
			echo"<p class='$estilo'>$mesagem</p>";
			
			$pieces = explode("-",  $ultimos->data);	
			$data_cadastro = "$pieces[2]/$pieces[1]/$pieces[0]";
			
			if($ultimos->area_util!="" and $ultimos->area_util!="0"){
				$valor_m2 = $ultimos->valor/$ultimos->area_util;
				$valor_m2_tela = inteiro_decimal_br($valor_m2);
			}
			
			
			
			$pieces_alteracao = explode("-",  $alteracao->data);	
			$data_alteracao = "$pieces_alteracao[2]/$pieces_alteracao[1]/$pieces_alteracao[0]";
			if($data_alteracao=='//'){
				$data_alteracao='';
			}
			
			
			$pieces_check = explode("-",  $check->data);	
			$data_check = "$pieces_check[2]/$pieces_check[1]/$pieces_check[0]";
			if($data_check=='//'){
				$data_check='';
			}
			

			
			
			echo"<p><strong>Data de cadastro:</strong> <br>$data_cadastro</p>";
			echo"<p><strong>&Uacute;ltima altera&ccedil;&atilde;o:</strong><br> $data_alteracao</p>";
			echo"<p><strong>Checked:</strong><br> $data_check </p>";
			

$dia_atual = date("d");
$mes_atual = date("m");
$ano_atual = date("Y");

$data_atual = $ano_atual."-".$mes_atual."-".$dia_atual;


			// Define os valores a serem usados

if($check->data!=""){
	
	
	
	
	// Usa a função strtotime() e pega o timestamp das duas datas:
$time_inicial = strtotime($check->data);
$time_final = strtotime($data_atual);
// Calcula a diferença de segundos entre as duas datas:
$diferenca = $time_final - $time_inicial; // 19522800 segundos
// Calcula a diferença de dias
$dias = (int)floor( $diferenca / (60 * 60 * 24)); // 225 dias
	
	if($dias > 90){
		echo"<p class='link_excluir'>Check a mais de 90 dias</p>";
	}
}
			
			echo"</div>";
			
			
			
			//////////////////////////////////////////
			
			echo"<div class='texto_imovel_home'>";
			echo"<h3>$ultimos->titulo - Ref.: $ultimos->id_imovel</h3>";
			
			//
			
			
			if($ultimos->negociacao=='1' or $ultimos->negociacao==''){
				
				echo"<p><strong>Negocia&ccedil;&atilde;o:</strong> Vender - <strong>Bairro:</strong> $ultimos->bairro </p>";
				$valor_tela = inteiro_decimal_br($ultimos->valor);
				echo"<h4>Valor Venda: R$ $valor_tela - R$ $valor_m2_tela m2</h4>";
			
			}else if($ultimos->negociacao=='2'){
				
				echo"<p><strong>Negocia&ccedil;&atilde;o:</strong> Alugar - <strong>Bairro:</strong> $ultimos->bairro </p>";
				$valor_tela_locacao = inteiro_decimal_br($ultimos->valor_locacao);
				echo"<h4>Valor Loca&ccedil;&atilde;o: R$ $valor_tela_locacao</h4>";
			
			}else if($ultimos->negociacao=='3'){
			
				echo"<p><strong>Negocia&ccedil;&atilde;o:</strong> Alugar e Vender - <strong>Bairro:</strong> $ultimos->bairro </p>";
				$valor_tela = inteiro_decimal_br($ultimos->valor);
				echo"<h4>Valor Venda: R$ $valor_tela - R$ $valor_m2_tela m2</h4>";
				$valor_tela_locacao = inteiro_decimal_br($ultimos->valor_locacao);
				echo"<h4>Valor Loca&ccedil;&atilde;o: R$ $valor_tela_locacao</h4>";
				
			}
			
			////
			
			$condominio = inteiro_decimal_br($ultimos->valor_condominio);
			$iptu = inteiro_decimal_br($ultimos->iptu);			
			echo"<p>Valor condominio: $condominio - IPTU: $iptu</p>";
			//
			
			
			if($ultimos->ocultar!="S" and $ultimos->ativo!="4"){
			
			
			$str =  $cliente->telefone;
			$telefone_ajuste = replaceByPos($str, -4, '-');
			
			
			echo"<p> <strong> Condom&iacute;nio/Edif&iacute;cio: </strong>  $ultimos->condominio   - Torre: $ultimos->edificio <strong>Endere&ccedil;o:</strong> $ultimos->endereco, $ultimos->numero - $ultimos->complemento</p>";
			
			echo"<p><strong>Propriet&aacute;rio:</strong> $cliente->nome - <strong>Telefone:</strong> $telefone_ajuste - <strong>Outros contatos:</strong> $cliente->outros_contatos<br> <strong>Email:</strong> $cliente->email </p>";
			}
			
			//
			
			//
			
			$sql_imovel_corretor = mysql_query("SELECT * FROM tabela_imovel_corretor where id_imovel='$ultimos->id_imovel' and foto='foto'");
			$imovel_corretor = mysql_fetch_object($sql_imovel_corretor);
			
			
			$sql_corretor = mysql_query("SELECT * FROM tabela_usuario where id_usuario='$imovel_corretor->id_usuario'");
			$corretor = mysql_fetch_object($sql_corretor);
			
			if($ultimos->indicador!=""){
			echo"<strong>Indicador:</strong> $ultimos->indicador - ";
			}
			
			if($corretor!=""){
			echo"<strong>Fotos:</strong> $corretor->nome ";
			}
			
		
			echo"<p><strong>Quartos:</strong> $ultimos->quartos - <strong>Su&iacute;tes:</strong> $ultimos->suites - <strong>Banheiros:</strong> $ultimos->banheiros - <strong>Vagas:</strong> $ultimos->vagas</p>";
			echo"<p><strong>&Aacute;rea &uacute;til:</strong> $ultimos->area_util - <strong>&Aacute;rea total:</strong> $ultimos->area_total</p>";
			
			
			
			/*
			echo"<h3>&Aacute;reas comuns e privada </h3>";
			
			$sql_areas = mysql_query("SELECT * FROM tabela_areas where id_imovel='$ultimos->id_imovel'");
			while($areas = mysql_fetch_object($sql_areas)){
			echo"<ul>";
			echo"<li class='lista_caracteristica'>$areas->caracteristica";
			echo"</ul>";	
			}


			*/
			
			if($ultimos->site=="1"){
			echo"<h3>Anunciado no site</h3>";
			}

			$sql_anuncios = mysql_query("SELECT * FROM tabela_anuncios where id_imovel='$ultimos->id_imovel'");
			$anuncios = mysql_fetch_object($sql_anuncios);
			
			if($anuncios!=""){
			echo"<h3>An&uacute;ncios em portais</h3>";
			}
			
			$sql_anuncios = mysql_query("SELECT * FROM tabela_anuncios where id_imovel='$ultimos->id_imovel'");
			while($anuncios = mysql_fetch_object($sql_anuncios)){
				
				$sql_portais = mysql_query("SELECT * FROM tabela_portais where id_portal='$anuncios->id_portal'");
				$portais = mysql_fetch_object($sql_portais);
				
				$sql_corretor_portal = mysql_query("SELECT * FROM tabela_usuario where id_usuario='$anuncios->id_usuario'");
				$corretor_portal = mysql_fetch_object($sql_corretor_portal);
				
			echo"<ul>";
			echo"<li class='lista_caracteristica'>$portais->portal";
			if($corretor_portal!=""){
					echo" - $corretor_portal->nome ";
				}
			echo"</li>";	
			echo"</ul>";	
			}
	
			
			
			
			/////////////////////////////////////////////
			//LINKS
			
			
			if($resultado_busca==1){
				$pagina = $_GET['pagina']; 
				
				$dominio= $_SERVER['HTTP_HOST'];
 				$url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
				$url = urlencode($url);
				
				echo"<p><a href='imovel.php?id_imovel=$ultimos->id_imovel&url=$url' class='link_laranja'>Ver detalhes</a>   ";
			}else{
			echo"<p><a href='imovel.php?id_imovel=$ultimos->id_imovel' class='link_laranja'>Ver detalhes</a>   ";
			}
			
			echo"<a href='cadastro_saida.php?id_imovel=$ultimos->id_imovel' class='link_laranja'>Agendar visita</a> ";
			
	
			
				if( isset( $_SESSION["favoritos"][$ultimos->id_imovel]) != $ultimos->id_imovel ){
					
				echo"<a href='#' class='add selecionar link_laranja' rel='$ultimos->id_imovel' nm='$nome'>Selecionar Favoritos</a>";
	
			
				}else{
				echo"<span class='link_verde'>Favorito</span>";	
				}
			
			echo"</p>";
			
			
			/////////////////////////////////////////////
			//FECHA DIVS
			
			echo"</div> ";
			echo"</div> ";
            
            
?>