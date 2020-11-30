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
		?>


        <div class="container">
            <div class="row">

                <div class="col">
                    <h1><i class="fas fa-home"></i> Últimos cadastrados</h1>


                    <?php

                        $sql_imovel = mysql_query("SELECT * FROM tabela_imovel  Order by id_imovel DESC LIMIT 10");
                        
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