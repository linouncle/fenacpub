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


    <script type="text/javascript">
        jQuery(function($){
        $("#cep").change(function(){
            var cep_code = $(this).val();
            if( cep_code.length <= 0 ) return;
            $.get("http://apps.widenet.com.br/busca-cep/api/cep.json", { code: cep_code },
                    function(result){
                        if( result.status!=1 ){
                        alert(result.message || "Houve um erro desconhecido");
                        return;
                        }
                        $("input#cep").val( result.code );
                        $("input#estado").val( result.state );
                        $("input#cidade").val( result.city );
                        $("input#bairro").val( result.district );
                        var novo_endereco = result.address.split("-",1); 		
                        $("input#endereco").val( novo_endereco );
                        
                    });
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
        
        <h1><i class="fas fa-house-user"></i> Cadastro imóvel</h1>

        <div class="container">
            <div class="row">

            
          
                <div class="col-md-6">

                    

                    <form action="inserir_imovel.php" method="post" name="form1" id="form1" onSubmit="return checkform(this);">

                        <h2>Endereço</h2>


                            <label for="cep">CEP*:</label>
                            <input type="text" name="cep" id="cep" value="<? echo"$imovel->cep"; ?>" />

                            
                            <label for="estado" class="label_auto">Estado* (SP): </label>
                            <input type="text" name="estado" id="estado" value="<? echo"$imovel->estado"; ?>" maxlength="2"  />

                            <label for="cidade" >Cidade*: </label>
                            <input type="text" name="cidade" id="cidade" value="<? echo"$imovel->cidade" ?>"  />

                            <label for="bairro">Bairro*: </label>
                            <input type="text" name="bairro" id="bairro" value="<? echo"$imovel->bairro" ?>"  />
                            

                           
                            <label for="endereco">Endere&ccedil;o*: </label>
                            <input id="endereco" name="endereco" class="input_endereco" value="<? echo"$imovel->endereco" ?>"/ >

                            <label for="numero" class="label_menor">N&uacute;mero*: </label>
                            <input  name="numero" id="numero" class="input_numero"  value="<? echo"$imovel->numero" ?>"/ >

                            <label for="complemento" class="label_menor">Complemento: </label>
                            <input type="text"  name="complemento" id="complemento"  value="<? echo"$imovel->complemento" ?>"/ >
                            
                            <label for="condominio" class="label_auto">Condom&iacute;nio: </label>
                            <input type="text"  name="condominio" id="condominio"  value="<? echo"$imovel->condominio" ?>"  / >

                            <label for="edificio">Torre: </label>
                            <input type="text"  name="edificio" id="edificio" value="<? echo"$imovel->edificio" ?>" / >
                            

                            <?
                            if($id_imovel!=""){

                            echo"<input type='hidden'  name='id_imovel' id='id_imovel' value='$id_imovel'/>";	
                            }

                            ?>	


                        <h2>Informações</h2>

                          
                            <p>
                            <label for="descricao">Descri&ccedil;&atilde;o*:<br>
                            </label><span class="caracteres">255</span> <br>
                            <textarea name="descricao" id="descricao" cols="45" rows="5"><? echo"$imovel->descricao"; ?></textarea>
                            </p>


                            <p>
                            <label for="negociacao">Negocia&ccedil;&atilde;o: </label>
                            <select id="negociacao" name="negociacao" onChange="optionCheck()">
                            <option value="1" <? if($imovel->negociacao==1){ echo"selected"; } ?> >Vender</option>
                            <option value="2" <? if($imovel->negociacao==2){ echo"selected"; } ?> >Alugar</option>
                            <option value="3" <? if($imovel->negociacao==3){ echo"selected"; } ?> >Vender e Alugar</option>
                            </select>
                            </p>

                            <p>
                            <label for="tipo">Tipo: </label>
                            <select  name="tipo" id="tipo" onChange="muda_subtipo()">
                            <option value="0" selected="selected">Selecione</option>
                            <option value="Apartamento" <? if($imovel->tipo=="Apartamento"){ echo"selected"; } ?> >Apartamento</option>
                            <option value="Casa"		<? if($imovel->tipo=="Casa"){ echo"selected"; } ?> >Casa</option>
                            <option value="Comercial" 	<? if($imovel->tipo=="Comercial"){ echo"selected"; } ?> >Comercial</option>
                            <option value="Terreno" 	<? if($imovel->tipo=="Terreno"){ echo"selected"; } ?> >Terreno</option>
                            <option value="Rural" 		<? if($imovel->tipo=="Rural"){ echo"selected"; } ?> >Rural</option>
                            </select>


                            <?
                            if($imovel->tipo==''){
                            ?>

                            <label for="subtipo">Subtipo: </label>
                            <select name="subtipo">
                            <option value="Todos">Todos</option>
                            </select>

                            <?
                            }

                            if($imovel->tipo=='Apartamento' or $imovel->tipo=='Casa' or $imovel->tipo=='Comercial'){
                            ?>


                            <label for="subtipo">Subtipo: </label>
                            <select name="subtipo" id="subtipo">


                            <?
                            if($imovel->tipo=='Apartamento'){

                            ?>


                            <option value="Padr&atilde;o"  	<? if($imovel->subtipo=="Padr�o"){ echo"selected"; } ?>>Padr&atilde;o</option>
                            <option value="Cobertura" 		<? if($imovel->subtipo=="Cobertura"){ echo"selected"; } ?>>Cobertura</option>
                            <option value="Flat" <? if($imovel->subtipo=="Flat"){ echo"selected"; } ?>>Flat</option>
                            <option value="Kitnet/Studio" <? if($imovel->subtipo=="Kitnet/Studio"){ echo"selected"; } ?>>Kitnet/Studio</option>
                            <option value="Loft" <? if($imovel->subtipo=="Loft"){ echo"selected"; } ?>>Loft</option>

                            <?
                            }

                            if($imovel->tipo=='Casa'){
                            ?>
                            <option value="Padr&atilde;o" <? if($imovel->subtipo=="Padr�o"){ echo"selected"; } ?>>Padr&atilde;o</option>
                            <option value="Sobrado" <? if($imovel->subtipo=="Sobrado"){ echo"selected"; } ?>>Sobrado</option>
                            <option value="T&eacute;rrea" <? if($imovel->subtipo=="T�rrea"){ echo"selected"; } ?>>T&eacute;rrea</option>
                            <option value="Casa de Condom&iacute;nio" <? if($imovel->subtipo=="Casa de Condom�nio"){ echo"selected"; } ?>>Casa de Condom&iacute;nio</option>
                            <option value="Casa de Vila" <? if($imovel->subtipo=="Casa de Vila"){ echo"selected"; } ?>>Casa de Vila</option>

                            <?
                            }

                            if($imovel->tipo=='Comercial'){
                            ?>

                            <option value="Conjunto Comercial/sala" <? if($imovel->subtipo=="Conjunto Comercial/sala"){ echo"selected"; } ?>>Conjunto Comercial/sala</option>
                            <option value="Casa Comercial" <? if($imovel->subtipo=="Casa Comercial"){ echo"selected"; } ?>>Casa Comercial</option>
                            <option value="Loja Sal&atilde;o" <? if($imovel->subtipo=="Loja Sal�o"){ echo"selected"; } ?>>Loja Sal&atilde;o</option>
                            <option value="Galp&atilde;o" <? if($imovel->subtipo=="Galp�o"){ echo"selected"; } ?>>Galp&atilde;o</option>
                            <?
                            }

                            }
                            ?>
                            </select>
                            </p>


                            <p>
                            <label for="quartos" class="label_menor" ><span id="quartos_salas">Quartos</span>* </label>
                            <input type="text" id="quartos" name="quartos" class="valor_menor" value="<? echo"$imovel->quartos"; ?>">

                            <label for="suites" class="label_menor" id="label_suites" >Su&iacute;tes: </label>
                            <input type="text" id="suites" name="suites" class="valor_menor"  value="<? echo"$imovel->suites"; ?>">

                            <label for="banheiros" class="label_menor">Banheiros*: </label>
                            <input type="text" id="banheiros" name="banheiros" class="valor_menor"  value="<? echo"$imovel->banheiros"; ?>">


                            <label for="vagas" class="label_menor">Vagas*: </label>
                            <input type="text" id="vagas" name="vagas" class="valor_menor"  value="<? echo"$imovel->vagas"; ?>">

                            <label for="habitese" >Habite-se: </label>
                            <input type="text" id="habitese" name="habitese" class="valor_menor"  value="<? echo"$imovel->habitese"; ?>">
                            </p>

                        </div>

                        <div class="col-md-6">
                        
                        <h2>Valores</h2>

                            <label for="valor" class="label_menor">Venda*: </label>
                            <input type="text" min="0"   id="valor" name="valor"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" <? if($imovel->valor!="0"){ echo"value='$imovel->valor'"; } ?> > 

                            <label for="valor_locacao" class="label_menor">Loca&ccedil;&atilde;o*: </label>
                            <input type="text" min="0"   id="valor_locacao" name="valor_locacao"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" <? if($imovel->valor_locacao!="0"){ echo"value='$imovel->valor_locacao'"; } ?>  > 


                            <p>
                            <label for="valor_condominio" class="label_menor">Condom&iacute;nio: </label>
                            <input type="text" id="valor_condominio" name="valor_condominio"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" value="<? echo"$imovel->valor_condominio"; ?>" > 


                            <label for="iptu">IPTU: </label>
                            <input type="text" id="iptu" name="iptu"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl"  value="<? echo"$imovel->iptu"; ?>" > 
                            </p>


                            <p>

                            <label for="area_util" id="area_util_label">&Aacute;rea &uacute;til*: </label>
                            <input type="text" id="area_util" name="area_util"  value="<? if($imovel->area_util!=0){echo"$imovel->area_util";} ?>" >


                            <label for="area_total" id="area_total_label">&Aacute;rea total*: </label>
                            <input type="text" id="area_total" name="area_total" value="<? if($imovel->area_total!=0){echo"$imovel->area_total";} ?>" >

                            </p>

                        <h2>Outros dados</h2>

                            <p>
                            <label for="construtora">Construtora: </label>
                            <input type="text" id="construtora" name="construtora" value="<? echo"$imovel->construtora"; ?>" >
                            </p>

                            <p>

                            <label for="lancamento">Lan&ccedil;amento: </label>
                            <select name="lancamento" id="lancamento">
                            <option value="N">N&atilde;o</option>
                            <option value="S" <? if($imovel->lancamento=="S"){ echo"selected"; } ?>>Sim</option>
                            </select>

                            <label for="previsao">Previs&atilde;o: </label>
                            <input type="text" id="previsao" name="previsao"  value="<? echo"$imovel->previsao"; ?>" >
                            </p>

                            <input  type="hidden" id="id_imovel" name="id_imovel" value="<? echo"$id_imovel"?>">


                        <p>&nbsp;</p>
                        <input type="submit" name="Submit" value="<? if($id_imovel!=""){ echo"Editar"; }else{ echo"Cadastrar"; } ?>" class="botao" />

                   
                    </form>

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