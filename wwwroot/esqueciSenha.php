<?php
include("include/conexao.php");
session_start();
session_destroy();

$op = isset($_GET['op']) ? $_GET['op'] : '';
$enviado = '';

	if($op == 1){
		
			$email = trim(addslashes($_POST["email"]));
			
						
			$SQL = "SELECT idUsuario,usuario, senha, ativo from usuario where ativo = 1 and email = '$email' ";
			//echo $SQL; exit;
			$result = mysql_query($SQL,$conn) or die("Erro na query!<br>" . mysql_error());
			$row = mysql_fetch_array($result ,MYSQL_ASSOC);
			
			if(empty($row)){
				
				$enviado=0;
				
			}else{
				
				$enviado=1;
				
					$to 	  = $email;
					$subject  = "CORUJA - Recuperação de Senha";
					$from 	  = "coruja@iserj.net";
					$message = "Olá, você solicitou a recuperação de sua Senha do sistema Coruja!<br> Sua Senha é: <strong>". $row["senha"]. "</strong>";
					
					
					
					$headers = "From: " . $from . "\r\n";
					$headers .= "Reply-To: ".  $from . "\r\n";
					//$headers .= "CC: susan@example.com\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=utf-8\r\n";
					

					mail( $email,$subject,$message,$headers);
				
				
				
	
			}
			
			
		
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

       <div class="container">

  <form class="form-signin"  method="post" action="esqueciSenha.php?op=1">
  
  
 
  <br/>
      <img src="img/logoLogin.png" alt="Coruja" width="266" height="82" class="img-responsive center-block"/> <br/>
      
    <!-- MENSAGEM -->

   <?php if($enviado === 0){ ?> <div class="alert alert-danger" id="loginErro" ><strong>Ocorreu um erro!</strong><br/>E-mail não encontado na base de dados ou usuário inativo!</div>  <?php };?>
   <?php if($enviado === 1){ ?> <div class="alert alert-success" ><strong>Senha Enviada com Sucesso!</strong><br/>Confira seu e-mail e <a href="index.php" class="alert-link">acesse novamente nosso login.</a>  </div>  <?php };?>
  
 	<!-- FIM MENSAGEM -->
      Digite seu e-mail para recuperar sua senha.
      <input type="email" name="email" id="email"  minlength="2"  class="form-control"  placeholder="E-MAIL" required/>
     
     <br>

     
      <button class="btn btn-lg btn-primary btn-block" type="submit">ENVIAR SENHA</button>
  
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
