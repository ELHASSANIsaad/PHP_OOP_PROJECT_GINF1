<!DOCTYPE html>
<html>
<head>
    <title>BDO CLASS CONECTION</title>
    <?php
        $etudiantOb = new myclassPDO("ginf121","bd_ginf1");
        $sql_comand = $etudiantOb->make_query("select * from etudiant");
        $sql_data = $sql_comand->fetchAll();
    ?>
</head>
<body>
    
    <table>

        <thead>
            <tr>
            	<th>nom</th>
            	<th>prenom</th>
            	<th>CNE</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($sql_data as $lineSET){ ?>
                <tr>
                <?php for($i= 0; $i< $sql_comand->columnCount() ;$i++){ ?>
                    <td><?=$lineSET[$i]?></td>
                <?php } ?>
                </tr>
            <?php } ?>
        </tbody>

    <h3>NBR ROW : <?=$sql_comand->rowCount()?> </h3>
    <h3>NBR REQUITE : <?=$etudiantOb->getNbrRequete()?></h3>
    

    </table>
</body>
</html>


<?php
    define("db_host_name","localhost");
    define("db_user_name","root");
    define("db_password","");
?>


<?php
    class myclassPDO{
        private $db1;     db1
        private $val1;    val1
        private $val2_querie;  val2_querie 
        private $db2_etudiant; db2_etudiant

        protected function make_query($query){
            $this->val2_querie++;
            return $this->db2_etudiant->query($query);
        }
        protected function getNbrRequete(){
            return $this->val2_querie;
        }

        protected function __construct($db1,$val1){
            $this->val2_querie=0;
            $this->db1 = $db1;
            $this->val1 = $val1;
            $this->db2_etudiant = $this->connexpdo();
        }
        public function connexpdo(){
            include_once($this->val1.".inc.php");
            $pdo1_hsnm = "mysql:host=".db_host_name.";dbname=".$this->db1;
            $pdo2_user = db_user_name;
            $pdo3_pass = db_password;
            try{
                $bd_cnx_param = new PDO($pdo1_hsnm,$pdo2_user,$pdo3_pass);
                return $bd_cnx_param;
            }catch(PDOException $exception){
                echo "can not reache data base",$exception->getMessage();
                return FALSE;
                exit();
            }
        }
        
    }
?>









































