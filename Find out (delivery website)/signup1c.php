<?php
$d="mysql:host=localhost;dbname=website";
try{
    $ddb=new PDO($d,"root","");
    /*echo"connexion reussi";*/
    $nom=$_POST["nom"]; 
    $email=$_POST["email"]; 
    $number=$_POST["Number"]; 
    $password=$_POST["pass"]; 
    $website=$_POST["website"]; 
    $city=$_POST["city"]; 
    $about=$_POST["about"];
    $img=basename($_FILES["img"]["name"]);
    $stm=$ddb->prepare("INSERT INTO company (nom, email, number, password, website, city, about,image)
    VALUES ('$nom','$email','$number','$password','$website','$city','$about,'$img'");
    if($stm -> execute()){
         header("Location:login.php");
         exit;
    };
    echo"<br>is insert";
   
}
catch(PDOException $e){
    echo ($e->getmessage());
}
    


 ?>
 