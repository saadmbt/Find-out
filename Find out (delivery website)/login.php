<?php
    session_start();
    $is_valide=false;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $d="mysql:host=localhost;dbname=website";
    try{
        $ddb=new PDO($d,"root","");
        /*echo"connexion reussi";*/
        $email=$_POST["email"]; 
        $password=$_POST["passwordc"]; 
        $stm=$ddb->prepare("SELECT password FROM clientt  WHERE email='$email'");
        $stm -> execute();
        $client= $stm ->fetchColumn();
    if($client==$password){
        $stm=$ddb->prepare("SELECT id FROM clientt  WHERE email='$email'");
        $stm -> execute();
        $id= $stm ->fetchColumn();
            $_SESSION["id"]=$id;
            header("Location:clientsearch.php");
            exit;
         
    };
        $stm=$ddb->prepare("SELECT password FROM company  WHERE email='$email'");
        $stm -> execute();
        $company= $stm ->fetchColumn();
    if($company == $password){
        $stm=$ddb->prepare("SELECT id FROM company  WHERE email='$email'");
        $stm -> execute();
        $id= $stm ->fetchColumn();
        $_SESSION["id"]=$id;
            header("Location:companydash.php");
            exit;
         
    };
    $is_valide=true;
   
}
catch(PDOException $e){
    echo ($e->getmessage());
}
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
         
    <title>Login page </title> 
    <style>
                    /* ===== Google Font Import - Poformsins ===== */
                *{
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    font-family: 'Poppins', sans-serif;
                }

                body{

                    background-color: #000000;
                    background-image:url(img/loginbackground.png);
                    background-position-x: initial;
                    background-position-y: initial;
                    background-size: cover;
                }

                /* header */
                
                header {
                    display: flex;
                    background-color: #000000;
                    color: white;
                    padding: 10px;
                    text-align: center;
                    gap: 350px;
                    border-bottom: #00bcd4 solid 4px;
                    width: 100%;
                    
                }
                .log{
                    display: flex;
                    width: 100px;
                }
                .name{
                    font-family: Otomanopee One, sans-serif;
                    margin: auto 0;
                    
                }
                .name a {
                    text-decoration: none;
                    color: #fff;
                }
                img {
                    width: 50px;
                    
                    }
                .this{
                    padding: 5px;
                    transition: 0.4s ease-out;
                    border-radius: 5px;
                    border-bottom: 3px solid #7743DB;
                    }
                    nav {
                    background-color: #000000;
                    padding: 10px;
                }
                
                nav ul {
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                }
                
                nav li {
                    display: inline-block;
                    margin-right: 10px;
                }
                
                nav a {
                    color: white;
                    text-decoration: none;
                    padding: 5px;
                    border-radius: 5px;
                }
                
                nav a:hover {
                    background-color: #335577;
                }
                
                .container{
                    position: relative;
                    top: 50px;
                    left: 430px;
                    max-width: 430px;
                    width: 100%;
                    background: #fff;
                    border-radius: 10px;
                    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    margin: 40px 20px;
                }

                .container .forms{
                    display: flex;
                    align-items: center;
                    height: 440px;
                    width: 200%;
                    transition: height 0.2s ease;
                }


                .container .form{
                    width: 50%;
                    padding: 30px;
                    background-color: #fff;
                    transition: margin-left 0.18s ease;
                }

                .container.active .login{
                    margin-left: -50%;
                    opacity: 0;
                    transition: margin-left 0.18s ease, opacity 0.15s ease;
                }

                .container .signup{
                    opacity: 0;
                    transition: opacity 0.09s ease;
                }
                .container.active .signup{
                    opacity: 1;
                    transition: opacity 0.2s ease;
                }

                .container.active .forms{
                    height: 600px;
                }
                .container .form .title{
                    position: relative;
                    font-size: 27px;
                    font-weight: 600;
                }

                .form .title::before{
                    content: '';
                    position: absolute;
                    left: 0;
                    bottom: 0;
                    height: 3px;
                    width: 30px;
                    background-color: #4070f4;
                    border-radius: 25px;
                }

                .form .input-field{
                    position: relative;
                    height: 50px;
                    width: 100%;
                    margin-top: 30px;
                }

                .input-field input{
                    position: absolute;
                    height: 100%;
                    width: 100%;
                    padding: 0 35px;
                    border: none;
                    outline: none;
                    font-size: 16px;
                    border-bottom: 2px solid #ccc;
                    border-top: 2px solid transparent;
                    transition: all 0.3s ease; 
                }

                .input-field input:is(:focus, :valid){
                    border-bottom-color: #4070f4;
                }

                .input-field i{
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    color: #999;
                    font-size: 23px;
                    transition: all 0.2s ease;
                }

                .input-field input:is(:focus, :valid) ~ i{
                    color: #4070f4;
                }

                .input-field i.icon{
                    left: 0;
                }
                .input-field i.showHidePw{
                    right: 0;
                    cursor: pointer;
                    padding: 10px;
                }

                .form .checkbox-text{
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    margin-top: 20px;
                }

                .checkbox-text .checkbox-content{
                    display: flex;
                    align-items: center;
                }

                .checkbox-content input{
                    margin-right: 10px;
                    accent-color: #4070f4;
                }

                .form .text{
                    color: #333;
                    font-size: 14px;
                }

                .form a.text{
                    color: #4070f4;
                    text-decoration: none;
                }
                .form a:hover{
                    text-decoration: underline;
                }

                .form .button{
                    margin-top: 35px;
                }

                .form .button input{
                    border: none;
                    color: #fff;
                    font-size: 17px;
                    font-weight: 500;
                    letter-spacing: 1px;
                    border-radius: 6px;
                    background-color: #4070f4;
                    cursor: pointer;
                    transition: all 0.3s ease;
                }

                .button input:hover{
                    background-color: #265df2;
                }

                .form .login-signup{
                    margin-top: 30px;
                    text-align: center;
                }
    </style>
</head>
<body>
    <header>
      
        <div class="log">
           <a href="landing__page.html"><img
        loading="lazy"
        srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&"
        class="img"
        /></a> 
        <div class="name"> <a href="landing__page.html"></a></div>
    </div>
        
        <nav>
            <ul>
                <li class="this"><a href="landing__page.html">Home</a></li>
                <li><a href="acus.html">About Us</a></li>
                <li><a href="#d" >Testimonials</a></li>
                <li><a href="contactus.html">Contact Us</a></li>
            </ul>
        </nav>    
    </header>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>
                
                <form name="form" method="POST">
                    <?php if($is_valide) :?>
                        <br>
                    <em style="color:red;">Invalid Login</em>
                <?php  endif; ?>
                    <div class="input-field">
                        <input type="text" placeholder="Entrez votre E-mail"  required name="email">
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <small style="color: red;" id="ereur"></small>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Entrez votre mot de passe" required name="passwordc">
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                        <small style="color: red;" id="ereur">sss</small>
                    </div>
                    <small style="color: red;" id="ereur"></small>

                    <div class="checkbox-text">
                       
                        <a href="forgotps.html" class="text" style="padding-left: 200px;">Mot de passe oublié ?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="connectez-vous" id="submit">
                    </div>
                    
                    
                </form>
                <div class="login-signup">
                    <span class="text">Vous n’êtes pas membre ?
                        <a href="shar.html" class="text signup-link">Inscrivez-vous</a>
                    </span>
                </div>
            </div>
                </form>

                
     <script>
    document.getElementById("submit").onclick=function(){

    }
    const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");

    //   js code to show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })

    // js code to appear signup and login form
    signUp.addEventListener("click", ( )=>{
        container.classList.add("active");
    });
    login.addEventListener("click", ( )=>{
        container.classList.remove("active");
    });</script> 
</body>
</html>