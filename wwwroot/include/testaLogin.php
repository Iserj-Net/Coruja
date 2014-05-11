<?php 
//Testa Login
session_start();

if  (empty($_SESSION['idUsuario'])) { 
	header("Location: index.php"); 
}
?>