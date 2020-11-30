<?php
   
  //   session_start(); // sempre que usarmos as sessions devemos chamar esse codigo sempre no inicio do script

//if(isset($_SESSION['login'])){// verifica se existe a varavel session

   $login=$_SESSION['login']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo
   
   $id_empresa=$_SESSION['id_empresa']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo


include 'includes/conexao.php';



?>

<?php include 'includes/header.php';?>


    <h1>Home</h1>	
    <p>Novidades sobre o sistema</p>
        
  

    <h1>Participantes cadastrados</h1>

		<?php
			
            // Conex&atilde;o com o banco de dados
            include 'inc/conexao.php';

            $sql = "SELECT * FROM tabela_empresa_2020_teste where login='$login' and id_empresa='$id_empresa'";
            $result = $conn->query($sql);
            $user = $result->fetch_object() ;
            
            $dia_atual = date("d");
            $mes_atual = date("m");
            $ano_atual = date("Y");
		?>


        <div class="container">
            <div class="row">

                <div class="col">
                    <?php
                    
                    


                    ?>

                </div>

            </div>
        </div>



        



 <?php  include 'includes/footer.php';?>

