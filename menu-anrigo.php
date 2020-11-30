<?php

 
     session_start(); // sempre que usarmos as sessions devemos chamar esse codigo sempre no inicio do script

if(isset($_SESSION['login'])){// verifica se existe a varavel session

   $login=$_SESSION['login']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo
   
   $id_usuario=$_SESSION['id_usuario']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo


include 'includes/conexao.php';
require 'includes/formata_inteiro_decimal_br_tela.php';

$dia_atual = date("d");
$mes_atual = date("m");
$ano_atual = date("Y");

$data_atual = date("Y-m-d"); 


$id_imovel = $_GET['id_imovel']; 

$add = $_GET['add']; 


if($add=='sim'){
	$sql_confere_usuario = mysql_query("SELECT * FROM tabela_favorito where id_imovel='$id_imovel' and id_usuario='$id_usuario'");
	$confere_usuario = mysql_fetch_object($sql_confere_usuario);
	
	if($confere_usuario ==""){
			$sql = mysql_query("INSERT INTO tabela_favorito VALUES ('', '".$id_imovel."', '".$id_usuario."')");	
	}
}


?>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=UFT-8" /> <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<head>

<title>Colima im&oacute;veis - Sistema administrativo</title>
<link href="style.css" type="text/css" media="all" rel="stylesheet" />

 
  
  <script type="text/javascript">
			
			function muda_subtipo(){
			
				//tomo o valor do select do tipo escolhido
				var tipo
				var subtipos_Apartamento = new Array("Todos", "Padr\u00e3o", "Duplex", "Triplex", "Cobertura", "Cobertura Duplex", "Cobertura Triplex", "Flat", "Kitnet/Studio", "Loft")
				var subtipos_Casa = new Array( "Todos", "Padr\u00e3o", "Sobrado", "T\u00e9rrea", "Casa de Condom\u00ednio", "Casa de Vila")
				var subtipos_Comercial = new Array("Todos", "Conjunto Comercial/sala", "Casa Comercial", "Loja Sal\u00e3o", "Galp\u00e3o")
				var subtipos_Rural = new Array("Todos")
				tipo = document.f1.tipo[document.f1.tipo.selectedIndex].value
				//vejo se o tipo est� definido
				if (tipo != 0) {
					//se estava definido, entao coloco as opcoes do subtipo correspondente.
					
					//seleciono o array de subtipo adequado
					meus_subtipos = eval("subtipos_" + tipo)
					//calculo o numero de subtipos
					num_subtipos = meus_subtipos.length
					//para cada subtipo do array, o introduzo no select
					
					// seleciono o que havia antes na div
					var filhos = document.f1.subtipo.childNodes;
					//acho a quantidade
					var num_filhos = document.f1.subtipo.childNodes.length;
					
					//removo todos eles
					for(n = num_filhos-1; n > 0; n--){
						var elemento = filhos[n];
						elemento.parentNode.removeChild(elemento);
					}
					
					//crio as novas op��es
					for (i = 0; i < num_subtipos; i++) {
						
						var opcao = document.createElement("option");
						opcao.setAttribute("value", meus_subtipos[i]);
						
						var texto = document.createTextNode(meus_subtipos[i]);
						
						opcao.appendChild(texto);
						
						document.f1.subtipo.appendChild(opcao);
					}
				}
				else {
					//se n�o havia subtipo selecionado, elimino os subtipos do select
					document.f1.subtipo.length = 1
					//coloco um tra�o na �nica op��o que deixei
					document.f1.subtipo.options[0].value = "-"
					document.f1.subtipo.options[0].text = "-"
				}
				//marco como selecionada a op��o primeira de subtipo
				document.f1.subtipo.options[0].selected = true
			}
			
			
		</script>
  
  
  <script>
  $( function caracteristicas() {
    var availablebairros = [
"Quadra",
"Churrasqueira",
"Acesso para deficientes",
"Aquecimento central", 
"\u00c1rea de Lazer", 
"Biblioteca", 
"Biciclet\u00e0�rio", 
"C\u00e2meras de seguran\u00e7a", 
"Campo de futebol", 
"Casa de Boneca", 
"Central de limpeza e governan\u00e7a", 
"Cinema", 
"De esquina", 
"Elevador", 
"Espa\u00e7o zen", 
"Fitness/Sala de Gin\u00e0stica", 
"Forno de pizza", 
"Gerador", 
"Pet Play", 
"Playground", 
"Po\u00e7o artesiano", 
"Pomar", 
"Porte Coch\u00e8re", 
"Pr\u00f3ximo ao Metro", 
"Sal\u00e3o de festas", 
"Sal\u00e3o de Jogos", 
"Sauna", 
"Sistema de alarme", 
"Solarium", 
"\u00c1rvores frut\u00edferas", 
"Bar na piscina", 
"Fitness ao ar livre", 
"Mini quadra", 
"Automa\u00e7\u00e3o predial", 
"Brinquedoteca", 
"Campo de golfe", 
"Car Wash", 
"Churrasqueira", 
"Espa\u00e7o Gourmet", 
"Estacionamento para visitantes", 
"Heliponto", 
"Lago", 
"Pet Care", 
"Piscina", 
"Piscina aquecida", 
"Piscina coberta", 
"Piscina infantil", 
"Pista de cooper", 
"Pista de Skate", 
"Portaria 24 horas", 
"Quadra de futebol de sal\u00e3o", 
"Quadra de squash", 
"Quadra de t\u00ednis", 
"Quadra poliesportiva", 
"Restaurante", 
"SPA", 
"Pra\u00e7a", 
"Sala de Massagem", 
"Adega", 
"Aquecedor", 
"Ar condicionado", 
"\u00c1rea de servi\u00e7o", 
"Arm\u00e0rio de cozinha", 
"Arm\u00e0rio de cozinha", 
"Bar", 
"Cerca", 
"Churrasqueira", 
"Closet", 
"Copa", 
"Cozinha americana", 
"Cozinha Gourmet", 
"Depend\u00edncia de empregados", 
"Dep\u00f3sito no subsolo", 
"Despensa", 
"Ed\u00edcula", 
"Escrit\u00f3rio", 
"Frente para o mar", 
"Geminada", 
"Guarita", 
"Hidromassagem", 
"Home Theater", 
"Jardim", 
"Lago", 
"Lareira", 
"Lavabo", 
"Lavanderia", 
"Lumin\u00e0rias", 
"Mezanino", 
"Microondas", 
"Mobiliado", 
"Office Space", 
"P\u00e9 direito elevado",  
"Piso de madeira", 
"Piso elevado", 
"Piso frio", 
"Piso laminado", 
"Quintal", 
"Sistema de alarme", 
"Varanda", 
"Varanda Fechada com vidro", 
"Varanda Gourmet", 
"WC para empregados", 
"Fog\u00e3o", 
"Freezer", 
"Geladeira"
    ];
    $( "#caracteristicas" ).autocomplete({
      source: availablebairros
    });
  } );
  </script>
  
  
  <script language="JavaScript" type="text/javascript">
   function mascaraData(campoData){
              var data = campoData.value;
              if (data.length == 2){
                  data = data + '/';
                  document.forms[0].data.value = data;
      return true;              
              }
              if (data.length == 5){
                  data = data + '/';
                  document.forms[0].data.value = data;
                  return true;
              }
         }
</script>


<!-- MASCARA DINHEIRO -->
  
  <script type="text/javascript">
function maskIt(w,e,m,r,a){
// Cancela se o evento for Backspace
if (!e) var e = window.event
if (e.keyCode) code = e.keyCode;
else if (e.which) code = e.which;
// Vari�veis da fun��o
var txt  = (!r) ? w.value.replace(/[^\d]+/gi,'') : w.value.replace(/[^\d]+/gi,'').reverse();
var mask = (!r) ? m : m.reverse();
var pre  = (a ) ? a.pre : "";
var pos  = (a ) ? a.pos : "";
var ret  = "";
if(code == 9 || code == 8 || txt.length == mask.replace(/[^#]+/g,'').length) return false;
// Loop na m�scara para aplicar os caracteres
for(var x=0,y=0, z=mask.length;x<z && y<txt.length;){
if(mask.charAt(x)!='#'){
ret += mask.charAt(x); x++; } 
else {
ret += txt.charAt(y); y++; x++; } }
// Retorno da fun��o
ret = (!r) ? ret : ret.reverse()	
w.value = pre+ret+pos; }
// Novo m�todo para o objeto 'String'
String.prototype.reverse = function(){
return this.split('').reverse().join(''); };
</script>

<script language="javascript">
function number_format( number, decimals, dec_point, thousands_sep ) {
var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
var d = dec_point == undefined ? "," : dec_point;
var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}
</script>

<script> 
function calcula(operacion){ 
var operando1 = parseFloat( document.calc.operando1.value.replace(/\./g, "").replace(",", ".") );
var operando2 = parseFloat( document.calc.operando2.value.replace(/\./g, "").replace(",", ".") );
var result = eval(operando1 + operacion + operando2);
document.calc.resultado.value = number_format(result,2, ',', '.');
} 
</script> 

<!-- FECHA MASCARA  -->

<?

  $sql = mysql_query("SELECT * FROM tabela_usuario where id_usuario='$id_usuario'");     
        $user = mysql_fetch_object($sql) ;
        
		
$sql_clientes = mysql_query("SELECT * FROM tabela_cliente Where tipo_cliente != '2' Order by nome");
			  
	if($user->tipo_usuario==2){
		
	
		
		$sql_clientes = mysql_query("SELECT * FROM tabela_cliente Where tipo_cliente != '2' and corretor='$user->id_usuario'  Order by nome");
	}
	
	while($clientes = mysql_fetch_object($sql_clientes)){
					
		if($clientes->nome!=""){
			
			if($lista_clientes==""){
				
				$lista_clientes = $lista_clientes.'"'.$clientes->nome .' | '. $clientes->telefone.' "';
			}else{
				$lista_clientes = $lista_clientes.',"'.$clientes->nome .' | '. $clientes->telefone.' "';
			}
		}
	

	}
	
	


?>

 
  <script>
  $( function() {
    var availablebairros2 = [ <? echo "$lista_clientes"; ?>

    ];
	

    $( "#nome_cliente" ).autocomplete({
      source: availablebairros2
    });
  } );
  </script>
  
  
  
  
  <!-- FECHA MASCARA  -->

<?


		
$sql_indicador = mysql_query("SELECT Distinct indicador FROM tabela_imovel Order by indicador");
	
	
	while($indicador = mysql_fetch_object($sql_indicador)){
					
		if($indicador->indicador!=""){
			
		$cliente_nome = utf8_encode ($indicador->indicador);
			if($lista_indicador==""){
				
				$lista_indicador = $lista_indicador.'"'.$indicador->indicador.'"';
			}else{
				$lista_indicador = $lista_indicador.',"'.$indicador->indicador .'"';
			}
		}
	
	}
	
?>

 
  <script>
  $( function() {
    var availablebairros3 = [ <? echo "$lista_indicador"; ?>

    ];
    $( "#indicador" ).autocomplete({
      source: availablebairros3
    });
  } );
  </script>
  
  
  
  
    <!-- SELCIONE O CLIENTE  -->



<script> 
 
function checkform ( form )
{
		

		 if (form.nome_cliente.value == "") {
			alert( "Selecione o cliente." );
			form.nome_cliente.focus();
			return false ;
			
		}
		
		if (form.nome_cliente.value.indexOf('|')==-1 ){
   		 alert("Selecione o cliente");
		 form.nome_cliente.focus();
		 return false ;
		}
			
			   return true
}

</script>
  
</head>
<body>



<div id="conteudo" class="conteudo">

<?

	include 'includes/header.php';

?>


    <main>
    
   
		<?
        
        $sql = mysql_query("SELECT * FROM tabela_usuario where id_usuario='$id_usuario'");     
        $user = mysql_fetch_object($sql) ;
        
        echo"<hr>";
        
        echo"<p>Ol&aacute;, ";
        echo"$user->nome. Bem-vindo ao sistema Colima.</p>";
        
        echo"<hr>";
        
        ?>

        <div class="destaques">
          
          <div>
          
          
          
        <?  
		
		if($user->tipo_usuario!=2){
			
			$sql_ultimos = mysql_query("SELECT * FROM tabela_imovel WHERE pendente='1' ORDER BY id_imovel DESC ");
			while($ultimos = mysql_fetch_object($sql_ultimos)){
				
			if($ultimos->pendente==1 and $user->tipo_usuario!=2){
				echo"<p class='link_excluir'><strong>STATUS: PENDENTE</strong></p>";
				echo"<h2>$ultimos->titulo - Refer&ecirc;ncia: $ultimos->id_imovel</h2>";
				echo"<p><a href='imovel.php?id_imovel=$ultimos->id_imovel'>Ver detalhes do im&oacute;vel </a></p>";
				echo"<p><a href='imovel.php?id_imovel=$ultimos->id_imovel&pendente=0'>Tirar o im&oacute;vel do status pendente?</a></p>";
				}
				
				
			}
			
		}
			?>
        
        
          </div>
          
          
            
            <h2 class="title_imoveis">Busca por im&oacute;veis</h2>
            <p>Utilize os filtros abaixo para encontrar im&oacute;veis cadastrados no site</p>
       
            
          <form action="busca_imovel.php" method="get"  name="f1" id="form1">
            
          <div class="destaque_esquerda">
          
            
            
            <p><strong>IM&Oacute;VEL:</strong></p>
            
            <p>
            
           
            <label for="codigo">Refer&ecirc;ncia: </label>
            <input type="text" name="codigo" id="codigo">
            
          
          </p>
          
                <p>
            
           
            <label for="referencia_antiga">Refer&ecirc;ncia Antiga: </label>
            <input type="text" name="referencia_antiga" id="referencia_antiga">
            
          
          </p>
          
                
             <p><strong>ENDERE&Ccedil;O</strong>:</p>
            <p>
            <label for="endereco">Endere&ccedil;o: </label>
            <input type="text" id="endereco" name="endereco" class="input_endereco"> 
            
            
            </p>
            
            <p>
            
            <label for="numero" class="label_menor">N&uacute;mero: </label>
            <input  name="numero" id="numero" class="input_numero" / >
            
            <label for="complemento" class="label_menor" >Complemento: </label>
            <input type="text"  name="complemento" id="complemento" class="input_data"/ >
            
            </p>
         
            
          <p>
            
             <label for="cidade" class="label_menor">Cidade: </label>
				<select name="cidade" id="cidade">
                 <option value="0" >Todos</option>

				<?
                $sql_cidade = mysql_query("SELECT distinct cidade FROM tabela_imovel order by cidade");
				while($cidade = mysql_fetch_object($sql_cidade)){
					
					echo"<option value='$cidade->cidade'>$cidade->cidade</option>";
				}
                ?>
				</select>
            
            </p>
            


         	<p>
          		<label for="bairros" class="align_top">Bairros: </label>
            	<select name="bairros[]"  multiple="multiple" id="bairros" class="bairros_box">
            
				 <?
				 $sp = utf8_encode ("S�o Paulo");
                  $sql_bairros = mysql_query("SELECT distinct bairro FROM tabela_imovel where cidade='$sp' Order by Bairro");
                    while($bairros = mysql_fetch_object($sql_bairros)){
                    echo"<option value='$bairros->bairro'>$bairros->bairro</option>";
                    }
                 ?>
                 
                 </select>
                     
            </p>
                
                
                 
          	<p>
            <label for="condominio" class="label_menor">Condom&iacute;nio/Edif&iacute;cio: </label>
            <input type="text"  name="condominio" id="condominio" / >
           	</p>
          
          	<p>
            <label for="edificio">Torre: </label>
            <input type="text"  name="edificio" id="edificio" / >
            </p>
          	<p>&nbsp;</p>
            
            
            
              <p><strong>PROPRIET&Aacute;RIO:</strong></p>
              
              
            
              
              <p>
            
             <label for="proprietario" class="label_menor">Propriet&aacute;rio: </label>
				<select name="proprietario" id="proprietario">
                 <option value="0" >Todos</option>

				<?
                $sql_clientes_proprietario = mysql_query("SELECT * FROM tabela_cliente WHERE tipo_cliente in(2,3) order by nome");
				while($clientes_proprietario = mysql_fetch_object($sql_clientes_proprietario)){
				
				$str =  $clientes_proprietario->telefone;
				$telefone_ajuste = replaceByPos($str, -4, '-');
					
					if($clientes_proprietario->id_cliente==$imovel->proprietario){
						echo"<option value='$clientes_proprietario->id_cliente' selected>$clientes_proprietario->nome - $telefone_ajuste </option>";	 
						}else{
						echo"<option value='$clientes_proprietario->id_cliente'>$clientes_proprietario->nome - $telefone_ajuste </option>";
						}
				}
                ?>
				</select>
            
            </p>
            
            
            
            </div>
            
            
            
            
             <div class="destaque_direita">
             
               <p><strong>CARACTER&Iacute;STICAS</strong>:</p>
              
              
              <p>
              
             <label for="negociacao">Negocia&ccedil;&atilde;o: </label>
            <select name="negociacao">
            <option value="0">Todos</option>
            <option value="1">Vender</option>
            <option value="2">Alugar</option>
            </select>
              </p>
              
              
                 <p>
             <label for="tipo">Tipo: </label>
           <select  name="tipo" id="tipo" onChange="muda_subtipo()">
				<option value="0" selected="selected">Todos</option>
                <option value="Apartamento">Apartamento</option>
				<option value="Casa">Casa</option>
				<option value="Comercial">Comercial</option>
				<option value="Rural">Rural</option>
			</select>
            
             <label for="subtipo" class="label_menor">Subtipo: </label>
			<select name="subtipo">
				<option value="Todos">Todos</option>
			</select>
          
          </p>
          
              
     
            
            
        
            
              <p>
                <label for="corretor">Corretor: </label>
				<select name="corretor">
				<option value="0" selected>Todos</option>
					
				  <?
			  $sql_usuarios = mysql_query("SELECT * FROM tabela_usuario Order by nome");
			  while($usuarios = mysql_fetch_object($sql_usuarios)){
				echo"<option value='$usuarios->id_usuario'>$usuarios->nome</option>";
				}
			 ?>
				</select>
            </p>
            
            <p>
            <label for="indicador">Indicador</label>
            <input type="text" id="indicador" name="indicador"   value="" class="input_endereco">
            </p>
            
            
              <p>
              
             <label for="fotos">Fotos: </label>
            <select name="fotos">
            <option value="0">Todos</option>
            <option value="1">Sim</option>
            <option value="2">N&atilde;o</option>
            </select>
              </p>
                
            <p>
             <label for="data_inicial">Cadastrado em: </label>
                 <?
 
	    

 echo" <select name='dia_inicio' id='dia_inicio'>";
 
  echo"<option value='0' selected='selected'>0</option>";
  
 $qual_dia_inicio = '1';
 
 while($qual_dia_inicio <='31'){
 echo"    <option value='$qual_dia_inicio'>$qual_dia_inicio</option>";
 $qual_dia_inicio++;
 }
 
 echo"  </select>";
  
  ?>
  
<?

 echo" <select name='mes_inicio' id='mes_inicio'>";
 
 $qual_mes_inicio = '1';
 
 while($qual_mes_inicio <='12'){
 
 if($qual_mes_inicio == $mes_atual){

 echo"    <option value='$qual_mes_inicio' selected='selected'>$qual_mes_inicio</option>";
 }
 else{
 echo"    <option value='$qual_mes_inicio'>$qual_mes_inicio</option>";
 }
 $qual_mes_inicio++;
 }
 
 echo"  </select>";
  
  ?>
<?

 echo" <select name='ano_inicio' id='ano_inicio'>";
 
 $qual_ano_inicio = $ano_atual;
 
 while($qual_ano_inicio >='2002'){
 
 if($qual_ano_inicio == $ano_atual){
 echo"    <option value='$qual_ano_inicio' selected='selected'>$qual_ano_inicio</option>";
 }
 else{
 echo"    <option value='$qual_ano_inicio'>$qual_ano_inicio</option>";
 }
 $qual_ano_inicio--;
 }
 
 echo"  </select>";
  
 
	  ?>
                
                 <br>
                 <label for="data_final">at&eacute;: </label>
                <?
 
	    

 echo" <select name='dia_termino' id='dia_termino'>";
 
 $qual_dia_termino = '1';
 
 while($qual_dia_termino <='31'){
 
 if($qual_dia_termino == $dia_atual){
 echo"    <option value='$qual_dia_termino' selected='selected'>$qual_dia_termino</option>";
 }
 else{
 echo"    <option value='$qual_dia_termino'>$qual_dia_termino</option>";
 }
 $qual_dia_termino++;
 }
 
 echo"  </select>";
  
  ?>
  
<?

 echo" <select name='mes_termino' id='mes_termino'>";
 
 $qual_mes_termino = '1';
 
 while($qual_mes_termino <='12'){
 
 if($qual_mes_termino == $mes_atual){

 echo"    <option value='$qual_mes_termino' selected='selected'>$qual_mes_termino</option>";
 }
 else{
 echo"    <option value='$qual_mes_termino'>$qual_mes_termino</option>";
 }
 $qual_mes_termino++;
 }
 
 echo"  </select>";
  
  ?>
<?

 echo" <select name='ano_termino' id='ano_termino'>";
 
 $qual_ano_termino = $ano_atual;
 
 while($qual_ano_termino >='2002'){
 
 if($qual_ano_termino == $ano_atual){
 echo"    <option value='$qual_ano_termino' selected='selected'>$qual_ano_termino</option>";
 }
 else{
 echo"    <option value='$qual_ano_termino'>$qual_ano_termino</option>";
 }
 $qual_ano_termino--;
 }
 
 echo"  </select>";
  
 
	  ?>
            </p>
                
                     <p>
                <label for="descritivo" class="label_menor"><strong>Palavras-chaves  </strong></label>
                <br>
                (Procure por uma palavra no texto descritivo):
		    </p>
                 
                 <p>
                <input type="text" id="descritivo" name="descritivo"   value="" class="input_endereco">
              </p>
                
                
                    
          <p>
                <label for="caracteristicas" class="label_menor"><strong> Caracter&iacute;sticas privadas e comun</strong></label>
                <br>
                (Separar por v&iacute;rgula. Exemplo: piscina, quadra):
		    </p>
                 
                 <p>
                <input type="text" id="caracteristicas" name="caracteristicas"   value="" class="input_endereco">
                
                 <label for="caracteristicas_eou"><strong>+ de uma 1 </strong></label>
            <select name="caracteristicas_eou">
            <option value="0">E</option>
            <option value="1">Ou</option>
            </select>
                
              </p>
                
                
                
                
         <p><strong>VALORES:</strong></p>
           	       <p>
           	         <label for="valor_inicial">Venda: </label>
           	         <input type="text"  value="" id="valor_inicial" name="valor_inicial" onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" class="valor_medio"> 
           	         
           	         <label for="valor_final" class="label_ate">at&eacute;: </label>
           	         <input type="text" value="" id="valor_final" name="valor_final" onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" class="valor_medio"> 
            </p>
            
            
               	       <p>
           	         <label for="valor_locacao_inicial">Loca&ccedil;&atilde;o: </label>
           	         <input type="text" value="" id="valor_locacao_inicial" name="valor_locacao_inicial" onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" class="valor_medio"> 
           	         
           	         <label for="valor_locacao_final" class="label_ate">at&eacute;: </label>
           	         <input type="text" value="" id="valor_locacao_final" name="valor_locacao_final" onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" class="valor_medio"> 
            </p>
            
              	       <p>
           	         <label for="metro_minimo">Metro quadrado: </label>
           	         <input type="text" value="" id="metro_minimo" name="metro_minimo" onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" class="valor_medio"> 
           	         
           	         <label for="metro_maximo" class="label_ate">at&eacute;: </label>
           	         <input type="text" value="" id="metro_maximo" name="metro_maximo" onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" class="valor_medio"> 
            </p>
            
            
              
           	       <p>
              	  <label for="iptu_inicial">IPTU: </label>
            	  <input type="text" value="" id="iptu_inicial" name="iptu_inicial" onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" class="valor_medio"> 
                
                <label for="iptu_final" class="label_ate">at&eacute;: </label>
             	 <input type="text" value="" id="iptu_final" name="iptu_final" onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" class="valor_medio"> 
            	</p>
            
            
			 
           	       <p>
              	  <label for="condominio_inicial">Condom&iacute;nio: </label>
            	  <input type="text" value="" id="condominio_inicial" name="condominio_inicial" onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" class="valor_medio"> 
                
                <label for="condominio_final" class="label_ate">at&eacute;: </label>
             	 <input type="text" value="" id="condominio_final" name="condominio_final" onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" class="valor_medio"> 
            	</p>
            
			         <p><strong>COMODOS:</strong></p>

             
               
                
                 <p>
            	<label for="quartos_minimo" >Quartos: </label>
            	<input type="text" id="quartos_minimo" name="quartos_minimo" class="valor_menor" value="">
              
               <label for="quartos_maximo"  class="label_menor">at&eacute;: </label>
                <input type="text" id="quartos_maximo" name="quartos_maximo"  class="valor_menor"  value="" >
                
                </p>
                <p>
                <label for="suites_minimo" >Su&iacute;tes: </label>
          	  	<input type="text" id="suites_minimo" name="suites_minimo" class="valor_menor"  value="">
                
                 <label for="suites_maximo"  class="label_menor">at&eacute;: </label>
                <input type="text" id="suites_maximo" name="suites_maximo"  class="valor_menor"  value="" >
                
                </p>
                
                
                <p>
                <label for="vagas_minimo"  >Vagas: </label>
           		<input type="text" id="vagas_minimo" name="vagas_minimo" class="valor_menor"  value="">
                
                <label for="vagas_maximo"  class="label_menor">at&eacute;: </label>
                <input type="text" id="vagas_maximo" name="vagas_maximo"  class="valor_menor"  value="" >
                
                </p>
               
               
                  
                	<p>
                <label for="area_util_minimo">&Aacute;rea &uacute;til: </label>
                <input type="text" id="area_util_minimo" name="area_util_minimo"  class="valor_menor" value="" >
                
                <label for="area_util_maximo"  class="label_menor">at&eacute;: </label>
                <input type="text" id="area_util_maximo" name="area_util_maximo"  class="valor_menor"  value="" >
                
                </p>
                
               
               
                
                	<p>
                <label for="habitese_minimo">Habite-se: </label>
                <input type="text" id="habitese_minimo" name="habitese_minimo"  class="valor_menor" value="" >
                
                <label for="habitese_maximo"  class="label_menor">at&eacute;: </label>
                <input type="text" id="habitese_maximo" name="habitese_maximo"  class="valor_menor"  value="" >
                
                </p>
                
                
                
                	<p>
               	<label for="andar" >Andar: </label>
            <input type="text"  name="andar" id="andar" class="input_data"/ >
                
                <label for="andar_maximo"  class="label_menor">at&eacute;: </label>
                <input type="text" id="andar_maximo" name="andar_maximo"  class="valor_menor"  value="" >
                
                </p>
                
               
               
                				
			
                
                <p><strong>OUTROS FILTROS</strong>:</p>
                
                   
       
          
                
                <p>
                 <label for="site">Site Colima: </label>
                  <select name="site" id="site">
                    <option value="">Todos</option>
                    <option value="0">N&atilde;o</option>
                    <option value="1" >Sim</option>
                  </select>
                
                </p>
                <p>
                  <label for="lancamento">Lan&ccedil;amento: </label>
                  <select name="lancamento" id="lancamento">
                    <option value="">Todos</option>
                    <option value="N">N&atilde;o</option>
                    <option value="S" >Sim</option>
                  </select>
                  
                  <label for="placa" >Placa: </label>
                  <select name="placa" id="placa">
                    <option value="">Todos</option>
                    <option value="N">N&atilde;o</option>
                    <option value="S" >Sim</option>
                  </select>
                </p>
                
                
                 <p>
                <label for="ativo">Ativo: </label>
				<select name="ativo" id="ativo">
                <option value="" >Todos</option>
                <option value="0" selected >Ativo</option>
				<option value="1" >Inativo</option>
                <option value="2" >Vendido</option>
                <option value="3" >Alugado</option>
                <option value="4" >Em negocia&ccedil;&atilde;o</option>
				</select>
                
                
                <label for="permuta" class="label_menor">Permuta: </label>
				<select name="permuta" id="permuta" type="text">
                <option value="">Todos</option>
				<option value="N">N&atilde;o</option>
                <option value="S" >Sim</option>
				</select>
                
                </p>
                
                
            
               
         <div class="link_cadastrar">
			
               <input type="submit" name="Submit" value="Buscar" class="botao" />
			  </div>
            </form>
        </div>
             
             </div>
            
            
            <?
			/////////////////////////////////////////////////////////////////
			////////////////////
			
			?>
            
            <div class="destaques">
            
            <div class="destaque_esquerda">
            
            
         
         
             <h2 class="title_clientes">Clientes compradores</h2>
			 <p>Veja informa&ccedil;&otilde;es e intera&ccedil;&otilde;es referente a um cliente espec&iacute;fico<strong> (fa&ccedil;a a busca sem acentos)</strong></p>
             
          
          
         <form name="formulario" method="get" action="meus_clientes.php"  onsubmit="return checkform(this);">
         
         
		 	
         
      <label for="nome_cliente">Cliente: </label>
				<input type="text" id="nome_cliente" name="nome_cliente"    class="input_endereco">

                
				<p>
              
                 <input type="submit" name="Submit" value="Ver dados Cliente" class="botao" />

                </p>
               </form>
               
                
                
                
                   
               
                 <?
			if($user->tipo_usuario=='2'){
				
				echo"<h3>Clientes com mais de 30 dias sem intera&ccedil;&atilde;o</h3>";
			$sql_clientes = mysql_query("SELECT * FROM tabela_cliente where ativo='0' and corretor='$user->id_usuario'");
			
				while($clientes = mysql_fetch_object($sql_clientes)){
					
			  		$sql_interacao_cliente = mysql_query("SELECT * FROM tabela_interacao_cliente where id_cliente='$clientes->id_cliente' order by data DESC limit 1");
					$interacao_cliente = mysql_fetch_object($sql_interacao_cliente);
					
						if($interacao_cliente !=""){
							
							if(strtotime ("+30 days", strtotime($interacao_cliente->data))  < strtotime($data_atual) ){
							echo"<p><strong>Cliente: $clientes->nome </strong><br> Data da &uacute;ltima intera&ccedil;&atilde;o: $interacao_cliente->data</p>";
							echo"<p>$interacao_cliente->observacao </p>";
							echo"<hr>";
							}
						}
						
					
				}
				
			}
			 ?>
            </div>
            
             <div class="destaque_direita">
             
            
                
             <h2 class="title_imoveis">Meus Favoritos</h2>
			 <p>Os im&oacute;veis que voc&ecirc; selecionou</p>
            
             <ul>
             <?
				  if ($_SESSION && $_SESSION['favoritos'] != null){
		  foreach($_SESSION['favoritos'] as $key => $value)
		  {
			$id_imovel = $_SESSION['favoritos'][$key];
			$sel = mysql_query("SELECT * FROM tabela_imovel WHERE id_imovel = '".$id_imovel."'");
			while($row = mysql_fetch_array($sel)){
			
			  
			  $sql_ultimos = mysql_query("SELECT * FROM tabela_imovel Where id_imovel='$row[id_imovel]'");
				$ultimos = mysql_fetch_object($sql_ultimos);
					
					echo"<li class='lista_caracteristica'><a href='imovel.php?id_imovel=$ultimos->id_imovel'>$ultimos->titulo - Ref.: $ultimos->id_imovel</a></li>";
				
				}
			}
				  }

			 ?>
             </ul>
             
           <p>  <a href="meus_favoritos.php">Ver todos os meus favoritos</a> </p>
             
              <p>&nbsp; </p>
             
               <h2 class="title_imoveis">Minhas Visitas</h2>
                <p>Pr&oacute;ximos compromissos agendados</p>
            
             <?
			 
			$sql_saida = mysql_query("SELECT * FROM tabela_saida Where id_usuario='$id_usuario' and data > '$data_atual'"); 
			while($saida = mysql_fetch_object($sql_saida)){
			  
			$sql_imovel_saida = mysql_query("SELECT * FROM tabela_imovel Where id_imovel='$saida->id_imovel'");
			$imovel_saida = mysql_fetch_object($sql_imovel_saida);
			
			
			$sql_proprietario_saida = mysql_query("SELECT * FROM tabela_cliente Where id_cliente='$imovel_saida->proprietario'");
			$proprietario_saida = mysql_fetch_object($sql_proprietario_saida);
			
			$sql_cliente_saida = mysql_query("SELECT * FROM tabela_cliente Where id_cliente='$saida->id_cliente'");
			$cliente_saida = mysql_fetch_object($sql_cliente_saida);
			
			$data_saida_explode = explode("-", $saida->data);
			$data_saida =  $data_saida_explode[2] .'/'.  $data_saida_explode[1] .'/'.  $data_saida_explode[0]; // 
			
			echo"<p><strong>Data: $data_saida";
			echo" - Hora: $saida->hora</strong></p>";
			echo"<p>Local: $imovel_saida->endereco, $imovel_saida->numero </p>";
			echo"<p>Proprietario: $proprietario_saida->nome</p>";
			echo"<p>Cliente: $cliente_saida->nome</p>";
			echo"<p>Observa��o: $saida->observacao</p>";
					
			echo"<p><a href='imovel.php?id_imovel=$imovel_saida->id_imovel'>$imovel_saida->titulo - Ref.: $imovel_saida->id_imovel</a></p>";
				
				
			}

			 ?>
             
             

          </div>
         
      </div>
      
     
     <div class="imoveis_home">
      
       <h2 class="border_baixo">&Uacute;ltimos  im&oacute;veis cadastrados</h2>

      <?
	  $sql_ultimos = mysql_query("SELECT * FROM tabela_imovel WHERE ativo='0' ORDER BY id_imovel DESC LIMIT 10");
		while($ultimos = mysql_fetch_object($sql_ultimos)){
			
		include 'includes/ultimos.php';
		
		}
	  ?>
      
   
          
          
          
      
           

      </div>
    
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
