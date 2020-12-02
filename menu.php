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

                           $sql_imovel = "SELECT * FROM tabela_imovel  Order by id_imovel DESC LIMIT 10";
                            $result = $conn->query($sql_imovel);
                             

                       // $sql_imovel = mysql_query("SELECT * FROM tabela_imovel  Order by id_imovel DESC LIMIT 10");
                        
                        while($imovel = $result->fetch_assoc() ){

                            $id_imovel =  $imovel["id_imovel"];

                            $bairro =  $imovel["bairro"];
                            $valor_venda =  $imovel["valor_venda"];
                            $valor_locacao =  $imovel["valor_locacao"];
                            $acodigo =  $imovel["acodigo"];
                            
                            $edificio =  $imovel["edificio"];
                            $empreendimento =  $imovel["empreendimento"];
                            $tipo =  $imovel["tipo"];
                            $logradouro =  $imovel["logradouro"];
                            $endereco =  $imovel["endereco"];
                            $numero =  $imovel["numero"];
                            $unidade =  $imovel["unidade"];
                            $andar_r =  $imovel["andar_r"];
                            $bloco =  $imovel["bloco"];
                            $cidade =  $imovel["cidade"];

                            echo'<div class="container bloco_lista ">';
                                echo'<div class="row ">';
                                    
                                    echo'<div class="col-md-4 ">';

                                       $sql_foto = $conn->query("SELECT * FROM tb_imoveis_fotos WHERE id_imovel ='$id_imovel'  Order by destaque ");
                                
                                       $foto = $sql_foto->fetch_assoc();

                                       if($foto!=""){
                                            echo'<img src="img/'.$foto["foto"].'">';
                                       }

                                    echo'</div>';

                                    echo'<div class="col-md-8 ">';
                                
                                        echo"<h2>Bairro: $bairro</h2>";
                                        echo"<h3>Venda: $valor_venda</h3>";
                                        echo"<h3>Locação: $valor_locacao</h3>";

                                        echo"<p>Referencia: $acodigo - Novo id importação: $id_imovel</p>";
                                        echo"<p>Edifício: $edificio";
                                        echo" - Condominio: $empreendimento</p>";
                                        echo"<p>Tipo: $tipo</p>";
                                    
                                        echo"$logradouro";
                                        echo"$endereco , ";
                                        echo"$numero ";
                                        echo" - Unidade: $unidade";
                                        echo" - Andar: $andar_r";
                                        echo" - Bloco: $bloco</p>";
                                        echo"<p>Bairro: $bairro</p>";
                                        echo"<p>Cidade: $cidade</p>";

                                        echo"<p><a href='imovel.php?id_imovel=$id_imovel' class='btn btn-success'> Ver detalhes</a></p>";

                                    echo'</div>';

                                echo'</div>';


                            echo'</div>';

                        }
                    


                    ?>

                </div>

            </div>
        </div>



        



 <?php  include 'includes/footer.php';?>


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