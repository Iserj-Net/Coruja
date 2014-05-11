<?php 
	
$host = "iserj.net"; 
$db = "iserj973_coruja2";
$user = "iserj973_lou";
$pass = "alterar1104";

//conectando ao servidor
$conn=mysql_connect($host,$user,$pass) or die("Nao foi possivel conectar no servidor");

//conectando ao banco
$db = mysql_select_db($db, $conn) or die("Nao foi possivel conectar no banco de dados");

?>