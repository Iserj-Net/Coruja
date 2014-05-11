<?php 
include("include/conexao.php");
include("include/testaLogin.php");


	
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
  
<?php include("menu.php");?>

<!-- breadcrumb -->
<ol class="breadcrumb">
  <li><a href="index.php">LOGIN</a></li>
  <li class="active">MENU INICIAL</li>
</ol>
<!-- fim breadcrumb -->


<div class="container">

<section class="panel panel-default" id="administracao">
   <header class="panel-heading">
     <h3 class="panel-title">ADMINISTRAÇÃO</h3></header>
   <main class="panel-body">
    	<div class="row">
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="usuario.php" >
                  <img src="img/icons/user.png" width="70" height="70"  /> 
              <figcaption>Alterar/Buscar<br>Usuários</figcaption>
              </a>            
	      </figure>
            
            
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="usuario_form.php" >
                  <img src="img/icons/lock.png" width="70" height="70"  /> 
                  <figcaption>Inserir Novo<br>Usuário</figcaption>
              </a>            
			</figure>
            
            
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="minhaSenha.php" >
                  <img src="img/icons/safe.png" width="70" height="70"  /> 
                  <figcaption>Alterar Minha<br>Senha</figcaption>
              </a>            
			</figure>
            
            
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="index.php" >
                  <img src="img/icons/truck.png" width="70" height="70"  /> 
                  <figcaption>Sair<br>Logoff</figcaption>
              </a>            
			</figure>
              

            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="#" >
                  <img src="img/icons/arrow.png" width="70" height="70"  /> 
                  <figcaption>Alterar Minha<br>Senha</figcaption>
              </a>            
			</figure>
            
            
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="#" >
                  <img src="img/icons/sciossors.png" width="70" height="70"  /> 
                  <figcaption>Sair<br>
              Logoff</figcaption>
              </a>            
		  </figure>
             
      </div><!-- end of row-->
  	</main>
</section>


<section class="panel panel-default" id="cadastros">
   <header class="panel-heading">
     <h3 class="panel-title">CADASTROS</h3></header>
   <main class="panel-body">
    	<div class="row">
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="pessoa.php" >
                  <img src="img/icons/persons.png" width="70" height="70"  /> 
                  <figcaption>Pessoas</figcaption>
              </a>
            </figure>
            
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
           	  <a href="#" >
                  <img src="img/icons/book.png" width="70" height="70"  /> 
                  <figcaption>Alunos</figcaption>
              </a>
            </figure>
            
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="#" >
                  <img src="img/icons/briefcase02.png" width="70" height="70"  /> 
                  <figcaption>Professores</figcaption>
              </a>            
			</figure>
            
            
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
               <a href="#" >
                  <img src="img/icons/folder.png" width="70" height="70"  /> 
                  <figcaption>Cursos</figcaption>
              </a>            
            </figure>
              

            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="#" >
                  <img src="img/icons/paper01.png" width="70" height="70"  /> 
                  <figcaption>Processos</figcaption>
              </a>            
			</figure>
            
            
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="#" >
                  <img src="img/icons/plane.png" width="70" height="70"  /> 
                  <figcaption>Turmas</figcaption>
             </a>            
            </figure>
             
            
            
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="#" >
                  <img src="img/icons/calc02.png" width="70" height="70"  /> 
                  <figcaption>Matérias</figcaption>
              </a>            
            </figure>
            
            
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="#" >
                  <img src="img/icons/lab.png" width="70" height="70"  /> 
                  <figcaption>Matriz Curricular</figcaption>
              </a>            
            </figure>
              

            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="#" >
                  <img src="img/icons/house.png" width="70" height="70"  /> 
                  <figcaption>Espaço</figcaption>
              </a>            
            </figure>
            
            
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="#" >
                  <img src="img/icons/box.png" width="70" height="70"  /> 
                  <figcaption>Documentos</figcaption>
              </a>            
            </figure>
             
            
            
      </div><!-- end of row-->
  	</main>
</section>




<section class="panel panel-default" id="cadastros">
   <header class="panel-heading">
     <h3 class="panel-title">CONFIGURAÇÕES</h3></header>
   <main class="panel-body">
    	<div class="row">
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="#" >
                  <img src="img/icons/control.png" width="70" height="70"  /> 
                  <figcaption>Permissões Acesso</figcaption>
              </a>
          </figure>
            
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
           	  <a href="#" >
                  <img src="img/icons/paper02.png" width="70" height="70"  /> 
                  <figcaption>Tipo Documento</figcaption>
              </a>
          </figure>
            
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="#" >
                  <img src="img/icons/arrows.png" width="70" height="70"  /> 
                  <figcaption>Tipo Curso</figcaption>
              </a>            
		  </figure>
            
            
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
               <a href="#" >
                  <img src="img/icons/calendar.png" width="70" height="70"  /> 
                  <figcaption>Período Letivo</figcaption>
              </a>            
          </figure>
              

            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="#" >
              <img src="img/icons/flag.png" width="70" height="70"  /> 
              <figcaption>Componente Curricular</figcaption>
              </a>            
		  </figure>
            
            
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="#" >
                  <img src="img/icons/cube.png" width="70" height="70"  /> 
                  <figcaption>Equivalencia Curricular</figcaption>
             </a>            
          </figure>
             
            
            
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="#" >
                  <img src="img/icons/clock02.png" width="70" height="70"  /> 
                  <figcaption>Tempo Aula</figcaption>
              </a>            
          </figure>
            
            
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="#" >
                  <img src="img/icons/report01.png" width="70" height="70"  /> 
                  <figcaption>Relatorio Gerencial</figcaption>
              </a>            
          </figure>
              

            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="#" >
                  <img src="img/icons/fire.png" width="70" height="70"  /> 
                  <figcaption>Exigencias</figcaption>
              </a>            
          </figure>
            
            
            <figure class="col-md-2 col-sm-3 col-xs-6" align="center" >
              <a href="#" >
                  <img src="img/icons/cofee.png" width="70" height="70"  /> 
                  <figcaption>Totais Sistema</figcaption>
              </a>            
          </figure>

      </div><!-- end of row-->
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
		$("#formulario").validate();	
	});
    
    </script>
  </body>
</html>
