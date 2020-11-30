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
        
    $sql_usuario = mysql_query("SELECT * FROM tabela_usuario WHERE id_usuario='$id_usuario_editar' ");     
    $usuario = mysql_fetch_object($sql_usuario);
    }

?>

<?php include 'includes/header.php';?>


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

            $sql_imovel = mysql_query("SELECT * FROM tabela_imovel where id_imovel='$id_imovel'");
            $imovel = mysql_fetch_object($sql_imovel);



		?>
        
        <h1><i class="fas fa-home"></i> Busca imóvel</h1>

        <form action="resultado_busca.php" method="post" name="form1" id="form1" onSubmit="return checkform(this);">

                            <?
                            if($id_imovel!=""){

                            echo"<input type='hidden'  name='id_imovel' id='id_imovel' value='$id_imovel'/>";	
                            }

                            ?>	

            <div class="container">
                <div class="row">

                        
                
            
                            <div class="col-md-7">


                                    <h2 class="tarja_titulo">Endereço</h2>

                                    <div class="container">


                                    <div class="row">

                                        <div class="col">
                                        <label for="endereco">Endere&ccedil;o*: </label><br>
                                        <input id="endereco" name="endereco" class="input_endereco" value="<? echo"$imovel->endereco" ?>"/ >
                                        </div>

                                    </div>  

                                    <div class="row">

                                            <div class="col-md-3">
                                            <label for="cep">CEP*:</label> <br>
                                            <input type="text" name="cep" id="cep" value="<? echo"$imovel->cep"; ?>" />
                                            </div>

                                            <div class="col-md-3">
                                            <label for="estado" class="label_auto">Estado* (SP): </label>
                                            <input type="text" name="estado" id="estado" value="<? echo"$imovel->estado"; ?>" maxlength="2"  />
                                            </div>

                                            <div class="col-md-3">
                                            <label for="cidade" >Cidade*: </label>
                                            <input type="text" name="cidade" id="cidade" value="<? echo"$imovel->cidade" ?>"  />
                                            </div>

                                            <div class="col-md-3">
                                            <label for="bairro">Bairro*: </label>
                                            <input type="text" name="bairro" id="bairro" value="<? echo"$imovel->bairro" ?>"  />
                                            </div>


                                        </div>


                                        <div class="row">

                                            <div class="col-md-3">
                                            <label for="numero" class="label_menor">N&uacute;mero*: </label>
                                            <input  name="numero" id="numero" class="input_numero"  value="<? echo"$imovel->numero" ?>"/ >
                                            </div>

                                            <div class="col-md-3">
                                            <label for="unidade" class="label_menor">Unidade: </label>
                                            <input type="text"  name="unidade" id="unidade"  value="<? echo"$imovel->unidade" ?>"/ >
                                            </div>

                                            <div class="col-md-3">
                                            <label for="unidade" class="label_menor">Andar: </label>
                                            <input type="text"  name="unidade" id="unidade"  value="<? echo"$imovel->unidade" ?>"/ >
                                            </div>

                                            <div class="col-md-3">
                                            <label for="unidade" class="label_menor">Bloco: </label>
                                            <input type="text"  name="unidade" id="unidade"  value="<? echo"$imovel->unidade" ?>"/ >
                                            </div>

                                        </div>

                                       

                                        <div class="row">


                                            <div class="col-md-3">
                                            <label for="condominio" class="label_auto">Condom&iacute;nio: </label>
                                            <input type="text"  name="condominio" id="condominio"  value="<? echo"$imovel->condominio" ?>"  / >
                                            </div>

                                            <div class="col-md-3">
                                            <label for="edificio">Edif&iacute;cio: </label>
                                            <input type="text"  name="edificio" id="edificio" value="<? echo"$imovel->edificio" ?>" / >
                                            </div>

                                            <div class="col-md-3">
                                            <label for="construtora" >Construtora: </label>
                                            <input type="text" name="construtora" id="construtora" value="<? echo"$imovel->construtora" ?>"  />
                                            </div>

                                            <div class="col-md-3">
                                            <label for="estilo">Estilo: </label>
                                            <input type="text" name="estilo" id="estilo" value="<? echo"$imovel->estilo" ?>"  />
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
                                            <input type="text" id="habitese" name="habitese" class="valor_menor"  value="<? echo"$imovel->habitese"; ?>">
                                            </div>

                                            <div class="col-md-2">
                                            <label for="andares" class="label_menor" id="label_suites" >Andares </label>
                                            <input type="text" id="suites" name="andares" class="valor_menor"  value="<? echo"$imovel->andares"; ?>">
                                            </div>

                                            <div class="col-md-2">
                                            <label for="por_andar" class="label_menor">Aps/andar </label>
                                            <input type="text" id="por_andar" name="por_andar" class="valor_menor"  value="<? echo"$imovel->por_andar"; ?>">
                                            </div>

                                            <div class="col-md-2">
                                            <label for="vagas" class="label_menor">Vagas </label>
                                            <input type="text" id="vagas" name="vagas" class="valor_menor"  value="<? echo"$imovel->vagas"; ?>">
                                            </div>

                                            <div class="col-md-2">
                                            <label for="posicao" class="label_menor">Posição </label>
                                            <input type="text" id="posicao" name="posicao" class="valor_menor"  value="<? echo"$imovel->posicao"; ?>">
                                            </div>

                                            <div class="col-md-2">
                                            <label for="licencas" class="label_menor">Licençsas </label>
                                            <input type="text" id="licencas" name="licencas" class="valor_menor"  value="<? echo"$imovel->licencas"; ?>">
                                            </div>

                                        </div> 

                                    </div>    

                                    <h2 class="tarja_titulo">Outros dados</h2>

                                    <div class="container">

                                        <div class="row">

                                            <div class="col-md-3">
                                            <label for="corretor" class="label_menor" >Corretor </label>
                                            <input type="text" id="corretor" name="corretor" class="valor_menor" value="<? echo"$imovel->corretor"; ?>">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="indicador" class="label_menor" id="label_suites" >Indicador </label>
                                            <input type="text" id="indicador" name="indicador" class="valor_menor"  value="<? echo"$imovel->indicador"; ?>">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="promotor" class="label_menor">Promotor</label>
                                            <input type="text" id="promotor" name="promotor" class="valor_menor"  value="<? echo"$imovel->promotor"; ?>">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="emuso" class="label_menor">Em uso </label>
                                            <input type="text" id="emuso" name="emuso" class="valor_menor"  value="<? echo"$imovel->emuso"; ?>">
                                            </div>

                                            

                                        </div>


                                        <div class="row">

                                            <div class="col-md-3">
                                            <label for="zelador" >Zelador: </label>
                                            <input type="text" id="zelador" name="zelador" class="valor_menor"  value="<? echo"$imovel->zelador"; ?>">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="fone_zelador" class="label_menor" id="label_suites" >Fone zelador: </label>
                                            <input type="text" id="fone_zelador" name="fone_zelador" class="valor_menor"  value="<? echo"$imovel->fone_zelador"; ?>">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="vago" class="label_menor">Vago: </label>
                                            <input type="text" id="vago" name="vago" class="valor_menor"  value="<? echo"$imovel->vago"; ?>">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="chave" class="label_menor">Chave visita </label>
                                            <input type="text" id="chave" name="chave" class="valor_menor"  value="<? echo"$imovel->chave"; ?>">
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
                                                <select id="negociacao" name="negociacao" onChange="optionCheck()">
                                                <option value="1" <? if($imovel->sai==1){ echo"selected"; } ?> >Vender</option>
                                                <option value="2" <? if($imovel->sai==2){ echo"selected"; } ?> >Alugar</option>
                                                <option value="3" <? if($imovel->sai==3){ echo"selected"; } ?> >Vender e Alugar</option>
                                                
                                                </select>
                                            </div> 

                                            <div class="col">
                                                <label for="sai">Altera&ccedil;&atilde;o: </label><br>
                                                <select id="sai" name="sai" >
                                                <option value="Ativo" <? if($imovel->negociacao=='Ativo'){ echo"selected"; } ?> >Ativo</option>
                                                <option value="Nv Preço Ativo" <? if($imovel->negociacao=='Nv Preço Ativo'){ echo"selected"; } ?> >Nv Preço Ativo</option>
                                                <option value="Vendido Baixa" <? if($imovel->negociacao=='Vendido Baixa'){ echo"selected"; } ?> >Vendido Baixa</option>
                                                <option value="Duplicata Baixa" <? if($imovel->negociacao=='Duplicata Baixa'){ echo"selected"; } ?> >Duplicata Baixa</option>
                                                <option value="Proposta Ativo" <? if($imovel->negociacao=='Proposta Ativo'){ echo"selected"; } ?> >Proposta Ativo</option>
                                                <option value="Proposta Baixa" <? if($imovel->negociacao=='Proposta Baixa'){ echo"selected"; } ?> >Proposta Baixa</option>
                                                <option value="NV Tel Ativo" <? if($imovel->negociacao=='NV Tel Ativo'){ echo"selected"; } ?> >NV Tel Ativo</option>
                                                <option value="Locado Baixa" <? if($imovel->negociacao=='Locado Baixa'){ echo"selected"; } ?> >Locado Baixa</option>
                                                <option value="V S Temp Ativo" <? if($imovel->negociacao=='V S Temp Ativo'){ echo"selected"; } ?> >V S Temp Ativo</option>
                                                <option value="V S Def Baixa" <? if($imovel->negociacao=='V S Def Baixa'){ echo"selected"; } ?> >V S Def Baixa</option>
                                                <option value="Antiga Baixa" <? if($imovel->negociacao=='Antiga Baixa'){ echo"selected"; } ?> >Antiga Baixa</option>
                                                <option value="Promocao" <? if($imovel->negociacao=='Promocao'){ echo"selected"; } ?> >Promocao</option>
                                                <option value="Baixa Nova" <? if($imovel->negociacao=='Baixa Nova'){ echo"selected"; } ?> >Baixa Nova</option>
                                                </select>
                                            </div> 

                                        </div>

                                        <div class="row">    

                                            <div class="col-md-6">
                                                <label for="tipo">Tipo imóvel: </label>
                                                <select  name="tipo" id="tipo" onChange="muda_subtipo()">
                                                <option value="0" selected="selected">Selecione</option>
                                                <option value="Apartamento" <? if($imovel->tipo=="Apartamento"){ echo"selected"; } ?> >Apartamento</option>
                                                <option value="Casa"		<? if($imovel->tipo=="Casa"){ echo"selected"; } ?> >Casa</option>
                                                <option value="Comercial" 	<? if($imovel->tipo=="Comercial"){ echo"selected"; } ?> >Comercial</option>
                                                <option value="Terreno" 	<? if($imovel->tipo=="Terreno"){ echo"selected"; } ?> >Terreno</option>
                                                <option value="Rural" 		<? if($imovel->tipo=="Rural"){ echo"selected"; } ?> >Rural</option>
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
                                        <input type="text" id="valor_condominio" name="valor_condominio"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" value="<? echo"$imovel->valor_condominio"; ?>" > 
                                        </div>

                                        <div class="col-md-6">
                                        <label for="iptu">IPTU: </label>
                                        <input type="text" id="iptu" name="iptu"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl"  value="<? echo"$imovel->iptu"; ?>" > 
                                        </div>

                                    </div>  
                                </div>

                                <h2 class="tarja_titulo">Proprietário</h2>

                                <div class="container">

                                    <div class="row">

                                        <div class="col-md-6">
                                        <label for="proprietario" class="label_menor">Nome*: </label>
                                        <input type="text"  id="proprietario" name="proprietario"  <? echo"value='$imovel->proprietario'";  ?> > 
                                        </div>

                                        <div class="col-md-6">
                                        <label for="proprietario_telefone" class="label_menor">Telefone*: </label>
                                        <input type="text"  id="proprietario_telefone" name="proprietario_telefone"  <? echo"value='$imovel->proprietario_telefone'";  ?> >  
                                        </div>

                                    </div>  

                                    <div class="row">

                                        <div class="col">
                                        <label for="email_telefone" class="label_menor">Email*: </label>
                                        <input type="text"  id="email_telefone" name="email_telefone"  <? echo"value='$imovel->email_telefone'";  ?> >  
                                        </div>

                                    </div>  
                                </div>

                                <h2 class="tarja_titulo">Informações</h2>

                            
                                    <p>
                                    <label for="descricao">Descri&ccedil;&atilde;o*:<br>
                                    </label><span class="caracteres">255</span> <br>
                                    <textarea name="descricao" id="descricao" cols="45" rows="5"><? echo"$imovel->descricao"; ?></textarea>
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
                                
                                    $select_caracteristicas = mysql_query("SELECT ID, caracteristicas FROM tb_caracteristicas  Where ID_tipoimovel='11002'  Order By caracteristicas asc");
                                    while($linha_caracteristicas = mysql_fetch_array($select_caracteristicas)){
                                    $ID_caracteristica = $linha_caracteristicas["ID"];
                                    $caracteristicas = $linha_caracteristicas["caracteristicas"];
                                
                                    $select_imo_caracteristicas = mysql_query("SELECT ID_caracteristica FROM tb_imoveis_caract Where ID_caracteristica='$ID_caracteristica' and ID_imovel='$ID'");
                                    $rs_caracteristicas =mysql_fetch_array($select_imo_caracteristicas);
                                    
                                
                                            echo '<input class="form-check-input" type="checkbox" id="'.$ID_caracteristica.'" value="'.$caracteristicas.'"><label class="form-check-label" for="'.$ID_caracteristica.'">'.$caracteristicas.'</label>';
                                            echo '<br>';
                                    }	

                                ?>


                        </div>

                        <div class="col-md-6">

                            <h2  class="tarja_titulo">Detalhes imóvel</h2>

                                <?php
                                    $select_detalhes = mysql_query("SELECT ID, detalhes FROM tb_detalhes Order By detalhes asc");
                                    while($linha_detalhes = mysql_fetch_array($select_detalhes)){
                                    $ID_detalhe = $linha_detalhes["ID"];
                                    $detalhes = $linha_detalhes["detalhes"];

                                    $select_imo_detalhes = mysql_query("SELECT ID_detalhe FROM tb_imoveis_detalhes Where ID_detalhe='$ID_detalhe' and ID_imovel='$ID'");
                                    $rs_detalhes =mysql_fetch_array($select_imo_detalhes);
                                    

                                    echo '<input class="form-check-input" type="checkbox" id="'.$ID_detalhe.'" value="'.$detalhes.'"><label class="form-check-label" for="'.$ID_detalhe.'">'.$detalhes.'</label>';
                                    echo '<br>';
                                    
                                    }	
                                ?>

                        </div>

                </div>
            </div>



            <input  type="hidden" id="id_imovel" name="id_imovel" value="<? echo"$id_imovel"?>">


            <p>&nbsp;</p>
            <input type="submit" name="Submit" value="Buscar" class="btn btn-success" />


        </form>    



        



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