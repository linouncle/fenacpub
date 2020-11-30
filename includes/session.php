<?php
session_start();
$id_imovel = $_POST['id_imovel'];
if( isset( $_POST['acao'] ) && $_POST['acao'] == "add" ){
  $_SESSION["favoritos"][$id_imovel] = $_POST['id_imovel'];
}else if( isset( $_POST['acao'] ) && $_POST['acao'] == "del" ){
  unset($_SESSION["favoritos"][$id_imovel]);
}else if( isset( $_POST['acao'] ) && $_POST['acao'] == "limpar" ){
  unset($_SESSION["favoritos"]);
}		
?>