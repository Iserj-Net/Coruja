<?php 
include("include/conexao.php");
include("include/testaLogin.php");

$op = isset($_GET['op']) ? $_GET['op'] : '';

if($op == 1) {
	
		
	$senha = trim(addslashes($_POST["senha"]));	
	
	$SQL = "UPDATE usuario set senha = '$senha' where idUsuario = " . $_SESSION['idUsuario'];
	//echo $SQL; exit;
	$result = mysql_query($SQL,$conn) or die("Erro na query!<br>" . mysql_error());
	//$row = mysql_fetch_array($result ,MYSQL_ASSOC);
	
	header("Location: inicio.php");
		
	
	
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
  <style>
	.container{ max-width:800px;}
		
		

  </style>

  <body>
  
<?php include("menu.php");?>

<!-- breadcrumb -->
<ol class="breadcrumb">
  <li><a href="index.php">LOGIN</a></li>
   <li><a href="inicio.php">MENU INICIAL</a></li>
  <li class="active">MINHA SENHA</li>
</ol>
<!-- fim breadcrumb -->


<div class="container">

<section class="panel panel-default" id="administracao">
  
   <header class="panel-heading">
     <h3 class="panel-title pull-left"><i class="glyphicon glyphicon-search"></i> ALTERAR MINHA SENHA</h3>
     <h3  class="panel-title" align="right" ><a href="inicio.php"><i class="glyphicon glyphicon-remove"></i></a></h3>
    </header>
    
   <main class="panel-body">
   
 <!-- MENSAGEM -->
   <div class="alert" id="mensagem"></div> 
 <!-- FIM MENSAGEM -->
   	
<form class="form-horizontal" action="minhaSenha.php?op=1" method="post" >
  <div class="form-group">
    <label for="senha" class="col-sm-2 control-label">Senha</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="senha" name="senha" placeholder="MINHA NOVA SENHA" minlength="2"  required >
    </div>
  </div>
  <div class="form-group">
    <label for="confirma" class="col-sm-2 control-label">Confirmação</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="confirma"  equalTo="#senha" name="confirma" placeholder="REDIGITE SUA SENHA" minlength="2" required>
    </div>
  </div>
 
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button class="btn btn-primary " type="submit">ALTERAR</button>
    </div>
  </div>
</form>
  
        
             
     
  	</main>
</section>




</div> <!-- Fim container principal -->

  

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
		
		$("#mensagem").hide();
		var validator = $("form").validate({
  				invalidHandler: function() {
					$("#mensagem").html("");
					$("#mensagem").addClass("alert-danger").fadeIn().html("<strong>Ops...Algo deu errado!</strong><br/> Encontramos " + validator.numberOfInvalids() + " erro(s), corrija-os e tente novamente!" );
  				
 				 }
		});
		
		
	 
		//$("#mensagem").addClass("alert-success").fadeIn().append("<strong>Operação Realizada</strong><br/> Seus dados foram gravados com sucesso!" );  
	
		

	});
    
    </script>
  </body>
</html>
