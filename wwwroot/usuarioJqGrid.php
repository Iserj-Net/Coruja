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
    
    <link href="js/jquery.jqGrid/css/ui.jqgrid.css" rel="stylesheet">
    <link href="js/jquery.ui/css/smoothness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
    
   
    
  </head>


  <body>
  
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
   <header class="panel-heading">
     <h3 class="panel-title"><i class="glyphicon glyphicon-search"></i> BUSCA PESSOA</a></li></h3></header>
   <main class="panel-body">
   
  
    
                <div class="btn-group">
              <button  id="inserirButton" type="button" class="btn btn-default btn-primary"><i class="glyphicon glyphicon-plus"></i> INSERIR NOVO</button>
              <button  id="alterarButton" type="button" class="btn btn-default btn-primary"><i class="glyphicon glyphicon-refresh"></i> ALTERAR</button>
              <button  id="excluirButton" type="button" class="btn btn-default btn-primary"><i class="glyphicon glyphicon-remove"></i> EXCLUIR</button>
            </div>
    
   <br><br>
    <table id="list2"></table>
	<div id="pager2"></div>
    
    
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
    
   <script src="js/jquery.jqGrid/js/jquery.jqGrid.min.js"></script>
   <script src="js/jquery.jqGrid/js/i18n/grid.locale-pt-br.js"></script>
    
    <script>
	
    $(function(){
		$("#formulario").validate();	
		

		
		
		jQuery("#list2").jqGrid({
			url:'dataGrid/usuario_JqGrid.php',
			datatype: "json",
			
			colNames:['Id','Usuario', 'Senha', 'Dt.Criado','Dt.Alteração','ativo'],
			colModel:[
				{name:'idUsuario',index:'idUsuario'},
				{name:'usuario',index:'usuario'},
				{name:'senha',index:'senha'},
				{name:'dtCriacao',index:'dtCriacao',formatter:'date'},
				 
				
				{name:'dtAlteracao',index:'dtAlteracao',formatter:'date'},		
				{name:'ativo',index:'ativo',  stype: 'select', searchoptions:{ sopt:['eq'],  value: ":All;0:Não;1:Sim" }}
				//,{name:'note',index:'note', width:150, sortable:false}		
			],
			
			//rowTotal: 2000,
			loadonce:true,
			mtype: "GET",
		
			rownumbers: true,
			rownumWidth: 40,
			gridview: true,
			ignoreCase: true,
			
			formatoptions: {
              srcformat: 'ISO8601Long',
              newformat: 'm/d/Y',
              defaultValue:null
          },
		  
			rowNum:10,
			rowList:[10,20,30],
			pager: '#pager2',
			sortname: 'idusuario',
			viewrecords: true,
			sortorder: "desc",
			multiselect: true,
			
			autoencode: true,
			 autowidth: true, 
			 shrinkToFit: true,
			 altRows:true
			
			 
			 
		});
		//jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false});
		//jQuery("#list2").jqGrid('filterToolbar',{stringResult: false,searchOnEnter : false});
		//jQuery("#list2").jqGrid('gridResize',{minWidth:350,maxWidth:800,minHeight:80, maxHeight:350});
		
		
		
	
		
	});
    
    </script>
  </body>
</html>
