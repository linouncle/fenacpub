<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=UFT-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  

<head>

<title>Fenac im&oacute;veis - Sistema administrativo</title>
<link href="style.css" type="text/css" media="all" rel="stylesheet" />

  
</head>
<body>
<?php

 
     session_start(); // sempre que usarmos as sessions devemos chamar esse codigo sempre no inicio do script

if(isset($_SESSION['login'])){// verifica se existe a varavel session

   $login=$_SESSION['login']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo
   
   $id_usuario=$_SESSION['id_usuario']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo

//CONEXAO
include 'includes/conexao.php';
require 'includes/formata_inteiro_decimal_br_tela.php';


 $sql = mysql_query("SELECT * FROM tabela_usuario where id_usuario='$id_usuario'");     
 $user = mysql_fetch_object($sql) ;

//DATA ATUAL
$dia_atual = date("d");
$mes_atual = date("m");
$ano_atual = date("Y");

$data_atual = $ano_atual.'-'.$mes_atual.'-'.$dia_atual;

//ID
$id_imovel = $_GET['id_imovel'];




//DELETA IMAGEM
$fotos=$_POST['fotos'];

	for($i=0; $i<sizeof($fotos); $i++){
		$query .= ($i+1!=sizeof($fotos)) ? $fotos[$i]."," : $fotos[$i].")";
		
		$sql= mysql_query("DELETE FROM tabela_fotos WHERE id='$fotos[$i]' ");

	}
	
 

// FAVORITO
$add = $_GET['add']; 


if($add=='sim'){
	$sql_confere_usuario = mysql_query("SELECT * FROM tabela_favorito where id_imovel='$id_imovel' and id_usuario='$id_usuario'");
	$confere_usuario = mysql_fetch_object($sql_confere_usuario);
	
	if($confere_usuario ==""){
			$sql = mysql_query("INSERT INTO tabela_favorito VALUES ('', '".$id_imovel."', '".$id_usuario."')");	
	}
}
//




//////////////
$filtro = $_GET['filtro']; 
$ativo = $_GET['ativo']; 
$sele_caracteristicas = $_GET['sele_caracteristicas']; 
$pagina = $_GET['pagina']; 

$filtro = urlencode($filtro) ;
$sele_caracteristicas = urlencode($sele_caracteristicas) ;

?>


<div id="conteudo" class="conteudo">

<?

	include 'includes/header.php';

?>


    <main>
    
   

        <div class="destaques">
            
          <div class="cadastro_form">
          
          
             <h1 class="title_imoveis">Detalhes  im&oacute;vel</h1> 
             <?
			 
			 $url = $_GET['url']; 
			 if($url==""){
				$url='menu.php'; 
			 }
			 echo "<p><a href='$url'>Voltar ao resultado de busca</a></p>";
			 
			
			 
	 	$sql_imovel = mysql_query("SELECT * FROM tabela_imovel where id_imovel='$id_imovel'");
		$imovel = mysql_fetch_object($sql_imovel);

	
		?>
		

<!--
###################################
##			Estilos              ##
###################################
-->
 
	
<link rel='stylesheet' id='all-css-0-1' href='all-css-0-1.css' type='text/css' media='all' />
<link rel='stylesheet' id='print-css-1-1' href='https://s0.wp.com/wp-content/mu-plugins/global-print/global-print.css?m=1465851035h' type='text/css' media='print' />

<script type='text/javascript' src='s0.js'></script>
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://clares.wordpress.com/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://s1.wp.com/wp-includes/wlwmanifest.xml" /> 
<link rel='prev' title='PHP Staff &#8211; XMaps Guia Online &#8211; Locais no Mapa com Marcadores&nbsp;Personalizados' href='https://clares.wordpress.com/2012/11/05/php-staff-xmaps-guia-online-locais-no-mapa-com-marcadores-personalizados/' />



        
      

		<?
		
		
			
		$sql_fachada = mysql_query("SELECT * FROM tabela_fotos WHERE id_imovel='$imovel->id_imovel'  ORDER BY `order` ASC ");
		$fachada = mysql_fetch_object($sql_fachada);
		
		$foto = $fachada->arquivo;
		
		if($foto==""){
		$foto = 'img/logo-topo.png';
		}
		
		
			echo"<div class='imovel_home'>";
			
			////
			echo"<div class='texto_imovel_interna'>";
	
	
			echo"<p>Novo id importação: $imovel->id_imovel</p>";
	
			echo"<p>Referencia: $imovel->acodigo</p>";
			echo"<p>Data: $imovel->data</p>";
			echo"<p>Hora: $imovel->hora</p>";
			echo"<p>Edifício: $imovel->edificio</p>";
			echo"<p>Condominio: $imovel->empreendimento</p>";
			echo"<p>Tipo: $imovel->tipo</p>";
			echo"<p>Construtora: $imovel->construtora</p>";
			echo"<p>Estilo: $imovel->estilo</p>";
			echo"<p>Esquina: $imovel->esquina</p>";
			echo"<p>Imed: $imovel->imed</p>";
	
			echo"<h2>Valores</h2>";
			echo"<p>Venda: $imovel->vvp</p>";
			echo"<p>Locação: $imovel->valor_aluguel</p>";
			echo"<p>Condominio: $imovel->valor_condominio</p>";
			echo"<p>IPTU: $imovel->iptu</p>";
	
	
			echo"<h2>Endereço</h2>";
			echo"<p>Logradouro: $imovel->logradouro</p>";
			echo"<p>Endereco: $imovel->endereco</p>";
			echo"<p>numero: $imovel->numero</p>";
			echo"<p>Unidade: $imovel->unidade</p>";
			echo"<p>Andar: $imovel->andar_r</p>";
			echo"<p>Bloco: $imovel->bloco</p>";
			echo"<p>Bairro: $imovel->bairro</p>";
			echo"<p>Cidade: $imovel->cidade</p>";
	
	
			echo"<h2>Proprietário</h2>";
			echo"<p>Nome: $imovel->proprietario</p>";
			echo"<p>Telefone: $imovel->fone</p>";
			echo"<p>Email: $imovel->email</p>";

			echo"<h2>Caracteristicas</h2>";
			echo"<p>Habite-se: $imovel->habitese</p>";
			echo"<p>Idade: $imovel->idade</p>";
			echo"<p>Andar(total de andares)?: $imovel->andar_es</p>";
			echo"<p>AP por Andar: $imovel->ap_andar</p>";
			
	
			echo"<h2>Caracteristicas (linha 1)</h2>";
	
			echo"<p>S fes: $imovel->sf</p>";
			echo"<p>S jogo: $imovel->sj</p>";
			echo"<p>pg (play?): $imovel->pg</p>";
			echo"<p>Piscina: $imovel->piscina</p>";
			echo"<p>Quadra: $imovel->quadra</p>";
			echo"<p>Dep G (deposito?): $imovel->deposito</p>";
			echo"<p>E vis?: $imovel->est_vis</p>";
			echo"<p>Consv: $imovel->conserv</p>";
			echo"<p>Elevador: $imovel->elevador</p>";
			echo"<p>Recuo: $imovel->recuo</p>";
			echo"<p>Gerador: $imovel->gerador</p>";
	
	
			echo"<h2>Caracteristicas (linha 2)</h2>";
			echo"<p>Dormitório: $imovel->dormitorio</p>";
			echo"<p>Suítes: $imovel->suite</p>";
			echo"<p>Vagas: $imovel->vagas</p>";
			echo"<p>Area util: $imovel->area_util</p>";
			echo"<p>Area total: $imovel->area_total</p>";
			echo"<p>Banheiro: $imovel->banho</p>";
			echo"<p>Posição: $imovel->posicao</p>";
			echo"<p>Terraço: $imovel->terraco</p>";
			echo"<p>Closet: $imovel->closet</p>";
			echo"<p>Armário embutido: $imovel->armario_embitido</p>";
			echo"<p>3 R?: $imovel->jd</p>";
	
			echo"<h2>Caracteristicas (linha 3)</h2>";
			echo"<p>Jantar: $imovel->jantar</p>";
			echo"<p>Lavabo: $imovel->lavabo</p>";
			echo"<p>Lareira: $imovel->lareira</p>";
			echo"<p>Jd (jardim inverno?): $imovel->jd</p>";
			echo"<p>Escritório: $imovel->escritorio</p>";
			echo"<p>Sala TV: $imovel->salatv</p>";
			echo"<p>Sala intima: $imovel->sala_intima</p>";
			echo"<p>Copa: $imovel->copa</p>";
			echo"<p>Despensa: $imovel->despensa</p>";
			echo"<p>Quarto empregada: $imovel->quarto_empregada</p>";
			echo"<p>WC: $imovel->wc</p>";
	
	
	
			echo"<h2>outros dados</h2>";
			echo"<p>Licenças: $imovel->licenca_n</p>";
			echo"<p>Em uso: $imovel->licensa</p>";
			echo"<p>Zelador: $imovel->zelador</p>";
			echo"<p>Fone zelador: $imovel->tel_zelador</p>";
			echo"<p>Chave visita: $imovel->chave_visita</p>";
			echo"<p>Vago: $imovel->vago</p>";
			echo"<p>Indicador: $imovel->indicador</p>";
			echo"<p>Promotor: $imovel->promotor</p>";
			echo"<p>Corretor: $imovel->corretor</p>";
			echo"<p>Placa: $imovel->placa</p>";
			echo"<p>SAI?: $imovel->sai</p>";
			echo"<p>Data alteração: $imovel->atualizado</p>";
	
	

			echo"<h2>$imovel->titulo - Ref: $imovel->id_imovel</h2>";
			
			if($user->id_usuario==1){
			 echo"<a href='whatsapp://send?text=Acesse%20o%20nosso%20site:http%3A%2F%2Fcolimaimoveis.com.br%2Fimovel.php%3Fid_imovel%3D$id_imovel' target='_blank'>Enviar via whatsapp</a>";
			}
			
			$pieces = explode("-",  $imovel->data);
			
			echo"<p>Data de cadastro: $pieces[2]/$pieces[1]/$pieces[0]</p>";	
		
			echo"<p>$imovel->descricao</p>";
			if($user->tipo_usuario!=2 or ($imovel->pendente==1 and $imovel->id_usuario==$user->id_usuario)){
				
			echo"<p><a href='cadastro_imovel_02.php?id_imovel=$id_imovel' class='editar'>Editar texto im&oacute;vel</a></p>";
			}
			
			//
			echo"<h3>Detalhes</h3>";
			
		
			
			if($imovel->area_util!="" and $imovel->area_util!="0"){
				$valor_m2 = $imovel->valor/$imovel->area_util;
				$valor_m2_tela = inteiro_decimal_br($valor_m2);
			}
			
			
			//
			if($imovel->negociacao=='1' or $imovel->negociacao==''){
				
				$valor_tela = inteiro_decimal_br($imovel->valor);
				echo"<h4>Negocia&ccedil;&atilde;o: Vender - Valor: R$ $valor_tela - R$ $valor_m2_tela m2</h4>";
			
			}else if($imovel->negociacao=='2'){
	
				$valor_tela_locacao = inteiro_decimal_br($imovel->valor_locacao);
				echo"<h4>Negocia&ccedil;&atilde;o: Alugar - Valor: R$ $valor_tela_locacao</h4>";
			
			}else if($imovel->negociacao=='3'){
			
				echo"<p>Negocia&ccedil;&atilde;o: Alugar e Vender";
				$valor_tela = inteiro_decimal_br($imovel->valor);
				echo"<h4>Valor Venda: R$ $valor_tela  - R$ $valor_m2_tela m2</h4>";
				$valor_tela_locacao = inteiro_decimal_br($imovel->valor_locacao);
				echo"<h4>Valor Loca&ccedil;&atilde;o: R$ $valor_tela_locacao</h4>";
				
			}
			
			echo"<p>Tipo: $imovel->tipo - Subtipo: $imovel->subtipo</p>";
			
			$condominio = inteiro_decimal_br($imovel->valor_condominio);
			$iptu = inteiro_decimal_br($imovel->iptu);			
			echo"<p>Valor condominio: $condominio - IPTU: $iptu</p>";
			
			echo"<p>&Aacute;rea &uacute;til: $imovel->area_util - &Aacute;rea total: $imovel->area_total</p>";
			echo"<p>Quartos: $imovel->quartos - Su&iacute;tes: $imovel->suites - Banheiros: $imovel->banheiros - Vagas: $imovel->vagas</p>";
			echo"<p>Habite-se: $imovel->habitese </p>";

			echo"<p>Construtora: $imovel->construtora - Lan&ccedil;amento: $imovel->lancamento";
			
			if($user->tipo_usuario!=2 or ($imovel->pendente==1 and $imovel->id_usuario==$user->id_usuario)){
			echo"<p><a href='cadastro_imovel_02.php?id_imovel=$id_imovel' class='editar'>Editar im&oacute;vel</a></p>";
			}
			echo"<p>&nbsp;</p>";
			
			//LOCALIZACAO//////////
			echo"<h3>Localiza&ccedil;&atilde;o</h3>";
			echo"<p>CEP: $imovel->cep - Estado: $imovel->estado - Cidade: $imovel->cidade</p>";
			echo"<p>Bairro: $imovel->bairro";
			
			if($imovel->ocultar!="S" and $imovel->ativo!="4"){
				
			echo" - Condom&iacute;nio/Edif&iacute;cio: $imovel->condominio - Torre: $imovel->edificio - Endere&ccedil;o: $imovel->endereco, $imovel->numero - $imovel->complemento</p>";
			}
			
			if($user->tipo_usuario!=2 or ($imovel->pendente==1 and $imovel->id_usuario==$user->id_usuario)){
			echo"<p><a href='cadastro_imovel_01.php?id_imovel=$id_imovel' class='editar'>Editar localiza&ccedil;&atilde;o</a></p>";
			}
			echo"<p>&nbsp;</p>";
			
			//
			echo"<h3>Outros dados</h3>";
			
			if($imovel->ativo=="0"){
				$ativo="Ativo";
			}else if($imovel->ativo=="1"){
				$ativo="Inativo";
			}else if($imovel->ativo=="2"){
				$ativo="Vendido";
			}else if($imovel->ativo=="3"){
				$ativo="Alugado";
			}else if($imovel->ativo=="4"){
				$ativo="Em negoci&ccedil;&atilde;o";
			}
			echo"<p>Status: $ativo</p>";
			
			echo"<p>Andar: $imovel->andar - Ap. por andar: $imovel->ap_andar</p>";
			
			if($imovel->permuta=="S"){
				$permuta="Sim";
			}else{
				$permuta="N&atilde;o";
			}
			
			if($imovel->placa=="S"){
				$placa="Sim";
			}else{
				$placa="N&atilde;o";
			}
		
			
			if($imovel->portal=="1"){
				$portal="Sim";
			}else{
				$portal="N&atilde;o";
			}
			
			if($imovel->ocultar=="S"){
				$ocultar="Sim";
			}else{
				$ocultar="N&atilde;o";
			}
			
			
			echo"<p>Zelador: $imovel->zelador - Telefone zelador: $imovel->telefone_zelador - Indicador: $imovel->indicador - Permuta: $permuta</p>";
			echo"<p>Placa: $placa - Portal: $portal </p>";	
			
			
			echo"<p>Refer&ecirc;ncia antiga: $imovel->referencia_antiga</p>";	
		
			if($user->tipo_usuario!=2 or ($imovel->pendente==1 and $imovel->id_usuario==$user->id_usuario)){
			echo"<p><a href='cadastro_imovel_03.php?id_imovel=$id_imovel' class='editar'>Editar outros dados</a></p>";
			}
			
			echo"<p>&nbsp;</p>";
			
			//
		
			
			
			
			
			if($user->tipo_usuario!=2 or ($imovel->pendente==1 and $imovel->id_usuario==$user->id_usuario)){
			echo"<p><a href='cadastro_imovel_04.php?id_imovel=$id_imovel' class='editar'>Editar &aacute;reas</a></p>";
			}
			
			echo"<p>&nbsp;</p>";
			//
			
			echo"<h3>M&iacute;dias</h3>";
			
				
			if($imovel->site=="1"){
				echo"Este im&oacute;vel est&aacute; no site Colima. ";
			}else{
				echo"<strong>Este im&oacute;vel N&Atilde;O est&aacute; no site Colima. </strong>";
			}
			
			
			
			//////////////
			//EXCLUIR ////
						
			if($user->tipo_usuario!=2){
			
			echo"<div class='link_cadastrar'>";
			echo"<p><a href='excluir_imovel.php?id_imovel=$id_imovel' class='link_excluir'>Excluir im&oacute;vel</a></p>";
			echo"<p>&nbsp;</p>";
			
			echo"</div> ";
			
			}
			
			
		
			
			
			///////////////
			echo"</div> ";
			
			
			
				//////////
			
			//BARRA LATERAL
			echo"<div class='foto_imovel_home'>";
			
		

			//Foto
			echo"<img src='$fachada->arquivo' width='200px'>";
			
			echo"<form action='enviar_imovel.php' method='post' name='form1' id='form1' onSubmit='return checkform(this);'>";
			
			
			echo"<p>";
            echo"<h3>Enviar para cliente</h3>";
            echo"</p>";
			
	?>
     <p>
                <label for="id_cliente" class="label_menor">Cliente: </label><br>
				<select name="id_cliente">
				<option value="0" selected>Selecione</option>
				
				  <?
			  $sql_clientes = mysql_query("SELECT * FROM tabela_cliente Where tipo_cliente  !='2'  Order by nome");
			  
			  if($user->tipo_usuario==2){
				  
				 $sql_clientes = mysql_query("SELECT * FROM tabela_cliente Where tipo_cliente != '2' and corretor='$user->id_usuario'  Order by nome");
				  
			  }
				while($clientes = mysql_fetch_object($sql_clientes)){
				echo"<option value='$clientes->id_cliente'>$clientes->nome</option>";
				}
			 ?>
				</select>
                </p>
                



                <?
			
	
			
			echo"<p>";
            echo"<label for='mensagem' class='label_menor'>Mensagem: </label><br>";
            echo"<textarea name='mensagem' id='mensagem'></textarea>";
			echo"</p>";
              
			 echo"<input  type='hidden' name='id_imovel' id='id_imovel' value='$id_imovel'>";
			  
			echo"<input type='submit' name='Submit' value='Enviar' class='botao' />";
			  
			echo"</form>";
		
			 
			 /////////////////////////////////////////////
			//LINKS
			
		
			
			echo"<p><a href='cadastro_saida.php?id_imovel=$id_imovel' class='link_laranja'>Agendar visita</a></p>";			
			
	
	
	
		if( isset( $_SESSION["favoritos"][$id_imovel]) != $id_imovel ){
					
				echo"<a href='#' class='add selecionar link_laranja' rel='$id_imovel' nm='$nome'>Selecionar Favoritos</a>";
	
			
				}else{
				echo"<span class='link_verde'>Favorito</span>";	
				}
			
			echo"</p>";
			
			
			/////////////////////////////////////////////
	
			
			
			
			
			
			//FECHA DIVS
			
			
			
			
			echo"</div>";
			
			//
					
		
	  ?>
        

           
            
          </div>
            
      </div>
      
              
        <!--   -->
             <h3 class='fundo_laranja'> FOTOS E V&Iacute;DEO</h3>
             
        <hr>
               <?
			
			$sql_imovel_corretor = mysql_query("SELECT * FROM tabela_imovel_corretor where id_imovel='$id_imovel'  and foto='foto'");
			$imovel_corretor = mysql_fetch_object($sql_imovel_corretor);
			
			$imovel_corretor_espera = $imovel_corretor->id_usuario;
			
			$sql_corretor_fotos = mysql_query("SELECT * FROM tabela_usuario where id_usuario='$imovel_corretor->id_usuario'");
			$corretor_fotos = mysql_fetch_object($sql_corretor_fotos);
			
			if($imovel_corretor!=""){
			
				$tem_foto=1;
									
				// Define os valores a serem usados
			
				// Usa a fun??o strtotime() e pega o timestamp das duas datas:
				$time_inicial = strtotime($imovel_corretor->data);
				$time_final = strtotime($data_atual);
				// Calcula a diferen?a de segundos entre as duas datas:
				$diferenca = $time_final - $time_inicial; // 19522800 segundos
				// Calcula a diferen?a de dias
				$dias = (int)floor( $diferenca / (60 * 60 * 24)); // 225 dias
				// Exibe uma mensagem de resultado:

					if($dias<10){
						$conflito=1;
						$id_conflito = $imovel_corretor->id_usuario;
					}else{
					$maisque10=1;	
					}
							
					
			}
	
			if($tem_foto!=""){
			
			$sql_quantas_foto = mysql_query("SELECT COUNT(*) AS total FROM tabela_fotos where id_imovel='$id_imovel'");     
		
			// Salva o valor da coluna 'total', do primeiro registro encontrado pela consulta
			$total = mysql_result($sql_quantas_foto, 0, 'total');
	
			
			if($total<10){
			echo"Este im&oacute;vel tem poucas fotos cadastradas.";	
			
			}else{
				
				$jatemfotos=1;
				echo"Corretor das fotos: $corretor_fotos->nome";
				
				
			}
			
			}
					
				
			?>
            
            <?
			
			if($user->tipo_usuario!=2){
							
 $sql_var_qualidade_fotos = mysql_query("SELECT * FROM tabela_qualidade_fotos where id_imovel='$id_imovel'  ORDER BY `id_qualidade_fotos` DESC ");     
 $var_qualidade_fotos = mysql_fetch_object($sql_var_qualidade_fotos) ;
 
 
?>
            
          <p>  
          
          <form name="form1" method="post" action="imovel.php">
            <label for="qualidade_fotos" class="label_auto">Avaliar qualidade das fotos</label>
<select name="qualidade_fotos" id="qualidade_fotos">
  <option <? if($var_qualidade_fotos==""){ echo"selected";} ?>  >N&atilde;o avaliado</option>
  <option value="0" <? if($var_qualidade_fotos->qualidade_fotos=="0"){ echo"selected";} ?>>Ruim</option>
  <option value="1" <? if($var_qualidade_fotos->qualidade_fotos=="1"){ echo"selected";} ?>>Boa</option>
  <option value="2" <? if($var_qualidade_fotos->qualidade_fotos=="2"){ echo"selected";} ?>>&Oacute;tima</option>
</select>
            <input type="hidden" name="id_imovel" id="id_imovel" value="<? echo $id_imovel ?>" >


			
            <input type="submit" name="enviar" id="enviar" value="editar">
          </p>
        </form>
			
            
             <?
			
						}
			/* if($conflito==1 and $user->tipo_usuario==2){
					
					if($jatemfotos==1){
						echo"<p>J&aacute; tem fotos suficiente</p>";  
					}else if( $user->id_usuario== $imovel_corretor_espera){
						echo"<p><a href='cadastro_imovel_05.php?id_imovel=$id_imovel' class='editar'>Incluir novas fotos e v&iacute;deo</a></p>"; 
					}else{
					echo"<p>Aguardando fotos do corretor</p>";  
					}
					
			   }else{
				echo"<p><a href='cadastro_imovel_05.php?id_imovel=$id_imovel' class='editar'>Incluir novas fotos e v&iacute;deo</a></p>";
			} */
			
			
		if($user->tipo_usuario!=2 or ($imovel->pendente==1 and $imovel->id_usuario==$user->id_usuario)){

				echo"<p><a href='cadastro_imovel_05.php?id_imovel=$id_imovel' class='editar'>Incluir novas fotos e v&iacute;deo</a></p>";
			} 
				
	?>
            
            <!--
============================================================

-->




            
      
            <!-- GALERIA FOTOS E MODAL  -->
            
            <?
			
			
//if($user->tipo_usuario!=2){
			
			
			$sql_tem_foto = mysql_query("SELECT * FROM tabela_fotos where id_imovel='$imovel->id_imovel'");     
        	$tem_foto = mysql_fetch_object($sql_tem_foto) ;
			
			
			if($tem_foto!=""){
				
				?>
                
                <?
				$n =0;
				
	
				
				$n=$n+1;
				
			?>
            

 <!-- REORGANIZAR EDELETAR  -->

            <div class="fotos_imovel" id="fotos_organizar">
            
            <a href="javascript:void(0);" class="btn outlined mleft_no reorder_link" id="save_reorder">Reorganizar as fotos</a>
                    <div id="reorder-helper" class="light_box" style="display:none;">1. Arraste as fotos para reorganizar.<br>2. Click 'Salvar nova ordem' quando terminar.
                    </div>
                    
                    <div class="gallery">
                    <form name="form1" method="post" action="imovel.php#fotos_organizar">
                    
                       
                        
                        <input type="hidden" name="id_imovel" id="id_imovel" value="<? echo $id_imovel ?>" >	
                         <input type="submit" name="enviar" id="enviar" value="apagar fotos">

                        </form>
                    </div>
            </div>
            
            
            <?
			}
			
//}
			?>
            
           <!--   -->
           
                 
          <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
    
    <?
		
			$sql_imovel_video = mysql_query("SELECT * FROM tabela_video where id_imovel='$imovel->id_imovel'");
			$imovel_video = mysql_fetch_object($sql_imovel_video);
	
	if($imovel_video!=""){
				
	?>
    
    <div id="player" class="video_imovel"></div>

    <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '390',
          width: '640',
          videoId: '<? echo $imovel_video->youtube ?>',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 0);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }
    </script>
    
    <?
	echo"<p><a href='imovel.php?id_imovel=$id_imovel&id_video=$imovel_video->id_video'>Excluir video</a></p>";
	
	}
	?>
           
      <div class="historico">
        <hr>
        <h3 class='fundo_laranja'> Hist&oacute;rico</h3>
        <hr>
        <p><strong>Cadastrar coment&aacute;rio</strong></p>
        <form name="form1" method="post" action="imovel.php">
          <p>
            <label for="comentario">Mensagem</label>
            <textarea name="comentario" id="comentario" cols="45" rows="5"></textarea>
            <input type="hidden" name="id_imovel" id="id_imovel" value="<? echo $id_imovel ?>" >
            
            
          
          </p>
          <p>
            <input type="submit" name="enviar" id="enviar" value="enviar coment&aacute;rio">
          </p>
        </form>
     
     <hr>

      
      
    </main>


 




<?

include 'includes/footer.php';

}
else
{
//exiba um alerta dizendo que a senha esta errada
?>

<script type="text/javascript">
alert("Por favor, efetue o login para acessar esse link")
</script>

<?
echo "<div align='center'>";
echo "<span class='style2'>Se voc&ecirc; j&aacute; tem cadastro volte a home e fa&ccedil;a login.<a href=index.php>VOLTAR A HOME</a></span>";
echo "</div>";
}
?>

</div>

</body>
</html>
