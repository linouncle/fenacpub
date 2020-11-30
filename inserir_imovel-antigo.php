<?php
   
     session_start(); // sempre que usarmos as sessions devemos chamar esse codigo sempre no inicio do script

if(isset($_SESSION['login'])){// verifica se existe a varavel session

   $login=$_SESSION['login']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo
   
   $id_empresa=$_SESSION['id_empresa']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo



?>

<?php include 'includes/header.php';?>


   

		<?php
            
            $dia_atual = date("d");
            $mes_atual = date("m");
            $ano_atual = date("Y");

            $hora_atual = date("h:i");
            
            $data_atual = $ano_atual.'-'.$mes_atual.'-'.$dia_atual;
			
			//ID
            $id_imovel = $_POST['id_imovel'];


            //Valores
            $acodigo = $_POST['acodigo'];
            $data = $_POST['data'];
            $hora = $_POST['hora'];

            $tipo = $_POST['tipo'];

            $edificio = $_POST['edificio'];
            $empreendimento = $_POST['empreendimento'];
            $torre = $_POST['torre'];
            
            $construtora = $_POST['construtora'];
            $estilo = $_POST['estilo'];
            $esquina = $_POST['esquina'];
            $imed = $_POST['imed'];

            $valor_venda = $_POST['valor_venda'];
            $valor_locacao = $_POST['valor_locacao'];
            $valor_condominio = $_POST['valor_condominio'];
            $iptu = $_POST['iptu'];

            $endereco = $_POST['endereco'];
            $numero = $_POST['numero'];
            $unidade = $_POST['unidade'];
            $andar_r = $_POST['andar_r'];
            $bloco = $_POST['bloco'];
            $bairro = $_POST['bairro'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];

          
            $proprietario = $_POST['proprietario'];
            $fone = $_POST['fone'];
            $email = $_POST['email'];

            

            $habitese = $_POST['habitese'];

            if($habitese!=""){

                $ano_atual = date("Y");

                    $habitese = $ano_atual - $habitese;



            }


            $andar_es = $_POST['andar_es'];
            $ap_andar = $_POST['ap_andar'];

            $dormitorio = $_POST['dormitorio'];
            $suite = $_POST['suite'];
            $area_util = $_POST['area_util'];
            $area_total = $_POST['area_total'];
            $banheiro = $_POST['banheiro'];
            $vagas = $_POST['vagas'];
            $posicao = $_POST['posicao'];

            $licenca_n = $_POST['licenca_n'];
            $licensa = $_POST['licensa'];
            $zelador = $_POST['zelador'];
            $tel_zelador = $_POST['tel_zelador'];
            $chave_visita = $_POST['chave_visita'];
            $vago = $_POST['vago'];
            $indicador = $_POST['indicador'];
            $promotor = $_POST['promotor'];
            $corretor = $_POST['corretor'];

            $tipo = $_POST['tipo'];
            $subtipo = $_POST['subtipo'];

            $descricao = $_POST['descricao'];

            $caracteristicas=$_POST['caracteristicas'];
            $detalhes=$_POST['detalhes'];


            if($id_imovel==""){

                $sql = mysql_query("INSERT INTO tabela_imovel  (id_imovel, data, hora,  edificio, empreendimento, construtora, estilo, valor_venda, valor_locacao, valor_condominio, iptu, endereco, numero, unidade, andar_r, bloco, bairro, cidade, estado, proprietario, fone, email, habitese, andar_es, ap_andar, dormitorio, suite, area_util, area_total, banheiro, vagas, posicao, licenca_n, licensa, zelador, tel_zelador, chave_visita, vago, indicador, promotor, corretor, tipo, subtipo, descricao, torre) VALUES ('', '".$data_atual."', '".$hora_atual."', '".$edificio."',  '".$empreendimento."', '".$construtora."', '".$estilo."', '".$valor_venda."', '".$valor_locacao."', '".$valor_condominio."', '".$iptu."', '".$endereco."', '".$numero."', '".$unidade."', '".$andar_r."', '".$bloco."', '".$bairro."', '".$cidade."', '".$estado."','".$proprietario."', '".$fone."', '".$email."', '".$habitese."', '".$andar_es."', '".$ap_andar."', '".$dormitorio."', '".$suite."', '".$area_util."', '".$area_total."', '".$banheiro."',  '".$vagas."', '".$posicao."', '".$licenca_n."', '".$licensa."', '".$zelador."', '".$tel_zelador."',  '".$chave_visita."', '".$vago."', '".$indicador."', '".$promotor."', '".$corretor."', '".$tipo."', '".$subtipo."', '".$descricao."', '".$torre."')");


                $sql_imovel = mysql_query("SELECT * FROM tabela_imovel  Order by id_imovel DESC LIMIT 1");
                        
                $imovel = mysql_fetch_object($sql_imovel) ;

                $id_imovel = $imovel->id_imovel;

               
    

            }else{

                $update = mysql_query("UPDATE tabela_imovel SET
                edificio='$edificio',
                empreendimento='$empreendimento',
                construtora='$construtora',
                estilo='$estilo',
                valor_venda='$valor_venda',
                valor_condominio='$valor_condominio',
                valor_locacao='$valor_locacao',
                iptu='$iptu',
                endereco='$endereco',
                numero='$numero',
                unidade='$unidade',
                andar_r='$andar_r',
                bloco='$bloco',
                bairro='$bairro',
                cidade='$cidade',
                estado='$estado',
                proprietario='$proprietario',
                fone='$fone',
                email='$email',
                habitese='$habitese',
                andar_es='$andar_es',
                ap_andar='$ap_andar',
                dormitorio='$dormitorio',
                suite='$suite',
                area_util='$area_util',
                area_total='$area_total',
                banheiro='$banheiro',
                vagas='$vagas',
                posicao='$posicao',
                zelador='$zelador',
                tel_zelador='$tel_zelador',
                vago='$vago',
                indicador='$indicador',
                promotor='$promotor',
                corretor='$corretor',
                tipo='$tipo',
                subtipo='$subtipo',
                descricao='$descricao',
                torre='$torre'
                  Where id_imovel ='$id_imovel'");

            }


            //Caracteristicas

            $sql = mysql_query("INSERT INTO tabela_caracteristicas_imovel VALUES ('', '".$caracteristicas[$i]."', '".$id_imovel."')");

            for($i=0; $i<sizeof($caracteristicas); $i++){
                $query .= ($i+1!=sizeof($caracteristicas)) ? $caracteristicas[$i]."," : $caracteristicas[$i].")";
                
                $sql = mysql_query("INSERT INTO tabela_caracteristicas_imovel VALUES ('', '".$caracteristicas[$i]."', '".$id_imovel."')");
            
            }


            for($i=0; $i<sizeof($detalhes); $i++){
                $query .= ($i+1!=sizeof($detalhes)) ? $detalhes[$i]."," : $detalhes[$i].")";
                
                $sql = mysql_query("INSERT INTO tabela_detalhes_imovel VALUES ('', '".$detalhes[$i]."', '".$id_imovel."')");
            
            }



            //FOTOS				
				
                
				foreach($_FILES["arquivo"]["tmp_name"] as $key=>$tmp_name) {
					$file_name=$_FILES["arquivo"]["name"][$key];
					$file_tmp=$_FILES["arquivo"]["tmp_name"][$key];
                    //$ext=pathinfo($file_name,PATHINFO_EXTENSION);
                    

					//$update_chk = mysql_query("UPDATE tb_imoveis SET chk_foto='1' Where ID='$ID_imovel'",$con);
					//$select_ultimoI = mysql_query("SELECT ID FROM tb_imoveis_fotos ORDER BY ID desc Limit 1",$con);
					//$linha_ultimoI = mysql_fetch_array($select_ultimoI);
					//$ID_foto = $linha_ultimoI["ID"];
					//$ID_foto = $ID_foto + 1;		
					$cod_nome = $id_imovel.'-'.$bairro.'-'.$key;

					//$ext = strtolower(substr($fotos['name'][$i],-4)); //Pegando extensão do arquivo
					$ext = '.jpg';
					$new_name = $cod_nome . $ext; //Definindo um novo nome para o arquivo
					//$dir = '../pictures/novas_fotos/'; //Diretório para uploads

                    $fotoName = $new_name;	
                    

                           $insert_foto = mysql_query("INSERT INTO tb_imoveis_fotos (id_foto,id_imovel,foto) VALUES ('','$id_imovel','$fotoName')");


							move_uploaded_file($file_tmp=$_FILES["arquivo"]["tmp_name"][$key],"img/".$fotoName);

							
						
				}
							


		?>


        <div class="container">
            <div class="row">

                <div class="col">
                    <h1><i class="fas fa-home"></i> Detalhes imóvel</h1>


					<?php

							$sql_imovel = mysql_query("SELECT * FROM tabela_imovel where id_imovel='$id_imovel'");
							$imovel = mysql_fetch_object($sql_imovel);

							echo"<div class='imovel_home'>";
			
								////
                                echo"<div class='texto_imovel_interna'>";
                                
                                echo'<h2>Dados cadastrado com sucesso</h2>';
						
						
                                    echo"<p>Novo id importação: $imovel->id_imovel</p>";
                                
                                    echo"<p>Referencia: $imovel->acodigo</p>";

                                    echo"<a href='imovel.php?id_imovel=$imovel->id_imovel' class='btn btn-primary'>Ver detalhes</a>";




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
                            
                                    echo"<h2>Valores</h2>";
                                    echo"<p>Venda: $imovel->valor_venda</p>";
                                    echo"<p>Locação: $imovel->valor_locacao</p>";
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