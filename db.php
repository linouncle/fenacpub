<?php
class DB{
	function __construct(){
		//database configuration
		$dbServer = 'sistema_coli.mysql.dbaas.com.br'; //Define database server host
		$dbUsername = 'sistema_coli'; //Define database username
		$dbPassword = 'linera13579'; //Define database password
        $dbName = 'sistema_coli'; //Define database name

		
		//connect databse
		$con = mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
		if(mysqli_connect_errno()){
			die("Failed to connect with MySQL: ".mysqli_connect_error());
		}else{
			$this->connect = $con;
		}
	}
	
	function getRows(){
		
		$id_imovel = $_GET['id_imovel'];
		
		if($id_imovel==""){
		$id_imovel = $_POST['id_imovel'];
		
        }
        
        echo  $id_imovel ;
		
		$query = mysqli_query($this->connect,"SELECT * FROM tb_imoveis_fotos WHERE id_imovel='$id_imovel' ORDER BY `ordemfoto` ASC") or die(mysql_error());
		while($row = mysqli_fetch_assoc($query))
		{
			$rows[] = $row;
		}
		return $rows;
	}
	
	function updateOrder($id_array){
		$count = 1;
		foreach ($id_array as $id_foto){

	
			$update = mysqli_query($this->connect,"UPDATE tb_imoveis_fotos SET `ordemfoto` = $count WHERE id_foto = $id_foto");
			$count ++;	
		}
		return true;
	}
}
?>