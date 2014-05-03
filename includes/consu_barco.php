<?php
require_once('../database/conexao.php');

$obser=$_POST['obser'];

$q=mysql_query("SELECT * FROM geral WHERE cod_obser='$obser'");

while($row = mysql_fetch_array($q)){
   echo "<option>".$row['cod_embar']."</option>";
}

?>