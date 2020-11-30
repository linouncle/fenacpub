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
	
	
	<!-- fontawesome CSS -->
	<script src="https://kit.fontawesome.com/e5bb3d5385.js" crossorigin="anonymous"></script>


<title>FENAC sistema</title>

<style>
	body{
		background: #000;
	}
	img{
		max-width:100%;
	}
	h1, h2, h3{
		font-weight:700;
	}
	h1{
		font-size: 2.0rem;
		border-bottom: solid thin;
		background: #078080;
		color: #fff;
		padding: 10px;
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
   		text-align:center;
	}
	
	.menu{
		margin-bottom:20px;
		padding: 10px;
		background: #559922;
	}

	.menu-desktop{
		display:none;
	}
	.menu-celular{
		display:block;
		text-align: center;
	}
	.menu_celular_lista{
		margin:0;
		padding:0;
	}

	.menu ul{
		margin: 5px;
	}	
		

	.menu li{
		display: block;
		border-bottom: solid thin #fff;
		border-top: solid thin #fff;
	}
	.menu a{
		color: #fff;
		padding: 10px;
		display: block;
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
    .rodape{
        padding: 20px;
        text-align: right;
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
		width: 100%;
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
    select{
        min-width: 150px;
    }
	.bloco_data{
		padding: 10px;
		background:#333;
		margin: 5px;
		color:#fff;
		}
	.bloco_horario{
		padding: 10px;
		background:#eee;
		margin: 5px;
	}
	.bloco_horario_reuniao{
		padding: 10px;
		background:#98FB98;
		margin: 5px;
	}
	.bloco_horario_bloqueado{
		padding: 10px;
		background:#F0E68C;
		margin: 5px;
	}
	.bloco_lista{
		padding: 20px;
		background: #eee;
		margin: 10px 0;
	}
	.bloco_endereco{
		padding: 20px;
		background: #eee;
		margin: 10px 0;
	}
	.tarja_titulo{
		font-size: 2.0rem;
		background: #078080;
		color: #fff;
		padding: 10px;
	}
	.form-check-label{
		margin:0;
	}
	.form-check-input {
		position: absolute;
		margin-top: .3rem;
		margin-left: -1.25rem;
		display: inline-block;
		width: 20px;
	}
	
	
@media only screen and (min-width: 600px) {
	label {
	display: inline-block;
	margin: 10px 0 0 0;
	}
	input{
		width:100%;
	}

	textarea {
    width: 100%;
    height: 150px;
	}

	.menu-desktop{
		display:block;
	}
	.menu-celular{
		display:none;
	}

	.menu a{
		margin: 0 20px;
		display: inline-block;
	}

	.menu ul{
		margin: 0;
		padding: 0;
	}
	.menu li{
		display: inline;
		border:none;
	}

}
	
</style>
</head>

<body>


<div class="principal">
	
	<header>
		
             <div class="logo">
			 	<a href="menu.php"><img src="img/logo-topo.png" alt="logo fenac" /></a>q
             </div>
		
            <div class="menu">

				<div class="menu-desktop">

					<nav>
						<ul>
						<li><a href="menu.php">Home</a></li>
						<li><a href="cadastro_imovel.php">Novo imóvel</a></li>
						<li><a href="busca_imovel.php">Busca</a></li>
						<li><a href="cadastro_usuario.php">Usuário</a></li>
						</ul>
					</nav>

				</div>

				<div class="menu-celular">


					<button class="btn btn-light" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
					Menu
					</button>
					
					<div class="collapse" id="collapseExample">
						<div class=" card-body">
							<nav>
								<ul class="menu_celular_lista">
									<li><a href="menu.php">Home</a></li>
									<li><a href="cadastro_imovel.php">Novo imóvel</a></li>
									<li><a href="busca_imovel.php">Busca</a></li>
									<li><a href="cadastro_usuario.php">Usuário</a></li>
								</ul>
							</nav>

						</div>
					</div>

				</div>	
                
            </div>
		
		
	</header>

	<?

		// Conex&atilde;o com o banco de dados
		include 'conexao.php';
        
        $sql = mysql_query("SELECT * FROM tabela_usuario where login='$login'");     
        $user = mysql_fetch_object($sql) ;
        
        echo"<hr>";
        
        echo"<p style='margin-left:20px'>Ol&aacute;, ";
        echo"$user->nome. Bem-vindo!.</p>";
        
        echo"<hr>";
		
		
        
    ?>

    <div class="conteudo">


