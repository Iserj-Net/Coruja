<?php 
include("include/conexao.php");
include("include/testaLogin.php");
include("include/functions.php");






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
               <div class="alert alert-danger " id="mensagem" style="display:none;"></div> 
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
            
            
            <?php  
			$tbl_name = "usuario";//NOME DA TABELA E DAS PÁGINAS TB SEGUINTO O PROTOCOLO DE DESENVOLIMENTO E DICIONARIO ODE DADOS. EX: usuario.php e usuario_form.php
			$limit = 3; //TOTAL DE REGISTROS POR PAGINA
			$where = "where 1 = 1"; //INSERIR NA VARIAVEL AS CONDICOES WHERE
			$order = isset($_GET['order']) ? $_GET['order'] : 2;//ORDENA PEGA APAGINA ATUAL, SE ESTIVER VAZIO, PAG = 1
			$orderDirection =  isset($_GET['orderDirection']) ? $_GET['orderDirection'] : 'ASC';//DIRECAO INICIAL, SE ESTIVER VAZIO,ASC
			$orderClass = $orderDirection =="ASC" ? "glyphicon-chevron-down" : "glyphicon-chevron-up";//Class CC do bootstrap para icone no head da coluna do meuGrid
			
			$page = isset($_GET['page']) ? $_GET['page'] : 1;//PEGA APAGINA ATUAL, SE ESTIVER VAZIO, PAG = 1
			$SQL = "SELECT COUNT(*) as num FROM $tbl_name $where";//PRECISA FAZER ESSE SELECT DE COUNT PARA FAZER A PGINACAO, NAO DA PRA USAR UMA QUERY SÓ...
			$totalRegs = mysql_fetch_array(mysql_query($SQL));
			$totalRegs = $totalRegs["num"];
			
			
			$start = ($page - 1) * $limit; 			
			$totalPag = round($totalRegs/$limit);//CALCULA O TOTAL DE PAGINA PARA FAZER O FOR DE PAGINACAO NO TFOOT DA TABELA
			if ($totalPag <= 0){$totalPag = 1;}//SE SO TIVER UMA PAGINA, ATRIBUI O VCALOR 1 PRA NAO FICAR PAG = 0 E DAR BUG
			
			//A ORDEM DO SELECT DEVE SER A ORDEM DAS COLUNAS, POIS A ORDENACAO E SELECAO ESTA POR NUMEROS E NAO TEXTUAL
			$SQL = "SELECT idUsuario,usuario, email, dtCriacao,login, ativo from $tbl_name $where  order by $order $orderDirection LIMIT $start, $limit";
			$result = mysql_query($SQL,$conn) or die("Erro na query!<br>" . mysql_error());
			
			
			
			
			if(mysql_num_rows($result)>0){
				//echo $SQL;
			?>
            
            
            
            
            <table class="table table-bordered" id="meuGrid">
            
					<thead>
                    <tr>
                        <th id="selecionaTodosRegistros"><i class="glyphicon glyphicon-check" ></i></th>
                        <th id="2">Usuário <?php if($order == 2){?><i class="glyphicon <?=$orderClass?> <?=$orderDirection?>"></i><?php } ?></th>
                        <th id="3">E-mail <?php if($order == 3){?><i class="glyphicon  <?=$orderClass?> <?=$orderDirection?>"></i><?php } ?></th>
                        <th id="4">Dt.Criação <?php if($order == 4){?><i class="glyphicon  <?=$orderClass?> <?=$orderDirection?>"></i><?php } ?></th>
                        <th id="5">Login <?php if($order == 5){?><i class="glyphicon  <?=$orderClass?> <?=$orderDirection?>"></i><?php } ?></th>
                        <th id="6">Status <?php if($order == 6){?><i class="glyphicon  <?=$orderClass?> <?=$orderDirection?>"></i><?php } ?></th>
                    </tr>
					</thead>
                    
                    <tbody id="meuGridBody">
						<?php while ($row = mysql_fetch_array($result ,MYSQL_BOTH)) { ?>    
                            <tr>
                               <td align="center"> <input name="id[]" type="checkbox" value="<?=$row[0]?>"></td>
                                <td><?=$row[1]?></td>
                                <td><?=$row[2]?></td>
                                <td><?=converteData($row[3])?></td>
                                <td><?=$row[4]?></td>
                                <td><?=$row[5]?></td>
                            </tr>       
                        <?php } ?>                        
					</tbody>
                    
                  
                  
                    
            <tfoot>
                <tr>
                    <td colspan="6">
 
                    <table width="100%" border="0">
                      <tr>
                        <td width="33%"  align="left"></td>
                        <td width="33%" align="center">
                            <label for="page" class="control-label">Página</label> 
                                 <select name="page" id="page" >
                                    <?php for ($i = 1; $i <= $totalPag; $i++) { ?>
                                       <option value="<?=$i?>" <?php if ($page == $i ) { echo " SELECTED "; }?> ><?=$i?></option>
                                     <?php } ?>
                                </select>
                          </td>
                        <td width="33%"  align="right">Total de <?=$totalRegs?> Registro(s) dividido(s) em <?=$totalPag?> página(s) </td>
                      </tr>
                    </table>
                    
                        
                    </td>
                </tr>
            </tfoot>






                    
				</table>
            
  		  <?php
			}else{echo '<div class="alert alert-danger">Nenhum registro encontrado!</div>';}        
   		  ?>    
            
            

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
    

    

    
    <script>
	
    $(function(){
		
		
		//$("form").validate();// INICIALIZAÇÃO DE VALIDAÇÃO DE FORMS
		//http://mrbool.com/how-to-add-edit-and-delete-rows-of-a-html-table-with-jquery/26721

		
		
		//=================  FUNCOES DE CONTROLE DO MEUGRID ================================
		function acaoALTERAR(){
			$("form").attr("action","<?=$tbl_name?>_form.php?op=2&page=" +  $("#page").val());
			$("form").submit();
		};
		
		function acaoEXCLUIR(){
			$("form").attr("action","<?=$tbl_name?>_form.php?op=3&page=" +  $("#page").val());
			$("form").submit();
		};
				
		//DEIXAR CLICAVEL OS TH DO GRID
		$("#meuGrid th").css("cursor", "pointer");
		
		//BOTAO SIM DE CONFIRMAÇÃO DE EXCLUSÃO,
		$("#excluirButtonConfirma").click(function(){acaoEXCLUIR();});
				
		//SELECIONAR AS COLUNAS DO MRUGRID PARA ORDENANACAO
		$("#1,#2,#3,#4,#5,#6,#7,#8,#9").click(function(event) {
				if( $(event.target).children().hasClass("ASC")){ //TESTA SE EXISTE O FILHO i PARA FAZER ASC OU DESC
					$("form").attr("action","<?=$tbl_name?>.php?order=" + $(this).attr("id") + "&page=" +  $("#page").val()+ "&orderDirection=DESC");
				}else{
					$("form").attr("action","<?=$tbl_name?>.php?order=" + $(this).attr("id") + "&page=" +  $("#page").val() + "&orderDirection=ASC");
				}
				$("form").submit();
		});
		
		//SUBMETER OS FORMS E PAGINAR A PAGINA
		$("#page").change(function(){
				$("form").attr("action","<?=$tbl_name?>.php?order=<?=$order?>&page=" +  $("#page option:selected").val() + "&orderDirection=<?=$orderDirection?>");
				$("form").submit();
		});
				
		//MARCAR E DESMARCAR TODOS OS CHCKBOX
		$("#selecionaTodosRegistros").click(function() {  //on click 
			var todasCheckBoxes = $("#meuGrid tr input[type='checkbox']");
			todasCheckBoxes.prop("checked", !todasCheckBoxes.prop("checked"));			
		});
		
		//SE CLICAR EM ALTERAR DO GRUPO DE 3 BOTOES, TESTA SE HA SELECAO EXIBIDNO MSGS OU REDIRECIONANDO FORM DE ALTERACAO
		$("#alterarButton").click(function(){
			registrosSelecionados = $('form :checkbox:checked').length; 
			if(registrosSelecionados == 1){	//TESTA SE ESTA TUDO CERTO
				acaoALTERAR();
			}else if(registrosSelecionados == 0){//TESTA SE ALGUM REGISTRO FOI SELECIONADO
				$("#mensagem").html("<strong>Temos um Erro!</strong></br>Selecione o registro para alteração").fadeIn('slow');
				$("#mensagem").delay(5000).fadeOut('slow');
			}else if(registrosSelecionados > 1){//TESTA SE O USER SLECIONOU MAIS DE 1 REG PARA ALTERAR
				$("#mensagem").html("<strong>Temos um Erro!</strong></br>Selecione apenas 1 registro para alteração").fadeIn('slow');
				$("#mensagem").delay(5000).fadeOut('slow');
			}
		});
		
		//SE CLICAR EM EXCLUIR DO GRUPO DE 3 BOTOES, ABRE CONFIRMAÇÃO DE EXCLUSAO DOS REGISTROS SELECIONADOS OU ALERTA O ERRO
		$("#excluirButton").click(function(){
			 registrosSelecionados = $('form :checkbox:checked').length; 
			 if(registrosSelecionados >=1){//TESTA SE ESTA TUDO CERTO. E ABRE JANELA DE CONFIRMACAO			
				$('#myModal .modal-body').html("Confirma a exclusão de " + registrosSelecionados + " registro(s) ?");
				$('#myModal').modal();
			 }else{//TESTA SE FOI SELECIONADO PELO MENOS 1 REGISTRO PARA EXCLUSAO
				$("#mensagem").html("<strong>Temos um Erro!</strong></br>Selecione pelo menos 1 registro para exclusão").fadeIn('slow');
				$("#mensagem").delay(5000).fadeOut('slow');
			 }
		});
		
		//COLORIR LINNHA E MARCAR CHBOX DA TABELAGRID
		$('#meuGrid tr').click(function (event) {
			if (event.target.type !== 'checkbox') {
				$(':checkbox', this).trigger('click');
			}
		});
		
		 // COLORE A LINHA DA SELECAO JUNTO COM CHK BOX
		 $("#meuGrid tr input[type='checkbox']").change(function (e) {
			if ($(this).is(":checked")) { //SE O CHECKBOX TA CLICADO...
				$(this).closest('tr').addClass("tabelaLinhaSelecionada"); //ADICIONA A CLASSE NA LINHA 
			} else {
				$(this).closest('tr').removeClass("tabelaLinhaSelecionada");//RETIRA A CLASSE NA LINHA 
			}
		 });
		
		  //COLORIR LINHAS DA TABELA NO ESQUEMA ZEBRA
		  $("#meuGridBody  tr:even").addClass("tabelaLinhaColorida");
		 
		 //==================== FIM DO MEUGRID ============================================

		
		
	});
    
    </script>
    </form>
  </body>
</html>
