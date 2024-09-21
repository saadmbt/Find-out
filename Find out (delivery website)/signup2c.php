<?php
$d="mysql:host=localhost;dbname=website";
try{
    $ddb=new PDO($d,"root","");
    /*echo"connexion reussi";*/
    $username=$_POST["nomc"]; 
    $email=$_POST["emailc"]; 
    $password=$_POST["passc"]; 
    $img=basename($_FILES["img"]["name"]);
    $stm=$ddb->prepare("INSERT INTO clientt (username, email, password,image)
    VALUES ('$username','$email','$password','$img')");
    if($stm -> execute()){
         header("Location:login.html");
         exit;
    };
    echo"<br>is insert";
   
}
catch(PDOException $e){
    echo ($e->getmessage());
}
    


 ?>
 