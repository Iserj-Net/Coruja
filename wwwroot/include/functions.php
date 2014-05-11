<?php 
//NOME DO SISTEMA PARA FICAR EM TODOS OS HEADERS
$nomeSistema = 'Sistema Administrativo Coruja 2.0';

//RETRONA O NOME DA PAGINA ATUAL
function nomePaginaAtual() {
  return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

//CONERTE FORMATO ISO PRA BR E BR PRA ISO
function converteData($data){
	
	if ( ! strstr( $data, '/' ) )
        {
			   $data=date_create($data); //CONVERTER A STRING EM DATA PARA MANIPULAÇÃO
			   return  date_format($data,"d/m/Y");
        }
        else
        {
                $data=date_create($data); //CONVERTER A STRING EM DATA PARA MANIPULAÇÃO
			   return  date_format($data,"y-m-d");
        }
        return false;
	}
?>