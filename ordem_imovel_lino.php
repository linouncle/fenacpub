<?php
   
     session_start(); // sempre que usarmos as sessions devemos chamar esse codigo sempre no inicio do script

if(isset($_SESSION['login'])){// verifica se existe a varavel session

   $login=$_SESSION['login']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo
   
   $id_empresa=$_SESSION['id_empresa']; // passa o valor da variavel session para outra variavel so que uma variavel dentro do mesmo arquivo



?>

<?php include 'includes/header.php';?>

<style>
.input_auto{
    width:auto;
}
.label_100{
    width:100px;
    text-align:right;
}
.label_center{
    text-align:center;
    width:100%;
}
.info_center{
    text-align:center;
    width:100%;
}
.bloco_cinza{
    background:#eee;
	padding:10px;
}
.dividi_linha{
/*	border-bottom:solid thin #333;
	padding: 5px 0 0; */
}
.col, 
.col-md-2, 
.col-md-3, 
.col-md-4, 
.col-md-6, 
.col-md-8,
.col-md-12{
    border:solid thin;
} 
.anula_borda {
	border:none !important;
}

</style>
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  

<script type="text/javascript">
$(document).ready(function(){
	$('.reorder_link').on('click',function(){
		$("ul.reorder-photos-list").sortable({ tolerance: 'pointer' });
		$('.reorder_link').html('save reordering');
		$('.reorder_link').attr("id_foto","save_reorder");
		$('#reorder-helper').slideDown('slow');
		$('.image_link').attr("href","javascript:void(0);");
		$('.image_link').css("cursor","move");
		$("#save_reorder").click(function( e ){
			if( !$("#save_reorder i").length )
			{
				$(this).html('').prepend('<img src="images/refresh-animated.gif"/>');
				$("ul.reorder-photos-list").sortable('destroy');
				$("#reorder-helper").html( "Reordering Photos - This could take a moment. Please don't navigate away from this page." ).removeClass('light_box').addClass('notice notice_error');
	
				var h = [];
				$("ul.reorder-photos-list li").each(function() {  h.push($(this).attr('id_foto').substr(9));  });
				$.ajax({
					type: "POST",
					url: "order_update.php",
					data: {ids: " " + h + ""},
					success: function(html) 
					{
						window.location.reload();
						$("#reorder-helper").html( "Reorder Completed - Image reorder have been successfully completed. Please reload the page for testing the reorder." ).removeClass('light_box').addClass('notice notice_success');
						$('.reorder_link').html('reorder photos');
						$('.reorder_link').attr("id_foto","");
					}
					
				});	
				return false;
			}	
			e.preventDefault();		
		});
	});
	
});
</script>





<h1>Ordenar fotos </h1>
<p>Preencha os campos abaixo para cadastrar. Os campos marcados com * são de preenchimento obrigatórios.</p>
<!-- Form -->


		
	<div class="container">
		<div class="row">
			<div class="col">
			
                                                
                            <!-- REORGANIZAR EDELETAR  -->

                            <div class="fotos_imovel" id="fotos_organizar">
                                        
                                        <a href="javascript:void(0);" class="btn outlined mleft_no reorder_link" id="save_reorder">Reorganizar as fotos</a>
                                        <div id="reorder-helper" class="light_box" style="display:none;">1. Arraste as fotos para reorganizar.<br>2. Click 'Salvar nova ordem' quando terminar.
                                        </div>
                                        
                                            <div class="gallery">
                                                <form name="form1" method="post" action="imovel.php#fotos_organizar">
                                                
                                                    <ul class="reorder_ul reorder-photos-list">

                                                    <style>
                                                        li{
                                                            display:inline-block;
                                                        }
                                                    </style>
                                                    <?php 

                                                    $id_imovel = $_GET['id_imovel'];
                                                                                                            

                                                    //INCLUDE GALERIA
                                                    function getRows(){
		
                                                        $select_foto1 = mysql_query("SELECT * FROM tb_imoveis_fotos Where id_imovel = '$id_imovel' and destaque != 1 Order By destaque desc, ordemfoto asc, id_foto asc");
    					                                while($row = mysql_fetch_array($select_foto1)){
                                                        
                                                            $rows[] = $row;
                                                        }
                                                        return $rows;
                                                    }
                                                    
                                                    function updateOrder($id_array){
                                                        $count = 1;
                                                        foreach ($id_array as $id_foto){
                                                            $update = mysqli_query($this->connect,"UPDATE tb_imoveis_fotos SET `ordemfoto` = $count WHERE id_foto = $id_foto");
                                                            $count ++;	

                                                            echo $id_foto ;
                                                        }
                                                        return true;
                                                    }

                                                        //Fetch all images from database
                                                        
                                                       
                                                        
                                                        $select_foto1 = mysql_query("SELECT * FROM tb_imoveis_fotos Where id_imovel = '$id_imovel' and destaque != 1 Order By destaque desc, ordemfoto asc, id_foto asc");
    					                                while($row = mysql_fetch_array($select_foto1)){
                                                            ?>
                                                            <li id="image_li_<?php echo $row['id_foto']; ?>" class="ui-sortable-handle col-md-3 fotos-galeria"><a href="javascript:void(0);" class="image_link"><img src="img/<?php echo $row['foto']; ?>" alt=""></a><br>
                                                        
                                                            <input name="fotos[]" id="fotos[]" value="<?php echo $row['id_foto']; ?>"  type="checkbox" ><label class="label_ate">Selecionar</label>
                                                
                                                        
                                                        </li>
                                                        <?php } ?>
                                                    </ul>
                                                    
                                                    <input type="hidden" name="id_imovel" id="id_imovel" value="<? echo $id_imovel ?>" >	
                                                    <input type="submit" name="enviar" id="enviar" value="apagar fotos">

                                                    </form>
                                            </div>
                                </div>

			</div>
			
		</div>
	</div>
			
			



<!-- Fim Conteúdo -->

        



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