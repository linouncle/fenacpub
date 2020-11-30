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
}
.dividi_linha{
	border-bottom:solid thin #333;
	padding: 5px 0 0;
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


		?>




        <div class="container">

			<div class="row">

                <div class="col">

					<h1><i class="fas fa-home"></i> Detalhes imóvel - Referência: <?php echo $imovel->acodigo .' - '.$imovel->id_imovel ?></h1>

				</div>

			</div>	

            <div class="row">

                <div class="col-md-8 bloco_cinza">

					<?php

						echo'<div class="container">';
							echo'<div class="row dividi_linha">';

								echo'<div class="col-md-6">';
									echo"<p><strong>Edifício:</strong> $imovel->edificio<br>";
									echo"<strong>Condominio:</strong> $imovel->empreendimento</p>";
								echo'</div>';

								echo'<div class="col-md-3 info_center">';
									echo"<p><strong>Construtora</strong><br>";
									echo"$imovel->construtora</p>";
								echo'</div>';


								echo'<div class="col-md-3 info_center">';
									echo"<strong>Estilo</strong><br>";
									echo"$imovel->estilo";
								echo'</div>';
							
							echo'</div>';


							echo'<div class="row dividi_linha">';

								echo'<div class="col-md-2 info_center">';
									echo"<p><strong>Habite-se</strong><br> $imovel->habitese</p>";
								echo'</div>';

								echo'<div class="col-md-2 info_center">';
									echo"<p><strong>Andares</strong><br> $imovel->andar_es</p>";
								echo'</div>';

								echo'<div class="col-md-2 info_center">';
									echo"<p><strong>Aps/andar</strong><br> $imovel->ap_andar</p>";
								echo'</div>';

								echo'<div class="col-md-3 info_center">';
									echo"<p><strong>Zelador/Porteiro</strong><br> $imovel->zelador</p>";
								echo'</div>';

								echo'<div class="col-md-3 info_center">';
									echo"<p><strong>Tel zelador</strong><br> $imovel->tel_zelador</p>";
								echo'</div>';

							echo'</div>';


							echo'<div class="row dividi_linha">';

								echo'<div class="col-md-2 info_center">';
									echo"<p><strong>Dormitórios</strong><br> $imovel->dormitorio</p>";
								echo'</div>';

								echo'<div class="col-md-2 info_center">';
									echo"<p><strong>Su&iacute;tes</strong><br> $imovel->suite</p>";
								echo'</div>';

								echo'<div class="col-md-2 info_center">';
									echo"<p><strong>Banheiros</strong><br> $imovel->banheiro</p>";
								echo'</div>';

								echo'<div class="col-md-2 info_center">';
									echo"<p><strong>Vagas</strong><br> $imovel->vagas</p>";
								echo'</div>';

								echo'<div class="col-md-2 info_center">';
									echo"<p><strong>&Aacute;rea &uacute;til </strong><br> $imovel->area_util</p>";
								echo'</div>';

								echo'<div class="col-md-2 info_center">';
									echo"<p><strong>&Aacute;rea total </strong><br> $imovel->area_total</p>";
								echo'</div>';


							echo'</div>';


							echo'<div class="row dividi_linha">';

								echo'<div class="col-md-12">';
								echo"<p><strong>Descrição</strong></p>";
									
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
						
						echo'</div>';




					?>

					

                </div>

				<div class="col-md-4">

					<?php

						echo'<div class="container">';
							echo'<div class="row dividi_linha">';

								echo'<div class="col-md-6">';
									echo"<p><strong>Data:</strong> $imovel->data<br>";
									echo"<strong>hora:</strong> $imovel->hora</p>";
									echo"<p><strong>Data alteração</strong>: $imovel->atualizado</p>";
								echo'</div>';

								echo'<div class="col-md-6">';
									echo"<p><strong>licença:</strong> $imovel->licenca_n<br>";
									echo"<strong>Em uso:</strong> $imovel->licensa</p>";
								echo'</div>';

							echo'</div>';

							echo'<div class="row dividi_linha">';

								echo'<div class="col">';
									echo"<p><strong>Proprietário:</strong> $imovel->proprietario<br>";
									echo"<strong>Telefone:</strong> $imovel->fone<br>";
									echo"<strong>Email:</strong> $imovel->email</p>";
								echo'</div>';

							echo'</div>';

							echo'<div class="row dividi_linha">';

								echo'<div class="col">';
									echo"<p><strong>Venda:</strong> $imovel->valor_venda<br>";
									echo"<strong>Metro2:</strong> $valor_metro<br>"; 
									echo"<strong>Locação:</strong> $imovel->valor_locacao<br>";
									echo"<strong>Condominio:</strong> $imovel->valor_condominio<br>";
									echo"<strong>IPTU:</strong> $imovel->iptu</p>";
								echo'</div>';

							echo'</div>';

						echo'</div>';

					?>

				</div>

            </div>


			<div class="row">

				<div class="col">


					<?php

					
					echo"<p><strong>Endereço</strong></p>";

					echo"<p> $imovel->logradouro $imovel->endereco, $imovel->numero - Unidade: $imovel->unidade - Andar: $imovel->andar_r - Bloco: $imovel->bloco - Bairro: $imovel->bairro / $imovel->cidade</p>";

					echo"<p>Logradouro: $imovel->logradouro</p>";
					echo"<p>Endereco: $imovel->endereco</p>";
					echo"<p>numero: $imovel->numero</p>";
					echo"<p>Unidade: $imovel->unidade</p>";
					echo"<p>Andar: $imovel->andar_r</p>";
					echo"<p>Bloco: $imovel->bloco</p>";
					echo"<p>Bairro: $imovel->bairro</p>";
					echo"<p>Cidade: $imovel->cidade</p>";

					?>

					<?php

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
								echo"<p>Subtipo: $imovel->subtipo</p>";
								echo"<p>Construtora: $imovel->construtora</p>";
								echo"<p>Estilo: $imovel->estilo</p>";
								echo"<p>Esquina: $imovel->esquina</p>";
								echo"<p>Imed: $imovel->imed</p>";


								echo"<h2>Caracteristicas</h2>";
								echo"<p>Habite-se: $imovel->habitese</p>";
								echo"<p>Idade: $imovel->idade</p>";
								echo"<p>Andar(total de andares)?: $imovel->andar_es</p>";
								echo"<p>AP por Andar: $imovel->ap_andar</p>";

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


								echo"<h2>Caracteristicas (linha 2)</h2>";
								echo"<p>Dormitório: $imovel->dormitorio</p>";
								echo"<p>Suítes: $imovel->suite</p>";
								echo"<p>Vagas: $imovel->vagas</p>";
								echo"<p>Area util: $imovel->area_util</p>";
								echo"<p>Area total: $imovel->area_total</p>";
								echo"<p>Banheiro: $imovel->banheiro</p>";
								echo"<p>Posição: $imovel->posicao</p>";
								echo"<p>Terraço: $imovel->terraco</p>";
								echo"<p>Closet: $imovel->closet</p>";
								echo"<p>Armário embutido: $imovel->armario_embitido</p>";
								echo"<p>3 R?: $imovel->jd</p>";
								
						
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
						
						
						
								
					
					

							
							
								$pieces = explode("-",  $imovel->data);
								
								echo"<p>Data de cadastro: $pieces[2]/$pieces[1]/$pieces[0]</p>";
								
								echo"<h3>Descrição</h3>";
							
								echo"<p>$imovel->descricao</p>";
								
							
								//
								echo"<h3>Detalhes condomínio</h3>";

								$sql_caracteristicas_imovel = mysql_query("SELECT * FROM  tabela_caracteristicas_imovel where id_imovel='$id_imovel'");
								while($caracteristicas_imovel = mysql_fetch_object($sql_caracteristicas_imovel)){

									$sql_caracteristicas = mysql_query("SELECT * FROM  tb_caracteristicas where id_caracteristicas='$caracteristicas_imovel->id_caracteristicas'");
									$caracteristicas= mysql_fetch_object($sql_caracteristicas);

									echo '<p>'.$caracteristicas->caracteristicas.'</p>';



								}




								//
								echo"<h3>Detalhes imóvel</h3>";

								$sql_detalhes_imovel = mysql_query("SELECT * FROM  tabela_detalhes_imovel where id_imovel='$id_imovel'");
								while($detalhes_imovel = mysql_fetch_object($sql_detalhes_imovel)){

									$sql_detalhes = mysql_query("SELECT * FROM  tb_detalhes where id_detalhes='$detalhes_imovel->id_detalhes'");
									$detalhes= mysql_fetch_object($sql_detalhes);

									echo '<p>'.$detalhes->detalhes.'</p>';



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
							
						///////////////
						echo"</div> ";	

					?>

				</div>	

			</div>

        </div>



        



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