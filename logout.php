<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UFT-8" />
<title>Untitled Document</title>
</head>

<body>



<?
session_start(); //iniciamos a sess�o que foi aberta

session_destroy(); //pei!!! destruimos a sess�o ;)
session_unset(); //limpamos as variaveis globais das sess�es

echo "<script>alert('Você saiu do sistema!');top.location.href='index.php';</script>"; /*aqui voc� pode por alguma coisa falando que ele saiu ou fazer como eu, coloquei redirecionar para uma certa p�gina*/

?>





</body>
</html>
