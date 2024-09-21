<?php
session_start();
require("classconected.php");
$result=[];
try{
    $d="mysql:host=localhost;dbname=website";
    $ddb=new PDO($d,"root","");
    $company_id=$_SESSION["id"];
    $idoffer=$_GET["x"];
    /* show  post info statement*/
    $sql="DELETE FROM offers WHERE id=$idoffer";
    $stm=$ddb->prepare($sql);
    $stm -> execute();
    header("location:posts.php");
}
catch(PDOException $e){
    echo ($e->getmessage());
} 
?>