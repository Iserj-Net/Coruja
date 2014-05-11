<?php 
include("include/conexao.php");
include("include/testaLogin.php");


 if(!empty($_POST['id'])){
    foreach($_POST['id'] as $check) {
		 echo $check;
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
    
	 <link href="js/jquery.fooTable/css/footable.core.min.css" rel="stylesheet">
    
   
    
  </head>


  <body>
  <form action="usuario.php?op=1" method="post" class="form-horizontal">
<?php include("menu.php");?>

<!-- breadcrumb -->
<ol class="breadcrumb">
  <li><a href="index.php">LOGIN</a></li>
   <li><a href="inicio.php">MENU INICIAL</a></li>
  <li class="active">BUSCA PESSOA</li>
</ol>
<!-- fim breadcrumb -->


<div class="container">
    <section class="panel panel-default" id="painel">
    
    
            <header class="panel-heading"> <!-- INICIO HEADER PANEL -->
              <h3 class="panel-title pull-left"><i class="glyphicon glyphicon-search"></i> LISTA USUÁRIOS</h3>
              <h3  class="panel-title" align="right" ><a href="inicio.php"><i class="glyphicon glyphicon-remove"></i></a></h3>
            </header> <!-- FIM HEADER PANEL -->
            
        
            <main class="panel-body"><!-- INICIO CORPO PANEL -->
           
           
               <!-- MENSAGEM -->
               <div class="alert alert-danger " id="mensagem"></div> 
               <!-- FIM MENSAGEM -->
               
              <!-- Modal alert -->          
           <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><i class="glyphicon   glyphicon-warning-sign"></i> ATENÇÃO</h4>
                  </div>
                  <div class="modal-body">
                   
                  </div>
                  <div class="modal-footer" style="text-align:center;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                    <button type="button" class="btn btn-primary" id="excluirButtonConfirma">ACEITAR</button>
                  </div>
                </div>
              </div>
            </div>
           <!-- Modal alert -->  
           

            <div class="btn-group">
              <button  id="inserirButton" type="button" class="btn btn-default btn-primary"><i class="glyphicon glyphicon-plus"></i> INSERIR NOVO</button>
              <button  id="alterarButton" type="button" class="btn btn-default btn-primary"><i class="glyphicon glyphicon-refresh"></i> ALTERAR</button>
              <button  id="excluirButton" type="button" class="btn btn-default btn-primary"><i class="glyphicon glyphicon-remove"></i> EXCLUIR</button>
            </div>
            
            <br><br>
            
        
            
            

            </main><!-- FIM CORPO PANEL -->
            
        
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
    
     <script src="js/jquery.fooTable/dist/footable.min.js"></script>
    

    
    <script>
	
    $(function(){
		//http://mrbool.com/how-to-add-edit-and-delete-rows-of-a-html-table-with-jquery/26721
		
		
		$("#mensagem").hide();// Esconder div que guard as mensagens	
		$("form").validate();// Plugin de validacao de formulario
		//$("#meuGrid").footable();//Plugin tabela responsiva
		
		
		
		
	});
    
    </script>
    </form>
  </body>
</html>
