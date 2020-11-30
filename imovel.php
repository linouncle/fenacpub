<?php
   
     session_start(); // sempre que usarmos as sessions devemos chamar esse codigo sempre no inicio do script

if(isset($_SESSION['login'])){// verifica se existe a varavel session

   $login=$_SESSION['login']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo
   
   $id_empresa=$_SESSION['id_empresa']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo



?>

<?php include 'includes/header.php';?>

<style>
.input_auto{
    width:auto;
}
.label_100{
    width:100px;
    text-align:right;
}
.label_center{
    text-align:center;
    width:100%;
}
.info_center{
    text-align:center;
    width:100%;
}
.bloco_cinza{
    background:#eee;
	padding:10px;
}
.dividi_linha{
/*	border-bottom:solid thin #333;
	padding: 5px 0 0; */
}
.col, 
.col-md-2, 
.col-md-3, 
.col-md-4, 
.col-md-6, 
.col-md-8,
.col-md-12{
    border:solid thin;
} 
.anula_borda {
	border:none !important;
}

</style>
   

		<?php
            
            $dia_atual = date("d");
            $mes_atual = date("m");
			$ano_atual = date("Y");
			
			//ID
			$id_imovel = $_GET['id_imovel'];

			$sql_imovel = mysql_query("SELECT * FROM tabela_imovel where id_imovel='$id_imovel'");
			$imovel = mysql_fetch_object($sql_imovel);



			$pieces = explode(",", $imovel->valor_venda);
			$preco = $pieces[0] ;
			$preco = str_replace(".", "", $preco);

			$valor_metro = $preco / $imovel->area_util;



			$sql_dolar= mysql_query("SELECT * FROM tabela_dolar");
			$dolar = mysql_fetch_object($sql_dolar);

			$valor_dolar = $preco / $dolar->dolar;



					if($imovel->habitese!=""){

						$ano_atual = date("Y");

							$idade = $ano_atual - $imovel->habitese;
	


					}



		?>

		<h1><i class="fas fa-home"></i> Detalhes imóvel - Referência: <?php echo $imovel->acodigo .' - '.$imovel->id_imovel.' / '.$imovel->bairro ?></h1>
		<? 
		echo '<p><a href="cadastro_imovel.php?id_imovel='.$imovel->id_imovel.'" class="btn btn-primary">Editar imóvel</a> <a href="cadastro_imovel.php?id_imovel='.$imovel->id_imovel.'&duplicar=sim" class="btn btn-primary">Duplicar imóvel</a> <a href="" class="btn btn-success">Whatsapp</a>  <a href="" class="btn btn-success">Email</a> </p> '; ?>




        <div class="container">

            <div class="row">

                <div class="col-md-8  bloco_cinza anula_borda">

					<?php

						echo'<div class="container">';
							echo'<div class="row dividi_linha">';

								echo'<div class="col-md-6">';
									echo"<strong>Edifício:</strong> $imovel->edificio /  $imovel->empreendimento<br>";
									echo"<strong>Torre:</strong>  $imovel->torre";
								echo'</div>';

								echo'<div class="col info_center">';
									echo"<strong>Construtora</strong><br>";
									echo"$imovel->construtora";
								echo'</div>';


								echo'<div class="col info_center">';
									echo"<strong>Estilo</strong><br>";
									echo"$imovel->estilo";
								echo'</div>';
							
							echo'</div>';


							echo'<div class="row dividi_linha">';

								echo'<div class="col info_center">';
									echo"<p><strong>Idade</strong><br> $idade</p>";
								echo'</div>';

								echo'<div class="col info_center">';
									echo"<p><strong>Andares</strong><br> $imovel->andar_es</p>";
								echo'</div>';

								echo'<div class="col info_center">';
									echo"<p><strong>Aps/andar</strong><br> $imovel->ap_andar</p>";
								echo'</div>';

								echo'<div class="col info_center">';
									echo"<p><strong>Porteiro</strong><br> $imovel->zelador</p>";
								echo'</div>';

								echo'<div class="col info_center">';
									echo"<p><strong>Tel port.</strong><br> $imovel->tel_zelador</p>";
								echo'</div>';

								echo'<div class="col info_center">';
									echo"<p><strong>Posição </strong><br> $imovel->posicao</p>";
								echo'</div>';

							echo'</div>';


							echo'<div class="row dividi_linha">';

								echo'<div class="col info_center">';
									echo"<p><strong>Dormitórios</strong><br> $imovel->dormitorio</p>";
								echo'</div>';

								echo'<div class="col info_center">';
									echo"<p><strong>Su&iacute;tes</strong><br> $imovel->suite</p>";
								echo'</div>';

								echo'<div class="col info_center">';
									echo"<p><strong>Banheiros</strong><br> $imovel->banheiro</p>";
								echo'</div>';

								echo'<div class="col info_center">';
									echo"<p><strong>Vagas</strong><br> $imovel->vagas</p>";
								echo'</div>';

								echo'<div class="col info_center">';
									echo"<p><strong>&Aacute;rea &uacute;til </strong><br> $imovel->area_util</p>";
								echo'</div>';

								echo'<div class="col info_center">';
									echo"<p><strong>&Aacute;rea total </strong><br> $imovel->area_total</p>";
								echo'</div>';

								


							echo'</div>';


							echo'<div class="row dividi_linha">';

								echo'<div class="col-md-12">';
								echo"<strong>Descrição:</strong>";
									
								echo"<p>$imovel->descricao</p>";
								echo'</div>';

							echo'</div>';


							echo'<div class="row dividi_linha">';

								echo'<div class="col-md-4">';
								echo"<p><strong>Indicador</strong><br> $imovel->indicador</p>";
								echo'</div>';

								echo'<div class="col-md-4">';
								echo"<p><strong>Promotor</strong><br> $imovel->promotor</p>";
								echo'</div>';

								echo'<div class="col-md-4">';
								echo"<p><strong>Corretor</strong><br> $imovel->corretor</p>";
								echo'</div>';

							echo'</div>';


							echo'<div class="row dividi_linha">';

								echo'<div class="col">';
									echo"<strong>Chave:</strong> $imovel->chave";
								echo'</div>';

								echo'<div class="col">';
									echo"<strong>Vago:</strong> $imovel->vago";
								echo'</div>';

							echo'</div>';
						
						echo'</div>';




					?>

					

                </div>

				<div class="col-md-4 anula_borda	">

					<?php

						echo'<div class="container">';


							echo'<div class="row dividi_linha">';

								echo'<div class="col">';
									echo"<strong>Referência:</strong> $imovel->acodigo - $imovel->id_imovel<br>";
								echo'</div>';
							echo'</div>';


							echo'<div class="row dividi_linha">';

								echo'<div class="col-md-6">';
									echo"<strong>Data:</strong> $imovel->data<br>";
								echo'</div>';

								echo'<div class="col-md-6">';
								echo"<strong>hora:</strong> $imovel->hora";
								echo'</div>';

							echo'</div>';

							echo'<div class="row dividi_linha">';

								echo'<div class="col-md-6">';
									echo"<strong>Alteração</strong>: $imovel->alteracao";
								echo'</div>';

								echo'<div class="col-md-6">';
									echo"<strong>Data alteração</strong>: $imovel->atualizado";
								echo'</div>';

							echo'</div>';

							echo'<div class="row dividi_linha">';

								echo'<div class="col bloco_endereco">';
									echo"<strong>Proprietário:</strong> $imovel->proprietario<br>";
									echo"<strong>Telefone:</strong> $imovel->fone<br>";
									echo"<strong>Email:</strong> $imovel->email";
								echo'</div>';

							echo'</div>';

							

							echo'<div class="row dividi_linha">';

								echo'<div class="col">';
									echo"<p><strong>Venda:</strong><br> $imovel->valor_venda<br>";

								echo'</div>';

							echo'</div>';

							echo'<div class="row dividi_linha">';

								echo'<div class="col">';
									echo"<strong>Metro<sup>2</sup>:<br></strong> $valor_metro<br>"; 
								echo'</div>';

								echo'<div class="col">';
									echo"<strong>Dolar:<br></strong> $valor_dolar<br>"; 
								echo'</div>';

							echo'</div>';

							echo'<div class="row dividi_linha">';



								echo'<div class="col">';
									echo"<strong>Locação:</strong><br> $imovel->valor_locacao<br>";
								echo'</div>';

							echo'</div>';


							echo'<div class="row dividi_linha">';

								echo'<div class="col">';
									echo"<strong>Condominio:<br></strong> $imovel->valor_condominio<br>";
								echo'</div>';

								echo'<div class="col">';
									echo"<strong>IPTU:<br></strong> $imovel->iptu</p>";
								echo'</div>';

							echo'</div>';

						echo'</div>';

					?>

				</div>

            </div>


			<div class="row">

				<div class="col-md-8 bloco_endereco">


					<?php

					
					echo"<p><strong>Endereço</strong></p>";

					echo"<p> $imovel->logradouro $imovel->endereco, $imovel->numero - Unidade: $imovel->unidade - Andar: $imovel->andar_r - Bloco: $imovel->bloco - Bairro: $imovel->bairro / $imovel->cidade</p>";

		

				echo "</div>";

				echo'<div class="col-md-4 bloco_endereco">';
				echo'Tipo<br>'.$imovel->tipo ;
				echo'<br>'.$imovel->subtipo ;

				echo "</div>";

			echo "</div>";


			echo'<div class="row">';
				echo'<div class="col">';
				echo"<p><strong>Fotos</strong></p>";
				echo "</div>";
			echo "</div>";

			echo'<div class="row">';
				
						$caminho_foto = 'img/';

						$tem_foto = 0;

						$select_foto1 = mysql_query("SELECT * FROM tb_imoveis_fotos Where id_imovel = '$imovel->id_imovel' Order By destaque desc, ordemfoto asc, id_foto asc");
						while($linha_foto1 = mysql_fetch_array($select_foto1)){

							$ID_foto1 = $linha_foto1["id_foto"];
							$foto_imovel1 = $linha_foto1["foto"];

							echo'<div class="col-md-2 fotos-galeria"><img src="';
							echo $caminho_foto.$foto_imovel1;
							echo'"></div>';

							$tem_foto = 1;

						}
				
			echo "</div>";
			echo'<div class="row">';	

						if($tem_foto == 1){
							echo '<col><p><a href="ordem_imovel_lino.php?id_imovel='.$imovel->id_imovel.'">Editar/Reorganizar fotos</a></p></col>';
						}

			echo "</div>";


			echo "<div class='row'>";

					echo'<div class="col-md-6">';
					
						//
						echo"<h3>Detalhes condomínio</h3>";

						$sql_caracteristicas_imovel = mysql_query("SELECT * FROM  tabela_caracteristicas_imovel where id_imovel='$id_imovel'");
						while($caracteristicas_imovel = mysql_fetch_object($sql_caracteristicas_imovel)){

							$sql_caracteristicas = mysql_query("SELECT * FROM  tb_caracteristicas where id_caracteristicas='$caracteristicas_imovel->id_caracteristicas'");
							$caracteristicas= mysql_fetch_object($sql_caracteristicas);

							echo '<p>'.$caracteristicas->caracteristicas.'</p>';



						}

					echo"</div>";

					echo'<div class="col-md-6">';



						//
						echo"<h3>Detalhes imóvel</h3>";

						$sql_detalhes_imovel = mysql_query("SELECT * FROM  tabela_detalhes_imovel where id_imovel='$id_imovel'");
						while($detalhes_imovel = mysql_fetch_object($sql_detalhes_imovel)){

							$sql_detalhes = mysql_query("SELECT * FROM  tb_detalhes where id_detalhes='$detalhes_imovel->id_detalhes'");
							$detalhes= mysql_fetch_object($sql_detalhes);

							echo '<p>'.$detalhes->detalhes.'</p>';



						}
				
			
				
				
						
					
			
		
			
			
					///////////////
					echo"</div> ";
					
				///////////////
				echo"</div> ";	

			?>


        </div>

		<?php
		//////////////
		//EXCLUIR ////
					
		if($user->tipo_usuario!=2){
		
		echo"<div class='link_cadastrar'>";
		echo"<p><a href='excluir_imovel.php?id_imovel=$id_imovel' class='link_excluir'>Excluir im&oacute;vel</a></p>";
		echo"<p>&nbsp;</p>";
		
		echo"</div> ";
		
		}


		?>



        



 <?php  include 'includes/footer.php';?>


 <?

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