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

        <form action="inserir_imovel.php" method="post" name="form1" id="form1" onSubmit="return checkform(this);">

                            <?
                            if($id_imovel!=""){

                            echo"<input type='hidden'  name='id_imovel' id='id_imovel' value='$id_imovel'/>";	
                            }

                            ?>	

            <div class="container">
                <div class="row">

                        
                
            
                            <div class="col-md-7">


                                    <h2 clas="tarja_titulo">Endereço</h2>

                                    <div class="container">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="negociacao">Negocia&ccedil;&atilde;o: </label>
                                                <select id="negociacao" name="negociacao" onChange="optionCheck()">
                                                <option value="1" <? if($imovel->negociacao==1){ echo"selected"; } ?> >Vender</option>
                                                <option value="2" <? if($imovel->negociacao==2){ echo"selected"; } ?> >Alugar</option>
                                                <option value="3" <? if($imovel->negociacao==3){ echo"selected"; } ?> >Vender e Alugar</option>
                                                </select>
                                            </div> 

                                            <div class="col-md-4">
                                                <label for="tipo">Tipo: </label>
                                                <select  name="tipo" id="tipo" onChange="muda_subtipo()">
                                                <option value="0" selected="selected">Selecione</option>
                                                <option value="Apartamento" <? if($imovel->tipo=="Apartamento"){ echo"selected"; } ?> >Apartamento</option>
                                                <option value="Casa"		<? if($imovel->tipo=="Casa"){ echo"selected"; } ?> >Casa</option>
                                                <option value="Comercial" 	<? if($imovel->tipo=="Comercial"){ echo"selected"; } ?> >Comercial</option>
                                                <option value="Terreno" 	<? if($imovel->tipo=="Terreno"){ echo"selected"; } ?> >Terreno</option>
                                                <option value="Rural" 		<? if($imovel->tipo=="Rural"){ echo"selected"; } ?> >Rural</option>
                                                </select>
                                            </div> 


                                            <div class="col-md-4">
                                                <label for="subtipo">Subtipo: </label>
                                                <select name="subtipo">
                                                <option value="Todos">Todos</option>
                                                </select>
                                            </div> 

                                        </div> 


                                        <div class="row">

                                            <div class="col-md-3">
                                            <label for="cep">CEP*:</label><br>
                                            <input type="text" name="cep" id="cep" value="<? echo"$imovel->cep"; ?>" />
                                            </div>

                                        </div>  

                                        

                                        <div class="row">

                                            <div class="col">
                                            <label for="endereco">Endere&ccedil;o*: </label><br>
                                            <input id="endereco" name="endereco" class="input_endereco" value="<? echo"$imovel->endereco" ?>"/ >
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

                                            <div class="col-md-3">
                                            <label for="cep">CEP*:</label>
                                            <input type="text" name="cep" id="cep" value="<? echo"$imovel->cep"; ?>" />
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

                                    <h2 clas="tarja_titulo">Características</h2>

                                    <div class="container">

                                        <div class="row">

                                            <div class="col-md-2">
                                            <label for="quartos" class="label_menor" >Quartos </label>
                                            <input type="text" id="quartos" name="quartos" class="valor_menor" value="<? echo"$imovel->quartos"; ?>">
                                            </div>

                                            <div class="col-md-2">
                                            <label for="suites" class="label_menor" id="label_suites" >Su&iacute;tes </label>
                                            <input type="text" id="suites" name="suites" class="valor_menor"  value="<? echo"$imovel->suites"; ?>">
                                            </div>

                                            <div class="col-md-2">
                                            <label for="banheiros" class="label_menor">Banheiros</label>
                                            <input type="text" id="banheiros" name="banheiros" class="valor_menor"  value="<? echo"$imovel->banheiros"; ?>">
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

                                            <div class="col-md-3">
                                            <label for="habitese" >Habite-se: </label>
                                            <input type="text" id="habitese" name="habitese" class="valor_menor"  value="<? echo"$imovel->habitese"; ?>">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="andares" class="label_menor" id="label_suites" >Andares: </label>
                                            <input type="text" id="suites" name="andares" class="valor_menor"  value="<? echo"$imovel->andares"; ?>">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="por_andar" class="label_menor">Ap por andar*: </label>
                                            <input type="text" id="por_andar" name="por_andar" class="valor_menor"  value="<? echo"$imovel->por_andar"; ?>">
                                            </div>

                                            <div class="col-md-3">
                                            <label for="vagas" class="label_menor">Vagas*: </label>
                                            <input type="text" id="vagas" name="vagas" class="valor_menor"  value="<? echo"$imovel->vagas"; ?>">
                                            </div>

                                        </div>  

                                    </div>    
                                
                        
                            </div>

                            <div class="col-md-5">
                            
                                <h2 clas="tarja_titulo">Valores</h2>

                                <div class="container">

                                    <div class="row">

                                        <div class="col-md-6">
                                        <label for="valor" class="label_menor">Venda*: </label>
                                        <input type="text" min="0"   id="valor" name="valor"  onKeyUp="maskIt(this,event,'###.###.###,##',true)" dir="rtl" <? if($imovel->valor!="0"){ echo"value='$imovel->valor'"; } ?> > 
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

                                <h2 clas="tarja_titulo">Proprietário</h2>

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

                                <h2 clas="tarja_titulo">Informações</h2>

                            
                                    <p>
                                    <label for="descricao">Descri&ccedil;&atilde;o*:<br>
                                    </label><span class="caracteres">255</span> <br>
                                    <textarea name="descricao" id="descricao" cols="45" rows="5"><? echo"$imovel->descricao"; ?></textarea>
                                    </p>    

                            
                                    <h2 clas="tarja_titulo">Outros dados</h2>

                                    

                            </div>        


                </div>    
                <div class="row"> 

                        <div class="col-md-6">
                            <h2>Detalhes condomínio</h2>

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

                            <h2>Detalhes imóvel</h2>

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
            <input type="submit" name="Submit" value="<? if($id_imovel!=""){ echo"Editar"; }else{ echo"Cadastrar"; } ?>" class="btn-success" />


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