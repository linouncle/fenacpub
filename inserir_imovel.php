<?php 
   
     session_start(); // sempre que usarmos as sessions devemos chamar esse codigo sempre no inicio do script

if(isset($_SESSION['login'])){// verifica se existe a varavel session

   $login=$_SESSION['login']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo
   
   $id_empresa=$_SESSION['id_empresa']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo



?>

<?php  include 'includes/header.php';?>


   

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


                //$sql = $conn->query("INSERT INTO tabela_imovel  (id_imovel, data, hora,  edificio, empreendimento, construtora, estilo, valor_venda, valor_locacao, valor_condominio, iptu, endereco, numero, unidade, andar_r, bloco, bairro, cidade, estado, proprietario, fone, email, habitese, andar_es, ap_andar, dormitorio, suite, area_util, area_total, banheiro, vagas, posicao, licenca_n, licensa, zelador, tel_zelador, chave_visita, vago, indicador, promotor, corretor, tipo, subtipo, descricao, torre) VALUES ('', '".$data_atual."', '".$hora_atual."', '".$edificio."',  '".$empreendimento."', '".$construtora."', '".$estilo."', '".$valor_venda."', '".$valor_locacao."', '".$valor_condominio."', '".$iptu."', '".$endereco."', '".$numero."', '".$unidade."', '".$andar_r."', '".$bloco."', '".$bairro."', '".$cidade."', '".$estado."','".$proprietario."', '".$fone."', '".$email."', '".$habitese."', '".$andar_es."', '".$ap_andar."', '".$dormitorio."', '".$suite."', '".$area_util."', '".$area_total."', '".$banheiro."',  '".$vagas."', '".$posicao."', '".$licenca_n."', '".$licensa."', '".$zelador."', '".$tel_zelador."',  '".$chave_visita."', '".$vago."', '".$indicador."', '".$promotor."', '".$corretor."', '".$tipo."', '".$subtipo."', '".$descricao."', '".$torre."')");
                //edificio esta com problemas
                
                $sql = $conn->query("INSERT INTO tabela_imovel  (id_imovel, data, hora,  empreendimento, construtora, estilo, valor_venda, valor_locacao, valor_condominio, iptu, endereco, numero, unidade, andar_r, bloco, bairro, cidade, estado, proprietario, fone, email, habitese, andar_es, ap_andar, dormitorio, suite, area_util, area_total, banheiro, vagas, posicao, licenca_n, licensa, zelador, tel_zelador, chave_visita, vago, indicador, promotor, corretor, tipo, subtipo, descricao, torre) VALUES ('', '".$data_atual."', '".$hora_atual."',   '".$empreendimento."', '".$construtora."', '".$estilo."', '".$valor_venda."', '".$valor_locacao."', '".$valor_condominio."', '".$iptu."', '".$endereco."', '".$numero."', '".$unidade."', '".$andar_r."', '".$bloco."', '".$bairro."', '".$cidade."', '".$estado."','".$proprietario."', '".$fone."', '".$email."', '".$habitese."', '".$andar_es."', '".$ap_andar."', '".$dormitorio."', '".$suite."', '".$area_util."', '".$area_total."', '".$banheiro."',  '".$vagas."', '".$posicao."', '".$licenca_n."', '".$licensa."', '".$zelador."', '".$tel_zelador."',  '".$chave_visita."', '".$vago."', '".$indicador."', '".$promotor."', '".$corretor."', '".$tipo."', '".$subtipo."', '".$descricao."', '".$torre."')");

                $sql_imovel = $conn->query("SELECT * FROM tabela_imovel  Order by id_imovel DESC LIMIT 1");
                        
                $imovel = $sql_imovel->fetch_object() ;

                $id_imovel = $imovel->id_imovel;

               
    

            }else{


                $update = $conn->query("UPDATE tabela_imovel SET
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

            $sql = $conn->query("INSERT INTO tabela_caracteristicas_imovel VALUES ('', '".$caracteristicas[$i]."', '".$id_imovel."')");

            for($i=0; $i<sizeof($caracteristicas); $i++){
                $query .= ($i+1!=sizeof($caracteristicas)) ? $caracteristicas[$i]."," : $caracteristicas[$i].")";
                
                $sql = $conn->query("INSERT INTO tabela_caracteristicas_imovel VALUES ('', '".$caracteristicas[$i]."', '".$id_imovel."')");
            
            }


            for($i=0; $i<sizeof($detalhes); $i++){
                $query .= ($i+1!=sizeof($detalhes)) ? $detalhes[$i]."," : $detalhes[$i].")";
                
                $sql = $conn->query("INSERT INTO tabela_detalhes_imovel VALUES ('', '".$detalhes[$i]."', '".$id_imovel."')");
            
            }



            //FOTOS				
				
                if($_FILES["arquivo"]["error"][0] == 0) {

                   // echo $_FILES["arquivo"]["error"] ;

                   // echo'oioioioioioioioioio';

                    foreach($_FILES["arquivo"]["tmp_name"] as $key=>$tmp_name) {
                        $file_name=$_FILES["arquivo"]["name"][$key];
                        $file_tmp=$_FILES["arquivo"]["tmp_name"][$key];
                        //$ext=pathinfo($file_name,PATHINFO_EXTENSION);
                        
    
                        //$update_chk = mysql_query("UPDATE tb_imoveis SET chk_foto='1' Where ID='$ID_imovel'",$con);
                        //$select_ultimoI = mysql_query("SELECT ID FROM tb_imoveis_fotos ORDER BY ID desc Limit 1",$con);
                        //$linha_ultimoI = mysql_fetch_array($select_ultimoI);
                        //$ID_foto = $linha_ultimoI["ID"];
                        //$ID_foto = $ID_foto + 1;		
                        $cod_nome = $hora_atual.'-'.$id_imovel.'-'.$bairro.'-'.$key;
    
                        //$ext = strtolower(substr($fotos['name'][$i],-4)); //Pegando extensão do arquivo
                        $ext = '.jpg';
                        $new_name = $cod_nome . $ext; //Definindo um novo nome para o arquivo
                        //$dir = '../pictures/novas_fotos/'; //Diretório para uploads
    
                        $fotoName = $new_name;	
                        
    
                               $insert_foto = $conn->query("INSERT INTO tb_imoveis_fotos (id_foto,id_imovel,foto) VALUES ('','$id_imovel','$fotoName')");
    
    
                                move_uploaded_file($file_tmp=$_FILES["arquivo"]["tmp_name"][$key],"img/".$fotoName);
    
                                
                            
                    }
                    
                }
							


		?>


        <div class="container">
            <div class="row">

                <div class="col">
                    <h1><i class="fas fa-home"></i> Detalhes imóvel</h1>


					<?php 

							$sql_imovel = $conn->query("SELECT * FROM tabela_imovel where id_imovel='$id_imovel'");
							$imovel = $sql_imovel->fetch_object();

							echo"<div class='imovel_home'>";
			
								////
								echo"<div class='texto_imovel_interna'>";
						
						
                                echo'<h2>Dados cadastrado com sucesso</h2>';
						
						
                                echo"<p>Novo id importação: $imovel->id_imovel</p>";
                            
                                echo"<p>Referencia: $imovel->acodigo</p>";

                                echo"<a href='imovel.php?id_imovel=$imovel->id_imovel' class='btn btn-primary'>Ver detalhes</a>";


							
								
								
								///////////////
								echo"</div> ";
								
							///////////////
							echo"</div> ";	


					?>

                </div>

            </div>
        </div>



        



 <?php   include 'includes/footer.php';?>


 <?php 

}
else
{
//exiba um alerta dizendo que a senha esta errada
?>

<script type="text/javascript">
alert("Por favor, efetue o login para acessar esse link")
</script>

<?php 
echo "<div align='center'>";
echo "<span class='style2'>Se voc&ecirc; j&aacute; tem cadastro volte a home e fa&ccedil;a login.<a href=index.php>VOLTAR A HOME</a></span>";
echo "</div>";
}
?>