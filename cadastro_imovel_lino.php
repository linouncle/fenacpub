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
        
        <h1><i class="fas fa-home"></i> Cadastro imóvel</h1>

        <form action="inserir_imovel.php" method="post" name="form1" id="form1" onSubmit="return checkform(this);">

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

                                            <div class="col-md-3">
                                            <label for="cep">CEP*:</label> <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm" target="_blank">Buscar</a><br>
                                            <input type="text" name="cep" id="cep" value="<? echo"$imovel->cep"; ?>" />
                                            </div>

                                        </div>  

                                        <div class="row">

                                            <div class="col-md-4">
                                            <label for="estado" class="label_auto">Estado* (SP): </label>
                                            <input type="text" name="estado" id="estado" value="<? echo"$imovel->estado"; ?>" maxlength="2"  />
                                            </div>

                                            <div class="col-md-4">
                                            <label for="cidade" >Cidade*: </label>
                                            <input type="text" name="cidade" id="cidade" value="<? echo"$imovel->cidade" ?>"  />
                                            </div>

                                            <div class="col-md-4">
                                            <label for="bairro">Bairro*: </label>
                                            <input type="text" name="bairro" id="bairro" value="<? echo"$imovel->bairro" ?>"  />
                                            </div>


                                        </div>

                                        

                                        <div class="row">

                                            <div class="col">
                                            <label for="endereco">Endere&ccedil;o*: </label><br>
                                            <input id="endereco" name="endereco" class="input_endereco" value="<? echo"$imovel->endereco" ?>" />
                                            </div>

                                        </div>  

                                        <div class="row">

                                            <div class="col-md-3">
                                            <label for="numero" class="label_menor">N&uacute;mero*: </label>
                                            <input  name="numero" id="numero" class="input_numero"  value="<? echo"$imovel->numero" ?>" />
                                            </div>

                                            <div class="col-md-3">
                                            <label for="unidade" class="label_menor">Unidade: </label>
                                            <input type="text"  name="unidade" id="unidade"  value="<? echo"$imovel->unidade" ?>" />
                                            </div>

                                            <div class="col-md-3">
                                            <label for="andar_r" class="label_menor">Andar: </label>
                                            <input type="text"  name="andar_r" id="andar_r"  value="<? echo"$imovel->andar_r" ?>" >
                                            </div>

                                            <div class="col-md-3">
                                            <label for="bloco" class="label_menor">Bloco: </label>
                                            <input type="text"  name="bloco" id="bloco"  value="<? echo"$imovel->bloco" ?>" >
                                            </div>

                                        </div>

                                       

                                        <div class="row">


                                            <div class="col-md-3">
                                            <label for="empreendimento" class="label_auto">Condom&iacute;nio: </label>
                                            <input type="text"  name="empreendimento" id="empreendimento"  value="<? echo"$imovel->empreendimento" ?>"  / >
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

                                            <div class="col-md-2">
                                            <label for="dormitorio" class="label_menor" >Dormitórios </label>
                                            <input type="text" id="dormitorio" name="dormitorio" class="valor_menor" value="<? echo"$imovel->dormitorio"; ?>">
                                            </div>

                                            <div class="col-md-2">
                                            <label for="suite" class="label_menor" id="suite" >Su&iacute;tes </label>
                                            <input type="text" id="suite" name="suite" class="valor_menor"  value="<? echo"$imovel->suite"; ?>">
                                            </div>

                                            <div class="col-md-2">
                                            <label for="banheiro" class="label_menor">Banheiros</label>
                                            <input type="text" id="banheiro" name="banheiro" class="valor_menor"  value="<? echo"$imovel->banheiro"; ?>">
                                            </div>

                                            <div class="col-md-2">
                                            <label for="vagas" class="label_menor">Vagas </label>
                                            <input type="text" id="vagas" name="vagas" class="valor_menor"  value="<? echo"$imovel->vagas"; ?>">
                                            </div>

                                            <div class="col-md-2">
                                            <label for="area_util" id="area_util_label">&Aacute;rea &uacute;til </label>
                                            <input type="text" id="area_util" name="area_util"  value="<? if($imovel->area_util!=0){echo"$imovel->area_util";} ?>" >
                                            </div>

                                            <div class="col-md-2">
                                            <label for="area_total" id="area_total_label">&Aacute;rea total </label>
                                            <input type="text" id="area_total" name="area_total" value="<? if($imovel->area_total!=0){echo"$imovel->area_total";} ?>" >
                                            </div>

                                        </div>


                                        <div class="row">

                                            <div class="col-md-2">
                                            <label for="habitese" >Habite-se </label>
                                            <input type="text" id="habitese" name="habitese" class="valor_menor"  value="<? echo"$imovel->habitese"; ?>">
                                            </div>

                                            <div class="col-md-2">
                                            <label for="andar_es" class="label_menor" id="label_suites" >Andares </label>
                                            <input type="text" id="suites" name="andar_es" class="andar_es"  value="<? echo"$imovel->andar_es"; ?>">
                                            </div>

                                            <div class="col-md-2">
                                            <label for="ap_andar" class="label_menor">Aps/andar </label>
                                            <input type="text" id="ap_andar" name="ap_andar" class="valor_menor"  value="<? echo"$imovel->ap_andar"; ?>">
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
                                            <label for="licenca_n" class="label_menor">Licenças </label>
                                            <input type="text" id="licenca_n" name="licenca_n" class="valor_menor"  value="<? echo"$imovel->licenca_n"; ?>">
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
                                            <label for="licensa" class="label_menor">Em uso </label>
                                            <input type="text" id="licensa" name="licensa" class="valor_menor"  value="<? echo"$imovel->licensa"; ?>">
                                            </div>

                                            

                                        </div>


                                        <div class="row">

                                            <div class="col-md-3">
                                            <label for="zelador" >Zelador: </label>
                                            <input type="text" id="zelador" name="zelador" class="valor_menor"  value="<? echo"$imovel->zelador"; ?>">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="tel_zelador" class="label_menor" id="label_suites" >Fone zelador: </label>
                                            <input type="text" id="tel_zelador" name="tel_zelador" class="valor_menor"  value="<? echo"$imovel->tel_zelador"; ?>">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="vago" class="label_menor">Vago: </label>
                                            <input type="text" id="vago" name="vago" class="valor_menor"  value="<? echo"$imovel->vago"; ?>">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="chave_visita" class="label_menor">Chave visita </label>
                                            <input type="text" id="chave_visita" name="chave_visita" class="valor_menor"  value="<? echo"$imovel->chave_visita"; ?>">
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
                                                <option value="1" <? if($imovel->negociacao==1){ echo"selected"; } ?> >Vender</option>
                                                <option value="2" <? if($imovel->negociacao==2){ echo"selected"; } ?> >Alugar</option>
                                                <option value="3" <? if($imovel->negociacao==3){ echo"selected"; } ?> >Vender e Alugar</option>
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
                                                <option value="0" selected="selected">Selecione</option>
                                                <option value="Padrão"      <? if($imovel->subtipo=="Padrão"){ echo"selected"; } ?> >Padrão</option>
                                                <option value="Cobertura"	<? if($imovel->subtipo=="Cobertura"){ echo"selected"; } ?> >Cobertura</option>
                                                <option value="Duplex" 	    <? if($imovel->subtipo=="Duplex"){ echo"selected"; } ?> >Duplex</option>
                                                <option value="Triplex" 	<? if($imovel->subtipo=="Triplex"){ echo"selected"; } ?> >Triplex</option>
                                                </select>
                                            </div> 

                                    </div>         

                                </div>   
                            
                                <h2 class="tarja_titulo">Valores</h2>

                                <div class="container">

                                    <div class="row">

                                        <div class="col-md-6">
                                        <label for="valor_venda" class="label_menor">Venda*: </label>
                                        <input type="text" min="0"   id="valor_venda" name="valor_venda"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" <? if($imovel->valor_venda!="0"){ echo"value='$imovel->valor_venda'"; } ?> > 
                                        </div>

                                        <div class="col-md-6">
                                        <label for="valor_locacao" class="label_menor">Loca&ccedil;&atilde;o*: </label>
                                        <input type="text" min="0"   id="valor_locacao" name="valor_locacao"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" <? if($imovel->valor_locacao!="0"){ echo"value='$imovel->valor_locacao'"; } ?>  > 
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
                                        <label for="fone" class="label_menor">Telefone*: </label>
                                        <input type="text"  id="fone" name="fone"  <? echo"value='$imovel->fone'";  ?> >  
                                        </div>

                                    </div>  

                                    <div class="row">

                                        <div class="col">
                                        <label for="email" class="label_menor">Email*: </label>
                                        <input type="text"  id="email" name="email"  <? echo"value='$imovel->email'";  ?> >  
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
                                
                                    $select_caracteristicas = mysql_query("SELECT id_caracteristicas, caracteristicas FROM tb_caracteristicas  Where ID_tipoimovel='11002'  Order By caracteristicas asc");
                                    while($linha_caracteristicas = mysql_fetch_array($select_caracteristicas)){
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
                                    $select_detalhes = mysql_query("SELECT id_detalhes, detalhes FROM tb_detalhes Order By detalhes asc");
                                    while($linha_detalhes = mysql_fetch_array($select_detalhes)){
                                    $id_detalhes = $linha_detalhes["id_detalhes"];
                                    $detalhes = $linha_detalhes["detalhes"];
                                    

                                    echo '<input  name="detalhes[]" class="form-check-input" type="checkbox" id="'.$id_detalhes.'" value="'.$id_detalhes.'"><label class="form-check-label" for="'.$id_detalhes.'">'.$detalhes.'</label>';
                                    echo '<br>';
                                    
                                    }	
                                ?>

                        </div>

                </div>
            </div>



            <input  type="hidden" id="id_imovel" name="id_imovel" value="<? echo"$id_imovel"?>">


            <p>&nbsp;</p>
            <input type="submit" name="Submit" value="<? if($id_imovel!=""){ echo"Editar"; }else{ echo"Cadastrar"; } ?>" class="btn btn-success" />


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