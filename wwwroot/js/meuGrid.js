(function($) {
	
	$.extend($.fn, {
		meuGrid: function( options ) {
			
			
	
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
		 
		}
	});
}(jQuery));	