<!doctype html>
<html>
<head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>

  
<title>Baroni sistema</title>

<style>
	body{
		background: #000;
	}
	img{
		max-width: 100%;
	}
	.principal{
		max-width: 1200px;
		margin: 0 auto;
		background: #fff;
	}
	.logo{
		max-width: 600px;
		margin: 0 auto;
		padding: 20px;
	}

	
	
	.menu{
		margin-bottom:20px;
		padding: 10px;
		background: #EB882C;
	}
	.menu ul{
		margin: 5px;
	}	
	.menu li{
		display: inline;
	}	
	.menu a{
		color: #fff;
		padding: 10px;
		margin: 20px;
	}	
	.conteudo{
		padding: 20px;
	}
	label {
    display: block;
	}
	.container{
		margin-bottom: 20px;
	}


	.input_menor{
		width: 80px;
	}
	.input_medio{
		width: 160px;
	}
	
	.input_maior{
		width: 280px;
	}
	.input_endereco{
		width: 80%;
	}
	.box_endereco{
		padding: 20px 0;
		background: #eee;
	}
	.titulo_separador{
		text-align: center;
		border-bottom: solid thin;
		font-size: 20px;
		margin-top: 10px;
	}
	.centraliza{
		text-align: center;
	}
	.fundo_laranja{
		background: #fde2b7;
	}
	.fundo_cinza{
		background: #eee;
		padding: 20px;
	}
	.bairros_lista{
		    height: 180px;
    margin: 10px 0 20px;
	}
	
	
@media only screen and (min-width: 600px) {
	label {
    width: 100px;
	text-align: right;
	display: inline-block;
	}
	textarea {
    width: 100%;
    height: 150px;
	}
}
	
</style>
</head>

<body>

<div class="principal">
	
	<header>
		
        <div class="logo">
            <img src="https://pharmameetingbrazil.com.br/img/logo_evento.jpg" alt="Logotipo Pharma Meeting Brazil ">
        </div>
		
		<div class="menu">
			<p style="color:#fff; text-align:center;font-size:24px;"><b>Área restrita para usuários</b></p>
			
		</div>
		
		
	</header>

    <main>
        <div class="conteudo" style="margin: auto; max-width:300px;">
            <h1>Login</h1>
                <form id="form1" name="form1" method="post" action="valida.php" >

                <p class="style1">Usuário<br />
                <input name="login" type="text" class="style4" id="login"  />
                </p>

                <p class="style1">Senha<br />
                <input name="senha" type="password" class="style4" id="senha"  />
                </p>


                <p>
                <input type="submit" name="Submit" value="Enviar" id="Submit" class="botao" />
                </p>
                </form>
        </div>
    </main>

    <footer style="padding:20px; color:#fff; background:#333">
        <div class="rodape">
            <p>Desenvolvido por Uncle.com.br</p>
        </div>
    </footer>

</div>


</body>
</html>
