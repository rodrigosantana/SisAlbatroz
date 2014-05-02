<?php
require_once('../database/conexao.php');

$obser=$_POST['obser'];

$q=mysql_query("SELECT geral.cod_obser, geral.cod_embar FROM geral WHERE geral.cod_obser='$obser'");

while($row = mysql_fetch_array($q)){
   echo "<option value=" .$row['cod_embar'] . ">" . $row['cod_embar'] . "</option>";
}

?>