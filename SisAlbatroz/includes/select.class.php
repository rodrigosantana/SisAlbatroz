<?php
class SelectList
{
    protected $conn;
 
        public function __construct()
        {
            $this->DbConnect();
        }
 
        protected function DbConnect()
        {
            $host = "localhost";
            $user = "root";
            $password = "anakin88";
            $db = "albatroz_sis";
            $this->conn = mysql_connect($host,$user,$password) OR die("Unable to connect to the database");
            mysql_select_db($db,$this->conn) OR die("can not select the database $db");
            return TRUE;
        }
 
        public function ShowCategory()
        {
            $sql = "SELECT id, nome FROM observador ORDER BY nome";
            $res = mysql_query($sql,$this->conn);
            $category = '<option value="0">--Selecione--</option>';
            while($row = mysql_fetch_array($res))
            {
                $category .= '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
            }
            return $category;
        }
    
        public function ShowType()
        {   
            $obser = $_POST['id'];
            $sql = "SELECT DISTINCT geral.cod_embar, geral.cod_obser, embarcacao.nome, embarcacao.id
            FROM geral, embarcacao
            WHERE geral.cod_obser = '$obser' AND geral.cod_embar = embarcacao.id
            ORDER BY embarcacao.nome";
            $res = mysql_query($sql,$this->conn);
            $type = '<option value="0">--Selecione--</option>';
            while($row = mysql_fetch_array($res))
            {
                $type .= '<option value="' . $row['cod_embar'] . '">' . $row['nome'] . '</option>';
            }
            return $type;
        }

        public function ShowType2()
        {   
            $cod_obser = $_POST['id1'];
            $cod_embar = $_POST['id2'];
            $sql = "SELECT geral.viagem, geral.cod_embar, geral.cod_obser 
                    FROM geral WHERE geral.cod_embar = '$cod_embar' AND geral.cod_obser = '$cod_obser'";
            $res = mysql_query($sql,$this->conn);
            $type = '<option value="0">--Selecione--</option>';
            while($row = mysql_fetch_array($res))
            {
                $type .= '<option value="' . $row['viagem'] . '">' . $row['viagem'] . '</option>';
            }
            return $type;
        }
}
 
$opt = new SelectList();
?>