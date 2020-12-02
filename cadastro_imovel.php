<?php 
   
     session_start(); // sempre que usarmos as sessions devemos chamar esse codigo sempre no inicio do script

if(isset($_SESSION['login'])){// verifica se existe a varavel session

   $login=$_SESSION['login']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo
   
   $id_usuario=$_SESSION['id_usuario']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo


include 'includes/conexao.php';

    $dia_atual = date("d");
    $mes_atual = date("m");
    $ano_atual = date("Y");


    $id_usuario_editar = $_GET['id_usuario_editar'];
    $editar = $_GET['editar'];
    $excluir = $_GET['excluir'];


    if($editar=="sim"){
        
    $sql_usuario = $conn->query("SELECT * FROM tabela_usuario WHERE id_usuario='$id_usuario_editar' ");     
    $usuario = $sql_usuario->fetch_object();
    }

?>

<?php  include 'includes/header.php';?>
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
.bloco_cinza{
    background:#eee;
    padding:10px;
}


</style>

    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script>

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#endereco").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#estado").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#endereco").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#estado").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#endereco").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#estado").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>

    <SCRIPT>

    
        function checkform ( form )
        {


            if (form.nome.value == "") {
                alert( "Preencha o nome." );
                form.nome.focus();
                return false ;
            }
            
            if (form.telefone.value  == "") {
                alert( "Preencha o campo fone." );
                form.telefone.focus();
                return false ;
            }
                
            if (form.email.value  == "") {
                alert( "Preencha o campo email." );
                form.email.focus();
                return false ;
            }
            
            if (form.login_novo.value  == "") {
                alert( "Preencha o campo login." );
                form.login_novo.focus();
                return false ;
            }
            
            if (form.senha.value  == "") {
                alert( "Preencha o campo senha." );
                form.senha.focus();
                return false ;
            }
            
            if (form.senha.value != form.senha2.value) {
                alert( "Campo confirme sua senha esta diferente da senha." );
                form.senha2.focus();
                return false ;
            }
            
            if (form.tipo_usuario.value == "0") {
                alert( "Selecione o tipo de usuario." );
                form.tipo_usuario.focus();
                return false ;
            }

            return true ;
        }
    </script>

		<?php 
			
            $dia_atual = date("d");
            $mes_atual = date("m");
            $ano_atual = date("Y");

            $id_imovel = $_GET['id_imovel']; 
            $duplicar = $_GET['duplicar']; 

            $sql_imovel = $conn->query("SELECT * FROM tabela_imovel where id_imovel='$id_imovel'");
            $imovel = $sql_imovel->fetch_object();



		?>
        
        <h1><i class="fas fa-home"></i> Cadastro imóvel</h1>

        <form action="inserir_imovel.php" method="post" name="form1" id="form1" onSubmit="return checkform(this);" enctype="multipart/form-data" >


                            <?php
                            if($id_imovel!="" and $duplicar!="sim"){

                            echo"<input type='hidden'  name='id_imovel' id='id_imovel' value='$id_imovel'/>";	
                            }

                            if($imovel->habitese!=""){

                                $ano_atual = date("Y");
        
                                    $idade = $ano_atual - $imovel->habitese;
            
        
        
                            }

                            ?>	

            <div class="container">
                <div class="row">

                            <div class="col-md-8">

                               

                                <div class="container bloco_cinza">

                                    <div class="row">

                                        <div class="col-md-6">
                                            <label for="edificio" class="label_100">Cond/Edif&iacute;cio: </label>
                                            <input type="text"  name="edificio" id="edificio" value="<?php echo"$imovel->edificio  $imovel->empreendimento" ?>" class="input_auto" >

                                            <label for="torre" class="label_100">Torre: </label>
                                            <input type="text"  name="torre" id="torre"  value="<?php echo"$imovel->torre" ?>"  class="input_auto" >
                                        </div>

                                        <div class="col-md-3">
                                            <label for="construtora" class="label_center" >Construtora: </label>
                                            <input type="text" name="construtora" id="construtora" value="<?php echo"$imovel->construtora" ?>"  />
                                        </div>

                                        <div class="col-md-3">
                                        <label for="estilo"  class="label_center" >Estilo: </label>
                                                <input type="text" name="estilo" id="estilo" value="<?php echo"$imovel->estilo" ?>"  />
                                        </div>


                                    </div>


                                    <div class="row">

                                        <div class="col-md-2">
                                        <label for="habitese" class="label_center" >Idade </label>
                                        <input type="text" id="habitese" name="habitese" class="valor_menor"  value="<?php echo"$idade"; ?>">
                                        </div>

                                        <div class="col-md-2">
                                        <label for="andar_es" class="label_center" id="label_suites" >Andares </label>
                                        <input type="text" id="suites" name="andar_es" class="andar_es"  value="<?php echo"$imovel->andar_es"; ?>">
                                        </div>

                                        <div class="col-md-2">
                                        <label for="ap_andar" class="label_center">Aps/andar </label>
                                        <input type="text" id="ap_andar" name="ap_andar" class="valor_menor"  value="<?php echo"$imovel->ap_andar"; ?>">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="zelador" class="label_center" >Zelador/Porteiro </label>
                                            <input type="text" id="zelador" name="zelador" class="valor_menor"  value="<?php echo"$imovel->zelador"; ?>">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="tel_zelador" class="label_center" id="label_suites" >Fone portaria </label>
                                            <input type="text" id="tel_zelador" name="tel_zelador" class="valor_menor"  value="<?php echo"$imovel->tel_zelador"; ?>">
                                        </div>

                                    </div>  

                                    <div class="row">

                                        <div class="col-md-2">
                                        <label for="dormitorio" class="label_center" >Dormitórios </label>
                                        <input type="text" id="dormitorio" name="dormitorio" class="valor_menor" value="<?php echo"$imovel->dormitorio"; ?>">
                                        </div>

                                        <div class="col-md-2">
                                        <label for="suite" class="label_center" id="suite" >Su&iacute;tes </label>
                                        <input type="text" id="suite" name="suite" class="valor_menor"  value="<?php echo"$imovel->suite"; ?>">
                                        </div>

                                        <div class="col-md-2">
                                        <label for="banheiro" class="label_center">Banheiros</label>
                                        <input type="text" id="banheiro" name="banheiro" class="valor_menor"  value="<?php echo"$imovel->banheiro"; ?>">
                                        </div>

                                        <div class="col-md-2">
                                        <label for="vagas" class="label_center">Vagas </label>
                                        <input type="text" id="vagas" name="vagas" class="valor_menor"  value="<?php echo"$imovel->vagas"; ?>">
                                        </div>

                                        <div class="col-md-2">
                                        <label for="area_util" class="label_center">&Aacute;rea &uacute;til </label>
                                        <input type="text" id="area_util" name="area_util"  value="<?php if($imovel->area_util!=0){echo"$imovel->area_util";} ?>" >
                                        </div>

                                        <div class="col-md-2">
                                        <label for="area_total" class="label_center">&Aacute;rea total </label>
                                        <input type="text" id="area_total" name="area_total" value="<?php if($imovel->area_total!=0){echo"$imovel->area_total";} ?>" >
                                        </div>

                                    </div>



                                        <div class="row dividi_linha">

                                            <div class="col-md-12">
                                                <label>Descrição</label><br>
                                                <textarea name="descricao" id="descricao" cols="45" rows="5"><?php echo"$imovel->descricao"; ?></textarea>

                                            </div>

                                        </div>


                                        <div class="row">

                                            <div class="col-md-4">
                                            <label for="corretor" class="label_menor" >Corretor </label>
                                            <input type="text" id="corretor" name="corretor" class="valor_menor" value="<?php echo"$imovel->corretor"; ?>">
                                            </div>

                                            <div class="col-md-4">
                                            <label for="indicador" class="label_menor" id="label_suites" >Indicador </label>
                                            <input type="text" id="indicador" name="indicador" class="valor_menor"  value="<?php echo"$imovel->indicador"; ?>">
                                            </div>

                                            <div class="col-md-4">
                                            <label for="promotor" class="label_menor">Promotor</label>
                                            <input type="text" id="promotor" name="promotor" class="valor_menor"  value="<?php echo"$imovel->promotor"; ?>">
                                            </div>

                                        </div>


                                </div>    


                        
                            </div>

                            <div class="col-md-4">


                                <div class="container">

                                    
                                    <div class="row">

                                        <div class="col-md-6">
                                        <label for="proprietario" class="label_menor">Proprietário*: </label>
                                        <input type="text"  id="proprietario" name="proprietario"  <?php echo"value='$imovel->proprietario'";  ?> > 
                                        </div>

                                        <div class="col-md-6">
                                        <label for="fone" class="label_menor">Telefone*: </label>
                                        <input type="text"  id="fone" name="fone"  <?php echo"value='$imovel->fone'";  ?> >  
                                        </div>

                                    </div>  

                                    <div class="row">

                                        <div class="col">
                                        <label for="email" class="label_menor">Email*: </label>
                                        <input type="text"  id="email" name="email"  <?php echo"value='$imovel->email'";  ?> >  
                                        </div>

                                    </div>

                                    <div class="row">

                                    
                                            <div class="col-md-6">
                                            <label for="vago" class="label_menor">Vago: </label>
                                            <input type="text" id="vago" name="vago" class="valor_menor"  value="<?php echo"$imovel->vago"; ?>">
                                            </div>

                                            <div class="col-md-6">
                                            <label for="chave_visita" class="label_menor">Chave visita </label>
                                            <input type="text" id="chave_visita" name="chave_visita" class="valor_menor"  value="<?php echo"$imovel->chave_visita"; ?>">
                                            </div>

                                    </div>

                                    <div class="row">

                                        <div class="col">
                                                <label for="negociacao">Negocia&ccedil;&atilde;o: </label><br>
                                                <select id="negociacao" name="negociacao" onChange="optionCheck()">
                                                <option value="1" <?php if($imovel->negociacao==1){ echo"selected"; } ?> >Vender</option>
                                                <option value="2" <?php if($imovel->negociacao==2){ echo"selected"; } ?> >Alugar</option>
                                                <option value="3" <?php if($imovel->negociacao==3){ echo"selected"; } ?> >Vender e Alugar</option>
                                                </select>
                                        </div> 

                                        <div class="col">
                                                <label for="sai">Altera&ccedil;&atilde;o: </label><br>
                                                <select id="sai" name="sai" >
                                                <option value="Ativo" <?php if($imovel->negociacao=='Ativo'){ echo"selected"; } ?> >Ativo</option>
                                                <option value="Nv Preço Ativo" <?php if($imovel->negociacao=='Nv Preço Ativo'){ echo"selected"; } ?> >Nv Preço Ativo</option>
                                                <option value="Vendido Baixa" <?php if($imovel->negociacao=='Vendido Baixa'){ echo"selected"; } ?> >Vendido Baixa</option>
                                                <option value="Duplicata Baixa" <?php if($imovel->negociacao=='Duplicata Baixa'){ echo"selected"; } ?> >Duplicata Baixa</option>
                                                <option value="Proposta Ativo" <?php if($imovel->negociacao=='Proposta Ativo'){ echo"selected"; } ?> >Proposta Ativo</option>
                                                <option value="Proposta Baixa" <?php if($imovel->negociacao=='Proposta Baixa'){ echo"selected"; } ?> >Proposta Baixa</option>
                                                <option value="NV Tel Ativo" <?php if($imovel->negociacao=='NV Tel Ativo'){ echo"selected"; } ?> >NV Tel Ativo</option>
                                                <option value="Locado Baixa" <?php if($imovel->negociacao=='Locado Baixa'){ echo"selected"; } ?> >Locado Baixa</option>
                                                <option value="V S Temp Ativo" <?php if($imovel->negociacao=='V S Temp Ativo'){ echo"selected"; } ?> >V S Temp Ativo</option>
                                                <option value="V S Def Baixa" <?php if($imovel->negociacao=='V S Def Baixa'){ echo"selected"; } ?> >V S Def Baixa</option>
                                                <option value="Antiga Baixa" <?php if($imovel->negociacao=='Antiga Baixa'){ echo"selected"; } ?> >Antiga Baixa</option>
                                                <option value="Promocao" <?php if($imovel->negociacao=='Promocao'){ echo"selected"; } ?> >Promocao</option>
                                                <option value="Baixa Nova" <?php if($imovel->negociacao=='Baixa Nova'){ echo"selected"; } ?> >Baixa Nova</option>
                                                </select>
                                            </div> 

                                    </div> 


                                    <div class="row">


                                        <div class="col-md-6">
                                        <label for="valor_venda" class="label_menor">Venda*: </label>
                                        <input type="text" min="0"   id="valor_venda" name="valor_venda"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" <?php if($imovel->valor_venda!="0"){ echo"value='$imovel->valor_venda'"; } ?> > 
                                        </div>

                                        <div class="col-md-6">
                                        <label for="valor_locacao" class="label_menor">Loca&ccedil;&atilde;o*: </label>
                                        <input type="text" min="0"   id="valor_locacao" name="valor_locacao"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" <?php if($imovel->valor_locacao!="0"){ echo"value='$imovel->valor_locacao'"; } ?>  > 
                                        </div>

                                    </div>  

                                    <div class="row">

                                        <div class="col-md-6">
                                        <label for="valor_condominio" class="label_menor">Condom&iacute;nio: </label>
                                        <input type="text" id="valor_condominio" name="valor_condominio"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" value="<?php echo"$imovel->valor_condominio"; ?>" > 
                                        </div>

                                        <div class="col-md-6">
                                        <label for="iptu">IPTU: </label>
                                        <input type="text" id="iptu" name="iptu"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl"  value="<?php echo"$imovel->iptu"; ?>" > 
                                        </div>

                                    </div>  
                                </div>


                              
                                   
                                    

                            </div>        


                </div>  


                <div class="row">
                    <div class="col">
                        <hr>

                    </div>

                       
                </div>



                <div class="row">    

                    <div class="container"> 
                        <div class="row"> 

                            <div class="col-md-8">

                                <div class="container"> 


                                    <div class="row">

                                        <div class="col-md-3">
                                        <label for="cep">CEP*:</label> <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm" target="_blank">Buscar</a><br>
                                        <input type="text" name="cep" id="cep" value="<?php echo"$imovel->cep"; ?>" />
                                        </div>

                                    </div>  

                                    <div class="row">

                                        <div class="col-md-4">
                                        <label for="estado" class="label_auto">Estado* (SP): </label>
                                        <input type="text" name="estado" id="estado" value="<?php echo"$imovel->estado"; ?>" maxlength="2"  />
                                        </div>

                                        <div class="col-md-4">
                                        <label for="cidade" >Cidade*: </label>
                                        <input type="text" name="cidade" id="cidade" value="<?php echo"$imovel->cidade" ?>"  />
                                        </div>

                                        <div class="col-md-4">
                                        <label for="bairro">Bairro*: </label>
                                        <input type="text" name="bairro" id="bairro" value="<?php echo"$imovel->bairro" ?>"  />
                                        </div>


                                    </div>


                                    <div class="row">

                                        <div class="col">
                                        <label for="endereco">Endere&ccedil;o*: </label><br>
                                        <input id="endereco" name="endereco" class="input_endereco" value="<?php echo"$imovel->endereco" ?>" />
                                        </div>

                                        </div>  

                                        <div class="row">

                                        <div class="col-md-3">
                                        <label for="numero" class="label_menor">N&uacute;mero*: </label>
                                        <input  name="numero" id="numero" class="input_numero"  value="<?php echo"$imovel->numero" ?>" />
                                        </div>

                                        <div class="col-md-3">
                                        <label for="unidade" class="label_menor">Unidade: </label>
                                        <input type="text"  name="unidade" id="unidade"  value="<?php echo"$imovel->unidade" ?>" />
                                        </div>

                                        <div class="col-md-3">
                                        <label for="andar_r" class="label_menor">Andar: </label>
                                        <input type="text"  name="andar_r" id="andar_r"  value="<?php echo"$imovel->andar_r" ?>" >
                                        </div>

                                        <div class="col-md-3">
                                        <label for="bloco" class="label_menor">Bloco: </label>
                                        <input type="text"  name="bloco" id="bloco"  value="<?php echo"$imovel->bloco" ?>" >
                                        </div>

                                    </div>


                                </div>
                                
                            </div>

                            <div class="col-md-4">

                                <div class="container"> 

                                    <div class="row"> 

                                        <div class="col-md-6">
                                            <label for="tipo">Tipo imóvel: </label>
                                            <select  name="tipo" id="tipo" onChange="muda_subtipo()">
                                            <option value="0" selected="selected">Selecione</option>
                                            <option value="Apartamento" <?php if($imovel->tipo=="Apartamento"){ echo"selected"; } ?> >Apartamento</option>
                                            <option value="Casa"		<?php if($imovel->tipo=="Casa"){ echo"selected"; } ?> >Casa</option>
                                            <option value="Comercial" 	<?php if($imovel->tipo=="Comercial"){ echo"selected"; } ?> >Comercial</option>
                                            <option value="Terreno" 	<?php if($imovel->tipo=="Terreno"){ echo"selected"; } ?> >Terreno</option>
                                            <option value="Rural" 		<?php if($imovel->tipo=="Rural"){ echo"selected"; } ?> >Rural</option>
                                            </select>
                                        </div> 


                                        <div class="col-md-6">
                                            <label for="subtipo">Subtipo: </label>
                                            <select name="subtipo">
                                            <option value="0" selected="selected">Selecione</option>
                                            <option value="Padrão"      <?php if($imovel->subtipo=="Padrão"){ echo"selected"; } ?> >Padrão</option>
                                            <option value="Cobertura"	<?php if($imovel->subtipo=="Cobertura"){ echo"selected"; } ?> >Cobertura</option>
                                            <option value="Duplex" 	    <?php if($imovel->subtipo=="Duplex"){ echo"selected"; } ?> >Duplex</option>
                                            <option value="Triplex" 	<?php if($imovel->subtipo=="Triplex"){ echo"selected"; } ?> >Triplex</option>
                                            </select>
                                        </div> 

                                    </div> 

                                    <div class="row"> 

                                        <div class="col">
                                            <label for="posicao">Posição: </label>
                                            <select  name="posicao" id="posicao" >
                                            <option value="" selected="selected">Selecione</option>
                                            <option value="Frente" <?php if($imovel->posicao=="Frente"){ echo"selected"; } ?> >Frente</option>
                                            <option value="Fundo"		<?php if($imovel->posicao=="Fundo"){ echo"selected"; } ?> >Fundo</option>
                                            <option value="Lateral" 	<?php if($imovel->posicao=="Lateral"){ echo"selected"; } ?> >Lateral</option>
                                           
                                            </select>

                                        </div>
                                    </div>    

                                </div> 


                            </div>

                    
                    </div>

                   


               
                <div class="row">
                    <div class="col">
                        <hr>
                        <h3 class="titulo_separador">Fotos</h3>
                        <p>Selecione as imagens
                        <input name="arquivo[]" type="file"  />

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





            <p>&nbsp;</p>
            <input type="submit" name="Submit" value="<?php if($id_imovel!=""){ echo"Editar"; }else{ echo"Cadastrar"; } ?>" class="btn btn-success" />


        </form>    



        



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