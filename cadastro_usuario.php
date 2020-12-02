<?php
   
     session_start(); // sempre que usarmos as sessions devemos chamar esse codigo sempre no inicio do script

if(isset($_SESSION['login'])){// verifica se existe a varavel session

   $login=$_SESSION['login']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo
   
   $id_usuario=$_SESSION['id_usuario']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo


   include 'includes/header.php';

    $dia_atual = date("d");
    $mes_atual = date("m");
    $ano_atual = date("Y");


    $id_usuario_editar = $_GET['id_usuario_editar'];
    $editar = $_GET['editar'];
    $excluir = $_GET['excluir'];


    if($editar=="sim"){
        
    $sql_usuario = $conn->query("SELECT * FROM tabela_usuario WHERE id_usuario='$id_usuario_editar' ");     
    $usuario =$sql_usuario->fetch_object();
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

		<?php
			
            // Conex&atilde;o com o banco de dados
            include 'inc/conexao.php';

            
            
            $dia_atual = date("d");
            $mes_atual = date("m");
            $ano_atual = date("Y");
		?>


        <div class="container">
            <div class="row">

                <div class="col">

                    <h1><i class="fas fa-house-user"></i> Cadastro usuário</h1>

                    <form action="inserir_usuario.php" method="post" name="form1" id="form1" onSubmit="return checkform(this);">

                        <p>
                        <label for="nome">Nome: </label>
                        <input type="text" name="nome" id="nome" value="<?php echo"$usuario->nome"; ?>" <?php if($editar=="sim"){ echo"readonly"; } ?> />
                        </p>

                        <p>
                        <label for="telefone">Telefone: </label>
                        <input type="text" name="telefone" id="telefone" value="<?php echo"$usuario->fone"; ?>" >
                        </p>


                        <p>
                        <label for="email">Email: </label>
                        <input  type="text" name="email" id="email" value="<?php echo"$usuario->email"; ?>">
                        </p>

                        <p>
                        <label for="login_novo">Login: </label>
                        <input type="text" name="login_novo" id="login_novo" value="<?php echo"$usuario->login"; ?>">
                        </p>

                        <p>
                        <label for="senha">Senha: </label>
                        <input type="password" name="senha" id="senha" value="<?php echo"$usuario->senha"; ?>">
                        </p>

                        <p>
                        <label for="senha2">Confirme a senha: </label>
                        <input type="password" id="senha2" name="senha2" value="<?php echo"$usuario->senha"; ?>">
                        </p>



                        <p>
                        <label for="tipo_usuario">Tipo de usu&aacute;rio: </label>
                        <select name="tipo_usuario" onChange="showDiv(this.value);">

                        <option value="0" selected>Selecione</option>
                        <option value="1"	<?php if($usuario->tipo_usuario==1){ echo"selected"; } ?>>Administrador</option>
                        <option value="2"	<?php if($usuario->tipo_usuario==2){ echo"selected"; } ?>>Corretor</option>
                        <option value="3"	<?php if($usuario->tipo_usuario==3){ echo"selected"; } ?>>Secret&aacute;riado</option>
                        <option value="4"	<?php if($usuario->tipo_usuario==4){ echo"selected"; } ?>>Gerente</option>
                        </select>
                        </p>



                        <p>
                        <label for="creci">CRECI: </label>
                        <input type="text" name="creci" id="creci" value="<?php echo"$usuario->creci"; ?>">
                        </p>

                        <p>
                        <label for="ativo">Ativo: </label>
                        <select name="ativo">
                        <option value="0" <?php if($usuario->ativo==0){ echo"selected"; } ?>>Sim</option>
                        <option value="1" <?php if($usuario->ativo==1){ echo"selected"; } ?>>N&atilde;o</option>
                        </select>
                        </p>

                            <?php
                            if($usuario!=""){
                            ?>
                             <input type="hidden" name="id_usuario_editar" id="id_usuario_editar" value="<?php echo"$usuario->id_usuario"; ?>">

                            <?php
                            }
                            ?>
                        <input type="submit" name="Submit" value="Cadastrar" class="btn btn-success" />


                        
                        
                    </form>

                </div>

                <div class="col">

                    <h1><i class="fas fa-house-user"></i>  Usuários cadastrados</h1>

                        <div class=" bloco_lista">
                        
                        <?php

                        $sql_usuarios = $conn->query("SELECT * FROM tabela_usuario   ORDER BY nome ");     
                        while( $usuarios = $sql_usuarios->fetch_object()){

                            echo"<p>";
                            echo"$usuarios->nome - ";
                            echo"<a href='cadastro_usuario.php?editar=sim&id_usuario_editar=$usuarios->id_usuario'>editar</a>";
                            echo" - <a href='excluir_usuario.php?id_usuario_editar=$usuarios->id_usuario'>excluir</a>";
                            echo"</p>";
                        }

                        ?>
                        </div>

                </div>



            </div>
        </div>



        



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