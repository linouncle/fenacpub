<?php
   
     session_start(); // sempre que usarmos as sessions devemos chamar esse codigo sempre no inicio do script

if(isset($_SESSION['login'])){// verifica se existe a varavel session

   $login=$_SESSION['login']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo
   
   $id_usuario=$_SESSION['id_usuario']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo


   include 'includes/header.php';

    
$id_usuario_editar = $_POST['id_usuario_editar']; 
 
$nome = $_POST['nome']; 
$telefone = $_POST['telefone']; 
$email = $_POST['email']; 
$login_novo = $_POST['login_novo']; 
$senha = $_POST['senha']; 
$tipo_usuario = $_POST['tipo_usuario']; 
$ativo = $_POST['ativo']; 
$remoto = $_POST['remoto']; 
$creci = $_POST['creci']; 
$gerente = $_POST['gerente']; 

    $dia_atual = date("d");
    $mes_atual = date("m");
    $ano_atual = date("Y");
    $data_entrada = $ano_atual."-".$mes_atual."-".$dia_atual;


    $incluir = 0;
    $editar = 0;

$sql_editar_usuario = $conn->query("SELECT * FROM tabela_usuario where id_usuario='$id_usuario_editar'");
$editar_usuario = $sql_editar_usuario->fetch_object();

$sql_confere_usuario = $conn->query("SELECT * FROM tabela_usuario where login='$login_novo'");
$confere_usuario = $sql_confere_usuario->fetch_object();

if($confere_usuario ==""){
$sql = $conn->query("INSERT INTO tabela_usuario VALUES ('', '".$nome."', '".$telefone."', '".$email."', '".$login_novo."', '".$senha."', '".$tipo_usuario."', '".$ativo."', '".$creci."', '".$data_entrada."', '', '".$hora_inicial."', '".$hora_final."')");

$incluir = 1;

}

if($id_usuario_editar !=""){

$sql_alterar = $conn->query("UPDATE tabela_usuario SET  nome='$nome', fone='$telefone',  email='$email', login='$login_novo', senha='$senha', tipo_usuario='$tipo_usuario', ativo='$ativo', creci='$creci', data_desligamento='$data_desligamento', hora_inicial='$hora_inicial', hora_final='$hora_final'WHERE id_usuario ='$id_usuario_editar' "); 	

$editar = 1;

}

?>





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



        <div class="container">
            <div class="row">

                <div class="col">
                    <?php

                        if($incluir==1){
                              echo'<h1>Novo usuário incluído com sucesso!</h1>';  

                        }

                        if($editar==1){
                            echo'<h1>Usuário editado com sucesso!</h1>';  

                        }

                        if($editar==0 and $incluir==0){
                            echo'<h1>Usuário não salvo. Confira se este login já não é cadastrado.</h1>';  

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