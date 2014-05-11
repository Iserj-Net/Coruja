// JavaScript Document
//validacao cpf, cnpj, dateBR,dateTimeBR e MSGs

(function($) {
	$.extend($.validator.messages, {
		required: "Este campo &eacute; obrigatorio.",
		remote: "Corrija este campo.",
		email: "Forne&ccedil;a um endere&ccedil;o de email v&aacute;lido.",
		url: "Forne&ccedil;a uma URL v&aacute;lida.",
		date: "Forne&ccedil;a uma data v&aacute;lida.",
		dateISO: "Forne&ccedil;a uma data v&aacute;lida (ISO).",
		number: "Forne&ccedil;a um n&uacute;mero v&aacute;lido.",
		digits: "Forne&ccedil;a somente d&iacute;gitos.",
		creditcard: "Forne&ccedil;a um cart&atilde;o de cr&eacute;dito v&aacute;lido.",
		equalTo: "Valor digitado diferente.",
		extension: "Forne&ccedil;a um valor com uma extens&atilde;o v&aacute;lida.",
		maxlength: $.validator.format("Forne&ccedil;a n&atilde;o mais que {0} caracteres."),
		minlength: $.validator.format("Forne&ccedil;a ao menos {0} caracteres."),
		rangelength: $.validator.format("Forne&ccedil;a um valor entre {0} e {1} caracteres de comprimento."),
		range: $.validator.format("Forne&ccedil;a um valor entre {0} e {1}."),
		max: $.validator.format("Forne&ccedil;a um valor menor ou igual a {0}."),
		min: $.validator.format("Forne&ccedil;a um valor maior ou igual a {0}."),
		nifES: "Forne&ccedil;a um NIF v&aacute;lido.",
		nieES: "Forne&ccedil;a um NIE v&aacute;lido.",
		cifEE: "Forne&ccedil;a um CIF v&aacute;lido."
	});
}(jQuery));



jQuery.validator.addMethod("cpf", function(value, element) {
   value = jQuery.trim(value);
	
	value = value.replace('.','');
	value = value.replace('.','');
	cpf = value.replace('-','');
	while(cpf.length < 11) cpf = "0"+ cpf;
	var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
	var a = [];
	var b = new Number;
	var c = 11;
	for (i=0; i<11; i++){
		a[i] = cpf.charAt(i);
		if (i < 9) b += (a[i] * --c);
	}
	if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
	b = 0;
	c = 11;
	for (y=0; y<10; y++) b += (a[y] * c--);
	if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }
	if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) return false;
	return true;
}, "Informe um CPF válido."); // Mensagem padrão 

jQuery.validator.addMethod("dateBR", function(value, element) {
	 //contando chars
	if(value.length!=10) return false;
	// verificando data
	var data 		= value;
	var dia 		= data.substr(0,2);
	var barra1		= data.substr(2,1);
	var mes 		= data.substr(3,2);
	var barra2		= data.substr(5,1);
	var ano 		= data.substr(6,4);
	if(data.length!=10||barra1!="/"||barra2!="/"||isNaN(dia)||isNaN(mes)||isNaN(ano)||dia>31||mes>12)return false;
	if((mes==4||mes==6||mes==9||mes==11) && dia==31)return false;
	if(mes==2  &&  (dia>29||(dia==29 && ano%4!=0)))return false;
	if(ano < 1900)return false;
	return true;
}, "Informe uma data válida");  // Mensagem padrão 

jQuery.validator.addMethod("dateTimeBR", function(value, element) {
	 //contando chars
	if(value.length!=16) return false;
	 // dividindo data e hora
	if(value.substr(10,1)!=' ') return false; // verificando se há espaço
	var arrOpcoes = value.split(' ');
	if(arrOpcoes.length!=2) return false; // verificando a divisão de data e hora
	// verificando data
	var data 		= arrOpcoes[0];
	var dia 		= data.substr(0,2);
	var barra1		= data.substr(2,1);
	var mes 		= data.substr(3,2);
	var barra2		= data.substr(5,1);
	var ano 		= data.substr(6,4);
	if(data.length!=10||barra1!="/"||barra2!="/"||isNaN(dia)||isNaN(mes)||isNaN(ano)||dia>31||mes>12)return false;
	if ((mes==4||mes==6||mes==9||mes==11) && dia==31)return false;
	if (mes==2  &&  (dia>29||(dia==29 && ano%4!=0)))return false;
	// verificando hora
	var horario 	= arrOpcoes[1];
	var	hora 		= horario.substr(0,2);
	var doispontos 	= horario.substr(2,1);
	var minuto 		= horario.substr(3,2);
	if(horario.length!=5||isNaN(hora)||isNaN(minuto)||hora>23||minuto>59||doispontos!=":")return false;
	return true;
}, "Informe uma data e uma hora válida");	






/*
 *
 * NOVO METODO PARA O JQUERY VALIDATE
 * VALIDA CNPJ COM 14 OU 15 DIGITOS
 * A VALIDAÇÃO É FEITA COM OU SEM OS CARACTERES SEPARADORES, PONTO, HIFEN, BARRA
 *
 * ESTE MÉTODO FOI ADAPTADO POR:
 * 
 * Shiguenori Suguiura Junior <junior@dothcom.net>
 * 
 * http://blog.shiguenori.com
 * http://www.dothcom.net
 * 
 */
jQuery.validator.addMethod("cnpj", function(cnpj, element) {
   cnpj = jQuery.trim(cnpj);
	
	// DEIXA APENAS OS NÚMEROS
   cnpj = cnpj.replace('/','');
   cnpj = cnpj.replace('.','');
   cnpj = cnpj.replace('.','');
   cnpj = cnpj.replace('-','');

   var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
   digitos_iguais = 1;

   if (cnpj.length < 14 && cnpj.length < 15){
      return false;
   }
   for (i = 0; i < cnpj.length - 1; i++){
      if (cnpj.charAt(i) != cnpj.charAt(i + 1)){
         digitos_iguais = 0;
         break;
      }
   }

   if (!digitos_iguais){
      tamanho = cnpj.length - 2
      numeros = cnpj.substring(0,tamanho);
      digitos = cnpj.substring(tamanho);
      soma = 0;
      pos = tamanho - 7;

      for (i = tamanho; i >= 1; i--){
         soma += numeros.charAt(tamanho - i) * pos--;
         if (pos < 2){
            pos = 9;
         }
      }
      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
      if (resultado != digitos.charAt(0)){
         return false;
      }
      tamanho = tamanho + 1;
      numeros = cnpj.substring(0,tamanho);
      soma = 0;
      pos = tamanho - 7;
      for (i = tamanho; i >= 1; i--){
         soma += numeros.charAt(tamanho - i) * pos--;
         if (pos < 2){
            pos = 9;
         }
      }
      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
      if (resultado != digitos.charAt(1)){
         return false;
      }
      return true;
   }else{
      return false;
   }
}, "Informe um CNPJ válido."); // Mensagem padrão 