<?php 
   
     session_start(); // sempre que usarmos as sessions devemos chamar esse codigo sempre no inicio do script

if(isset($_SESSION['login'])){// verifica se existe a varavel session

   $login=$_SESSION['login']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo
   
   $id_usuario=$_SESSION['id_usuario']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo


   include 'includes/header.php';

    $dia_atual = date("d");
    $mes_atual = date("m");
    $ano_atual = date("Y");




?>




        
        <h1><i class="fas fa-home"></i> Busca imóvel</h1>

        <form action="resultado_busca.php" method="post" name="form1" id="form1" onSubmit="return checkform(this);">

                        
            <div class="container">
                <div class="row">

                        
                
            
                            <div class="col-md-7">


                                    <h2 class="tarja_titulo">Endereço</h2>

                                    <div class="container">


                                    <div class="row">

                                        <div class="col">
                                        <label for="endereco">Endere&ccedil;o*: </label><br>
                                        <input id="endereco" name="endereco" class="input_endereco" value="" >
                                        </div>

                                    </div>  

                                    <div class="row">

                                            <div class="col-md-3">
                                            <label for="cep">CEP*:</label> <br>
                                            <input type="text" name="cep" id="cep" value="" />
                                            </div>

                                            <div class="col-md-3">
                                            <label for="estado" class="label_auto">Estado* (SP): </label>
                                            <input type="text" name="estado" id="estado" value="" maxlength="2"  />
                                            </div>

                                            <div class="col-md-3">
                                            <label for="cidade" >Cidade*: </label>
                                            <input type="text" name="cidade" id="cidade" value=""  />
                                            </div>

                                            <div class="col-md-3">
                                            <label for="bairro">Bairro*: </label>
                                            <input type="text" name="bairro" id="bairro" value=""  />
                                            </div>


                                        </div>


                                        <div class="row">

                                            <div class="col-md-3">
                                            <label for="numero" class="label_menor">N&uacute;mero*: </label>
                                            <input  name="numero" id="numero" class="input_numero"  value="" >
                                            </div>

                                            <div class="col-md-3">
                                            <label for="unidade" class="label_menor">Unidade: </label>
                                            <input type="text"  name="unidade" id="unidade"  value="" >
                                            </div>

                                            <div class="col-md-3">
                                            <label for="unidade" class="label_menor">Andar: </label>
                                            <input type="text"  name="unidade" id="unidade"  value="">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="unidade" class="label_menor">Bloco: </label>
                                            <input type="text"  name="unidade" id="unidade"  value="" >
                                            </div>

                                        </div>

                                       

                                        <div class="row">


                                            <div class="col-md-3">
                                            <label for="condominio" class="label_auto">Condom&iacute;nio: </label>
                                            <input type="text"  name="condominio" id="condominio"  value=""   >
                                            </div>

                                            <div class="col-md-3">
                                            <label for="edificio">Edif&iacute;cio: </label>
                                            <input type="text"  name="edificio" id="edificio" value=""  >
                                            </div>

                                            <div class="col-md-3">
                                            <label for="construtora" >Construtora: </label>
                                            <input type="text" name="construtora" id="construtora" value=""  />
                                            </div>

                                            <div class="col-md-3">
                                            <label for="estilo">Estilo: </label>
                                            <input type="text" name="estilo" id="estilo" value=""  />
                                            </div>


                                        </div>



                                    </div>

                                    <h2 class="tarja_titulo">Características</h2>

                                    <div class="container">

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label for="area_util_minimo" id="area_util_label">&Aacute;rea &uacute;til </label>
                                                <input type="text" id="area_util_minimo" name="area_util_minimo"  value="" >
                                            </div>

                                            <div class="col-md-3">
                                                <label for="area_util_maximo" id="area_util_label">Até </label>
                                                <input type="text" id="area_util_maximo" name="area_util_maximo"  value="" >
                                            </div>

                                            <div class="col-md-3">
                                                <label for="area_total_minimo" id="area_util_label">&Aacute;rea total </label>
                                                <input type="text" id="area_total_minimo" name="area_total_minimo"  value="" >
                                            </div>

                                            <div class="col-md-3">
                                                <label for="area_total_maximo" id="area_util_label">Até </label>
                                                <input type="text" id="area_total_maximo" name="area_total_maximo"  value="" >
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label for="dormitorio_minimo" id="area_util_label">Dormitórios </label>
                                                <input type="text" id="dormitorio_minimo" name="dormitorio_minimo"  value="" >
                                            </div>

                                            <div class="col-md-3">
                                                <label for="dormitorio_maximo" id="area_util_label">Até </label>
                                                <input type="text" id="dormitorio_maximo" name="dormitorio_maximo"  value="" >
                                            </div>

                                            <div class="col-md-3">
                                                <label for="suite_minimo" id="area_util_label">Suítes </label>
                                                <input type="text" id="suite_minimo" name="suite_minimo"  value="" >
                                            </div>

                                            <div class="col-md-3">
                                                <label for="suite_maximo" id="area_util_label">Até </label>
                                                <input type="text" id="suite_maximo" name="suite_maximo"  value="" >
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label for="banheiro_minimo" id="area_util_label">Banheiros </label>
                                                <input type="text" id="banheiro_minimo" name="banheiro_minimo"  value="" >
                                            </div>

                                            <div class="col-md-3">
                                                <label for="banheiro_maximo" id="area_util_label">Até </label>
                                                <input type="text" id="banheiro_maximo" name="banheiro_maximo"  value="" >
                                            </div>

                                            <div class="col-md-3">
                                                <label for="vaga_minimo" id="area_util_label">Vagas </label>
                                                <input type="text" id="vaga_minimo" name="vaga_minimo"  value="" >
                                            </div>

                                            <div class="col-md-3">
                                                <label for="vaga_maximo" id="area_util_label">Até </label>
                                                <input type="text" id="vaga_maximo" name="vaga_maximo"  value="" >
                                            </div>

                                        </div>

                                       

                                        <div class="row">

                                            <div class="col-md-2">
                                            <label for="habitese" >Habite-se </label>
                                            <input type="text" id="habitese" name="habitese" class="valor_menor"  value="">
                                            </div>

                                            <div class="col-md-2">
                                            <label for="andares" class="label_menor" id="label_suites" >Andares </label>
                                            <input type="text" id="suites" name="andares" class="valor_menor"  value="">
                                            </div>

                                            <div class="col-md-2">
                                            <label for="por_andar" class="label_menor">Aps/andar </label>
                                            <input type="text" id="por_andar" name="por_andar" class="valor_menor"  value="">
                                            </div>

                                            <div class="col-md-2">
                                            <label for="vagas" class="label_menor">Vagas </label>
                                            <input type="text" id="vagas" name="vagas" class="valor_menor"  value="">
                                            </div>

                                            <div class="col-md-2">
                                            <label for="posicao" class="label_menor">Posição </label>
                                            <input type="text" id="posicao" name="posicao" class="valor_menor"  value="">
                                            </div>

                                            <div class="col-md-2">
                                            <label for="licencas" class="label_menor">Licençsas </label>
                                            <input type="text" id="licencas" name="licencas" class="valor_menor"  value="">
                                            </div>

                                        </div> 

                                    </div>    

                                    <h2 class="tarja_titulo">Outros dados</h2>

                                    <div class="container">

                                        <div class="row">

                                            <div class="col-md-3">
                                            <label for="corretor" class="label_menor" >Corretor </label>
                                            <input type="text" id="corretor" name="corretor" class="valor_menor" value="">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="indicador" class="label_menor" id="label_suites" >Indicador </label>
                                            <input type="text" id="indicador" name="indicador" class="valor_menor"  value="">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="promotor" class="label_menor">Promotor</label>
                                            <input type="text" id="promotor" name="promotor" class="valor_menor"  value="">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="emuso" class="label_menor">Em uso </label>
                                            <input type="text" id="emuso" name="emuso" class="valor_menor"  value="">
                                            </div>

                                            

                                        </div>


                                        <div class="row">

                                            <div class="col-md-3">
                                            <label for="zelador" >Zelador: </label>
                                            <input type="text" id="zelador" name="zelador" class="valor_menor"  value="">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="fone_zelador" class="label_menor" id="label_suites" >Fone zelador: </label>
                                            <input type="text" id="fone_zelador" name="fone_zelador" class="valor_menor"  value="">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="vago" class="label_menor">Vago: </label>
                                            <input type="text" id="vago" name="vago" class="valor_menor"  value="">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="chave" class="label_menor">Chave visita </label>
                                            <input type="text" id="chave" name="chave" class="valor_menor"  value="">
                                            </div>

                                        </div>  

                                    </div>   

                                
                        
                            </div>

                            <div class="col-md-5">

                                <h2 class="tarja_titulo">Negociação e tipo</h2>

                                <div class="container">

                                    <div class="row">

                                            <div class="col">
                                                <label for="negociacao">Negocia&ccedil;&atilde;o: </label><br>
                                                <select id="negociacao" name="negociacao">
                                                <option value="1" >Vender</option>
                                                <option value="2" >Alugar</option>
                                                <option value="3" >Vender e Alugar</option>
                                                
                                                </select>
                                            </div> 

                                            <div class="col">
                                                <label for="sai">Altera&ccedil;&atilde;o: </label><br>
                                                <select id="sai" name="sai" >
                                                <option value="Ativo"  >Ativo</option>
                                                <option value="Nv Preço Ativo" >Nv Preço Ativo</option>
                                                <option value="Vendido Baixa" >Vendido Baixa</option>
                                                <option value="Duplicata Baixa" >Duplicata Baixa</option>
                                                <option value="Proposta Ativo"  >Proposta Ativo</option>
                                                <option value="Proposta Baixa"  >Proposta Baixa</option>
                                                <option value="NV Tel Ativo" >NV Tel Ativo</option>
                                                <option value="Locado Baixa"  >Locado Baixa</option>
                                                <option value="V S Temp Ativo"  >V S Temp Ativo</option>
                                                <option value="V S Def Baixa" >V S Def Baixa</option>
                                                <option value="Antiga Baixa" >Antiga Baixa</option>
                                                <option value="Promocao"  >Promocao</option>
                                                <option value="Baixa Nova"  >Baixa Nova</option>
                                                </select>
                                            </div> 

                                        </div>

                                        <div class="row">    

                                            <div class="col-md-6">
                                                <label for="tipo">Tipo imóvel: </label>
                                                <select  name="tipo" id="tipo" onChange="muda_subtipo()">
                                                <option value="0" selected="selected">Selecione</option>
                                                <option value="Apartamento"  >Apartamento</option>
                                                <option value="Casa"		>Casa</option>
                                                <option value="Comercial" 	>Comercial</option>
                                                <option value="Terreno" 	 >Terreno</option>
                                                <option value="Rural" 		 >Rural</option>
                                                </select>
                                            </div> 


                                            <div class="col-md-6">
                                                <label for="subtipo">Subtipo: </label>
                                                <select name="subtipo">
                                                <option value="Todos">Todos</option>
                                                </select>
                                            </div> 

                                    </div>         

                                </div>   
                            
                                <h2 class="tarja_titulo">Valores</h2>

                                <div class="container">

                                    <div class="row">

                                        <div class="col-md-6">
                                        <label for="valor_inicial" class="label_menor">Venda: </label>
                                        <input type="text" min="0"   id="valor_inicial" name="valor_inicial"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl"  > 
                                        </div>

                                        <div class="col-md-6">
                                        <label for="valor_final" class="label_menor">até: </label>
                                        <input type="text" min="0"   id="valor_final" name="valor_final"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl"  > 
                                        </div>

                                    </div>  

                                    <div class="row">

                                    <div class="col-md-6">
                                        <label for="valor_locacao_inicial" class="label_menor">Venda: </label>
                                        <input type="text" min="0"   id="valor_locacao_inicial" name="valor_locacao_inicial"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl"  > 
                                        </div>

                                        <div class="col-md-6">
                                        <label for="valor_locacao_final" class="label_menor">até: </label>
                                        <input type="text" min="0"   id="valor_locacao_final" name="valor_locacao_final"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl"  > 
                                        </div>

                                    </div>  

                                    <div class="row">

                                        <div class="col-md-6">
                                        <label for="valor_condominio" class="label_menor">Condom&iacute;nio: </label>
                                        <input type="text" id="valor_condominio" name="valor_condominio"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" value="" > 
                                        </div>

                                        <div class="col-md-6">
                                        <label for="iptu">IPTU: </label>
                                        <input type="text" id="iptu" name="iptu"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl"  value="" > 
                                        </div>

                                    </div>  
                                </div>

                                <h2 class="tarja_titulo">Proprietário</h2>

                                <div class="container">

                                    <div class="row">

                                        <div class="col-md-6">
                                        <label for="proprietario" class="label_menor">Nome*: </label>
                                        <input type="text"  id="proprietario" name="proprietario"  <?php echo"value='$imovel->proprietario'";  ?> > 
                                        </div>

                                        <div class="col-md-6">
                                        <label for="proprietario_telefone" class="label_menor">Telefone*: </label>
                                        <input type="text"  id="proprietario_telefone" name="proprietario_telefone"  <?php echo"value='$imovel->proprietario_telefone'";  ?> >  
                                        </div>

                                    </div>  

                                    <div class="row">

                                        <div class="col">
                                        <label for="email_telefone" class="label_menor">Email*: </label>
                                        <input type="text"  id="email_telefone" name="email_telefone"  <?php echo"value='$imovel->email_telefone'";  ?> >  
                                        </div>

                                    </div>  
                                </div>

                                <h2 class="tarja_titulo">Informações</h2>

                            
                                    <p>
                                    <label for="descricao">Descri&ccedil;&atilde;o*:<br>
                                    </label><span class="caracteres">255</span> <br>
                                    <textarea name="descricao" id="descricao" cols="45" rows="5"><?php echo"$imovel->descricao"; ?></textarea>
                                    </p>    

                            
                                   
                                    

                            </div>        


                </div>  


                <div class="row">
                    <div class="col">
                        <hr>
                    </div>

                </div>


                <div class="row"> 

                        <div class="col-md-6">
                            <h2  class="tarja_titulo">Detalhes condomínio</h2>

                                <?php 
                                
                                    $select_caracteristicas = $conn->query("SELECT id_caracteristicas, caracteristicas FROM tb_caracteristicas  Where ID_tipoimovel='11002'  Order By caracteristicas asc");
                                    while($linha_caracteristicas = $select_caracteristicas->fetch_array()){
                                    $id_caracteristicas = $linha_caracteristicas["id_caracteristicas"];
                                    $caracteristicas = $linha_caracteristicas["caracteristicas"];
                                
                                
                                            echo '<input  name="caracteristicas[]" class="form-check-input" type="checkbox" id="'.$id_caracteristicas.'" value="'.$id_caracteristicas.'"><label class="form-check-label" for="'.$id_caracteristicas.'">'.$caracteristicas.'</label>';
                                            echo '<br>';
                                    }

                                ?>


                        </div>

                        <div class="col-md-6">

                            <h2  class="tarja_titulo">Detalhes imóvel</h2>

                                <?php 
                                    $select_detalhes = $conn->query("SELECT id_detalhes, detalhes FROM tb_detalhes Order By detalhes asc");
                                    while($linha_detalhes = $select_detalhes->fetch_array()){
                                    $id_detalhes = $linha_detalhes["id_detalhes"];
                                    $detalhes = $linha_detalhes["detalhes"];
                                    

                                    echo '<input  name="detalhes[]" class="form-check-input" type="checkbox" id="'.$id_detalhes.'" value="'.$id_detalhes.'"><label class="form-check-label" for="'.$id_detalhes.'">'.$detalhes.'</label>';
                                    echo '<br>';
                                    
                                    }	
                                ?>

                        </div>

                </div>
            </div>



            <input  type="hidden" id="id_imovel" name="id_imovel" value="<?php echo"$id_imovel"?>">


            <p>&nbsp;</p>
            <input type="submit" name="Submit" value="Buscar" class="btn btn-success" />


        </form>    



        



 <?php   include 'includes/footer.php';?>


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