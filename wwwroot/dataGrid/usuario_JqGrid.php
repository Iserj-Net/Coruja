<?php 
include("../include/conexao.php");
include("../include/testaLogin.php");

error_reporting(0);
$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction

/*
$page =1;
$limit = 10;
$sidx=1;
$sord ='desc';
*/
if(!$sidx) $sidx =1;


			$SQL = "SELECT count(*) AS count from usuario  ";
			$result = mysql_query($SQL,$conn) or die("Erro na query!<br>" . mysql_error());
			$row = mysql_fetch_array($result ,MYSQL_ASSOC);


$count = $row['count'];
//echo $count; exit;

if( $count >0 ) {
	$total_pages = ceil($count/$limit);
} else {
	$total_pages = 0;
}
if ($page > $total_pages) $page=$total_pages;
$start = $limit*$page - $limit; // do not put $limit*($page - 1)

$SQL = "SELECT * FROM usuario  ".$where." ORDER BY $sidx $sord LIMIT $start , $limit";
$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());

$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;




$i=0;
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
	
    $responce->rows[$i]['idUsuario']=$row[idUsuario];
    $responce->rows[$i]['cell']=array($row[idUsuario],$row[usuario],$row[senha],$row[dtCriacao],$row[dtAlteracao],$row[ativo]);
    $i++;
}        
 
$json = json_encode($responce);
$json = str_replace('"\u0001"', '"1"', $json);
$json = str_replace('"\u0000"', '"0"', $json);
echo $json;
//mysql_close($db);	
?>