<?php 
include("include/conexao.php");
session_start();
session_destroy();


	$op = isset($_GET['op']) ? $_GET['op'] : '';
	



	if($op == 1){
		
			$usuario = trim(addslashes($_POST["usuario"]));
			$senha = trim(addslashes($_POST["senha"]));
						
			$SQL = "SELECT idUsuario,usuario, senha, ativo from usuario where ativo = 1 and usuario = '$usuario' and senha = '$senha'";
			//echo $SQL; exit;
			$result = mysql_query($SQL,$conn) or die("Erro na query!<br>" . mysql_error());
			$row = mysql_fetch_array($result ,MYSQL_ASSOC);
			
			if(empty($row)){
				
				//echo "login nao encontrado";
				
			}else{
				
				session_start();
				$_SESSION['idUsuario'] = $row["idUsuario"];
				$_SESSION['usuario'] = $row["usuario"];
			
				header("Location: inicio.php");

				
				
			}
			
			
				/*while ($row = mysql_fetch_array($result ,MYSQL_ASSOC)) {
					echo $row['login'] . '<br>';
				}*/
				
		
}
	
	
	
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $nomeSistema ?></title>
    <link rel="shortcut icon" href="img/favIcon.png">

    <!-- build:css css/bootstrap.min.css --> 
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- endbuild --> 
    <!-- build:css css/main.min.css --> 
    <link href="css/main.css" rel="stylesheet">
    <!-- endbuild --> 
  </head>

  <body>
  
  
  <div id="aberturaSistema">SECRETARIA ADACÊMICA DO ENSINO SUPERIOR - ISERJ</div>
  

       <div class="container">

  <form class="form-signin"  method="post" action="index.php?op=1">
  
  
 
  <br/>
      <img src="img/logoLogin.png" alt="Coruja" width="266" height="82" class="img-responsive center-block"/> <br/>
      
    <!-- MENSAGEM -->

   <?php if($op == 1){ ?> <div class="alert alert-danger" id="loginErro"><strong>Ocorreu um erro!</strong><br/>Usuário ou Senha inválidos</div>  <?php };?>
   
 	<!-- FIM MENSAGEM -->
      
      <input type="text" name="usuario" id="usuario"  minlength="2"  class="form-control"  placeholder="USUÁRIO" required/>
      <input type="password" name="senha" id="senha"  minlength="2"  class="form-control"  placeholder="SENHA" required/> 
     
     <div id="esqueceuSenha">
     <a href="esqueciSenha.php" class="black">
   	 <img src="img/icons/senha.gif" width="25" height="25" class="pull-left">
      Esqueceu a Senha?</a>
     </div>
     
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
  
</form>

    </div> 

  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- build:js js/bootstrap.min.js -->
	<script src="js/bootstrap.js"></script>
    <!-- endbuild -->
    <!-- build:js js/jquery.validate/jquery.validate.min.js --> 
    <script src="js/jquery.validate/jquery.validate.min.js"></script>
    <script src="js/jquery.validate/jquery.validateAddBR.js"></script>
    <!-- endbuild -->
    <!-- build:js js/jquery.mask/jquery.mask.min.js --> 
    <script src="js/jquery.mask/jquery.mask.js"></script>
    <script src="js/jquery.mask/jquery.maskModel.js"></script>
    <!-- endbuild -->
    
    <script>
	
    $(function(){
		
		
		var validator = $("form").validate();
		$("#loginErro").delay(3000).fadeOut('slow','swing');
		
	});
    
    </script>
  </body>
</html>
