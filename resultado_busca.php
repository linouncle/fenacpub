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

            $sai = $_POST['sai'];

            if($sai!=""){
                $filtro_ativo =  "  sai LIKE _utf8  '%$sai%' COLLATE utf8_unicode_ci";	
            }
            
            


            //Valores
            $acodigo = $_POST['acodigo'];
            if($acodigo!=""){
                $filtro = $filtro. " and acodigo IN ('$acodigo')";	
            }

            $data = $_POST['data'];
            if($data!=""){
                $filtro = $filtro. " and data = '$data'";		
            }

            $hora = $_POST['hora'];
            if($hora!=""){
                $filtro = $filtro. " and hora = '$hora'";		
            }

            $edificio = $_POST['edificio'];
            if($edificio!=""){
                $filtro = $filtro. " and edificio  LIKE _utf8  '%$edificio%' COLLATE utf8_unicode_ci";	
            }

            $empreendimento = $_POST['empreendimento'];
            if($empreendimento!=""){
                $filtro = $filtro. " and empreendimento  LIKE _utf8  '%$empreendimento%' COLLATE utf8_unicode_ci";	
            }
            
            $construtora = $_POST['construtora'];
            if($construtora!=""){
                $filtro = $filtro. " and construtora  LIKE _utf8  '%$construtora%' COLLATE utf8_unicode_ci";	
            }

            $estilo = $_POST['estilo'];
            if($estilo!=""){
                $filtro = $filtro. " and estilo  LIKE _utf8  '%$estilo%' COLLATE utf8_unicode_ci";	
            }

            $esquina = $_POST['esquina'];
            $imed = $_POST['imed'];

            $valor_venda = $_POST['valor_venda'];
            $valor_locacao = $_POST['valor_locacao'];
            $valor_condominio = $_POST['valor_condominio'];
            $iptu = $_POST['iptu'];


            //valor compra
            if($valor_inicial!="" or $valor_final!=""){
                
                if($valor_inicial=="" ){
                $filtro = $filtro. " and valor_venda BETWEEN '1' AND '$valor_final'";	
                
                }else if($valor_final=="" ){
                $filtro = $filtro. " and valor_venda >= '$valor_inicial'";	
                
                }else{
                $filtro = $filtro. " and valor_venda BETWEEN '$valor_inicial' AND '$valor_final'";	
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

            $endereco = $_POST['endereco'];
            if($endereco!=""){
                $filtro = $filtro. " and endereco LIKE _utf8  '%$endereco%' COLLATE utf8_unicode_ci";	
            }

            $numero = $_POST['numero'];
            if($numero!=""){
                $filtro = $filtro. " and numero = '$numero'";		
            }

            $unidade = $_POST['unidade'];
            if($unidade!=""){
                $filtro = $filtro. " and unidade = '$unidade'";		
            }

            $andar_r = $_POST['andar_r'];
            if($andar_r!=""){
                $filtro = $filtro. " and andar_r = '$andar_r'";		
            }

            $bloco = $_POST['bloco'];
            if($bloco!=""){
                $filtro = $filtro. " and bloco = '$bloco'";		
            }

            $bairro = $_POST['bairro'];
            if($bairro!=""){
                $filtro = $filtro. " and bairro = '$bairro'";		
            }

            $cidade = $_POST['cidade'];
            if($cidade!=""){
                $filtro = $filtro. " and cidade = '$cidade'";		
            }

            $estado = $_POST['estado'];
            if($estado!=""){
                $filtro = $filtro. " and estado = '$estado'";		
            }
          
            $proprietario = $_POST['proprietario'];
            if($proprietario!=""){
                $filtro = $filtro. " and proprietario LIKE _utf8  '%$proprietario%' COLLATE utf8_unicode_ci";	
            }

            $fone = $_POST['fone'];
            if($fone!=""){
                $filtro = $filtro. " and fone LIKE _utf8  '%$fone%' COLLATE utf8_unicode_ci";	
            }

            $email = $_POST['email'];
            if($email!=""){
                $filtro = $filtro. " and email LIKE _utf8  '%$email%' COLLATE utf8_unicode_ci";	
            }

            

            $habitese = $_POST['habitese'];
            if($habitese!=""){
                $filtro = $filtro. " and habitese = '$habitese'";		
            }

            $andar_es = $_POST['andar_es'];
            if($andar_es!=""){
                $filtro = $filtro. " and andar_es = '$andar_es'";		
            }

            $ap_andar = $_POST['ap_andar'];
            if($ap_andar!=""){
                $filtro = $filtro. " and ap_andar = '$ap_andar'";		
            }

            $area_util_minimo = $_POST['area_util_minimo'];
            $area_util_maximo = $_POST['area_util_maximo'];

            $area_total_minimo = $_POST['area_total_minimo'];
            $area_total_maximo = $_POST['area_total_maximo'];

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


            $dormitorio_minimo = $_POST['dormitorio_minimo'];
            $dormitorio_maximo = $_POST['dormitorio_maximo'];

            //dormitorio
            if($dormitorio_minimo!="" or $dormitorio_maximo!=""){
                
                if($dormitorio_minimo=="" ){
                $filtro = $filtro. " and dormitorio  BETWEEN '1' AND '$dormitorio_maximo'";	
                
                }else if($dormitorio_maximo=="" ){
                $filtro = $filtro. " and dormitorio >= '$dormitorio_minimo'";	
                
                }else{
                $filtro = $filtro. " and dormitorio  BETWEEN '$dormitorio_minimo' AND '$dormitorio_maximo'";	
                }
                
            }
    
            $suite_minimo = $_POST['suite_minimo'];
            $suite_maximo = $_POST['suite_maximo'];

            //suite
            if($suite_minimo!="" or $suite_maximo!=""){
                
                if($suite_minimo=="" ){
                $filtro = $filtro. " and suite  BETWEEN '1' AND '$suite_maximo'";	
                
                }else if($suite_maximo=="" ){
                $filtro = $filtro. " and suite >= '$suite_minimo'";	
                
                }else{
                $filtro = $filtro. " and suite  BETWEEN '$suite_minimo' AND '$suite_maximo'";	
                }
                
            }
            
            $banheiro_minimo = $_POST['banheiro_minimo'];
            $banheiro_maximo = $_POST['banheiro_maximo'];

            //banheiro
            if($banheiro_minimo!="" or $banheiro_maximo!=""){
                
                if($banheiro_minimo=="" ){
                $filtro = $filtro. " and banheiro  BETWEEN '1' AND '$banheiro_maximo'";	
                
                }else if($banheiro_maximo=="" ){
                $filtro = $filtro. " and banheiro >= '$banheiro_minimo'";	
                
                }else{
                $filtro = $filtro. " and banheiro  BETWEEN '$banheiro_minimo' AND '$banheiro_maximo'";	
                }
                
            }
            $vaga_minimo = $_POST['vaga_minimo'];
            $vaga_maximo = $_POST['vaga_maximo'];

            //vaga
            if($vaga_minimo!="" or $vaga_maximo!=""){
                
                if($vaga_minimo=="" ){
                $filtro = $filtro. " and vagas  BETWEEN '1' AND '$vaga_maximo'";	
                
                }else if($vaga_maximo=="" ){
                $filtro = $filtro. " and vagas >= '$vaga_minimo'";	
                
                }else{
                $filtro = $filtro. " and vagas  BETWEEN '$vaga_minimo' AND '$vaga_maximo'";	
                }
                
            }

            $posicao = $_POST['posicao'];
            if($posicao!=""){
                $filtro = $filtro. " and posicao = '$posicao'";		
            }

            $licenca_n = $_POST['licenca_n'];
            if($licenca_n!=""){
                $filtro = $filtro. " and licenca_n = '$licenca_n'";		
            }

            $licensa = $_POST['licensa'];
            if($licensa!=""){
                $filtro = $filtro. " and licensa = '$licensa'";		
            }

            $zelador = $_POST['zelador'];
            if($zelador!=""){
                $filtro = $filtro. " and zelador = '$zelador'";		
            }

            $tel_zelador = $_POST['tel_zelador'];
            if($zelador!=""){
                $filtro = $filtro. " and tel_zelador LIKE _utf8  '%$tel_zelador%' COLLATE utf8_unicode_ci";		
            }

            $chave_visita = $_POST['chave_visita'];
            if($chave_visita!=""){
                $filtro = $filtro. " and chave_visita = '$chave_visita'";		
            }

            $vago = $_POST['vago'];
            if($vago!=""){
                $filtro = $filtro. " and vago = '$vago'";		
            }

            $indicador = $_POST['indicador'];
            if($indicador!=""){
                $filtro = $filtro. " and indicador LIKE _utf8  '%$indicador%' COLLATE utf8_unicode_ci";		
            }

            $promotor = $_POST['promotor'];
            if($promotor!=""){
                $filtro = $filtro. " and promotor LIKE _utf8  '%$promotor%' COLLATE utf8_unicode_ci";		
            }

            $corretor = $_POST['corretor'];
            if($corretor!=""){
                $filtro = $filtro. " and corretor LIKE _utf8  '%$corretor%' COLLATE utf8_unicode_ci";		
            }

            $tipo = $_POST['tipo'];
            if($tipo!=""){
               // $filtro = $filtro. " and tipo = '$tipo'";		
            }

            $subtipo = $_POST['subtipo'];
            if($subtipo!=""){
              //  $filtro = $filtro. " and subtipo = '$subtipo'";		
            }

            $descricao = $_POST['descricao'];
            if($descricao!=""){
                $filtro = $filtro. " and descricao LIKE _utf8  '%$descricao%' COLLATE utf8_unicode_ci";		
            }

            $caracteristicas=$_POST['caracteristicas'];
            $detalhes=$_POST['detalhes'];

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

            if($filtro==""){
                $filtro=$_GET['filtro'];
            }
            if($filtro_ativo==""){
                $sai =  $filtro_ativo;
                $filtro_ativo =  "  sai LIKE _utf8  '%$filtro_ativo%' COLLATE utf8_unicode_ci";	              	
            }


              ////PAGINACAO

                $busca = mysql_real_escape_string($_GET['filtro']);
                // ============================================
                // Registros por p�gina
                $por_pagina = 20;
                // Monta a consulta MySQL para saber quantos registros ser�o encontrados

                $sql = "SELECT COUNT(*) AS total FROM tabela_imovel WHERE $filtro_ativo $filtro ";



		?>


        <div class="container">
            <div class="row">

                <div class="col">
                    <h1><i class="fas fa-home"></i> Resultado busca</h1>


                    <?php

                    	
                        // Executa a consulta
                        $query = mysql_query($sql);
                        // Salva o valor da coluna 'total', do primeiro registro encontrado pela consulta
                        $total = mysql_result($query, 0, 'total');
                        // Calcula o m�ximo de paginas
                        $paginas =  (($total % $por_pagina) > 0) ? (int)($total / $por_pagina) + 1 : ($total / $por_pagina);
                        // ============================================
                        if (isset($_GET['pagina'])) {
                        $pagina = (int)$_GET['pagina'];
                        } else {
                        $pagina = 1;
                        }
                        $pagina = max(min($paginas, $pagina), 1);
                        $offset = ($pagina - 1) * $por_pagina;
                        // ============================================
                        // Monta outra consulta MySQL, agora a que far� a busca com pagina��o
                        $sql = "SELECT * FROM tabela_imovel WHERE $filtro_ativo $filtro ORDER BY `id_imovel` LIMIT {$offset}, {$por_pagina}";

                        echo $sql;

                        $sql_imovel = mysql_query($sql);
                        
                        while($imovel = mysql_fetch_object($sql_imovel) ){

                            echo'<div class="container bloco_lista ">';
                                echo'<div class="row ">';
                                    
                                    echo'<div class="col-md-4 ">';

                                        $sql_foto = mysql_query("SELECT * FROM tb_imoveis_fotos WHERE id_imovel ='$imovel->id_imovel'  Order by destaque ");
                                
                                        $foto = mysql_fetch_object($sql_foto);

                                        if($foto!=""){
                                            echo"<img src='img/$foto->foto'>";
                                        }

                                    echo'</div>';

                                    echo'<div class="col-md-8 ">';
                                
                                        echo"<h2>Bairro: $imovel->bairro</h2>";
                                        echo"<h3>Venda: $imovel->valor_venda</h3>";
                                        echo"<h3>Locação: $imovel->valor_locacao</h3>";

                                        echo"<p>Referencia: $imovel->acodigo - Novo id importação: $imovel->id_imovel</p>";
                                        echo"<p>Edifício: $imovel->edificio";
                                        echo" - Condominio: $imovel->empreendimento</p>";
                                        echo"<p>Tipo: $imovel->tipo</p>";
                                    
                                        echo"$imovel->logradouro";
                                        echo"$imovel->endereco , ";
                                        echo"$imovel->numero ";
                                        echo" - Unidade: $imovel->unidade";
                                        echo" - Andar: $imovel->andar_r";
                                        echo" - Bloco: $imovel->bloco</p>";
                                        echo"<p>Bairro: $imovel->bairro</p>";
                                        echo"<p>Cidade: $imovel->cidade</p>";

                                        echo"<p><a href='imovel.php?id_imovel=$imovel->id_imovel' class='btn btn-success'> Ver detalhes</a></p>";

                                    echo'</div>';

                                echo'</div>';


                            echo'</div>';

                        }


                        if ($total > 0) {
                            for ($n = 1; $n <= $paginas; $n++) {
                                
                                if($filtro=="" or $filtro==" "){
                                    //
                                    if($pagina==$n){
                                     echo "<strong>{$n}</strong>";
                                    }else{
                                          echo "<a href='resultado_busca.php?filtro_ativo=$sai&fotos=$fotos&ativo=$ativo&caracteristicas=$sele_caracteristicas&caracteristicas_eou=$caracteristicas_eou&corretor=$id_corretor&pagina={$n}' class='link_paginacao'>{$n}</a>";
                                    }
                                    //
                                }else{
                          
                                    if($pagina==$n){
                                        echo "<strong>{$n}</strong>";
                                    }else{
                                        echo "<a href='resultado_busca.php?filtro=$filtro&filtro_ativo=$sai&fotos=$fotos&ativo=$ativo&caracteristicas=$sele_caracteristicas&caracteristicas_eou=$caracteristicas_eou&corretor=$id_corretor&pagina={$n}' class='link_paginacao'>{$n}</a>";
                                    }
                                }	
                            }
                            
                          }
                    


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