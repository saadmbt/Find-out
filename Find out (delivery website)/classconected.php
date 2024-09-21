<?php 
    class dbconected{
        public static function gestion($stmm){
            $d="mysql:host=localhost;dbname=website";
            try{
                $ddb=new PDO($d,"root","");
                /*echo"connexion reussi";*/
                $stm=$ddb->prepare($stmm);
                $stm -> execute();
               $result=$stm -> fetchAll();
            
            }
            catch(PDOException $e){
                echo ($e->getmessage());
            } 
            return $result;
            }
    }
?>