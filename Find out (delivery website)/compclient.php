<?php
session_start();
require("classconected.php");
$dd=[];
$id=$_SESSION["id"];
$company_id=$_GET["x"];
$d="mysql:host=localhost;dbname=website";
try{ 
    $ddb=new PDO($d,"root","");
    $stm=$ddb->prepare("SELECT *from clientt where id=$id");
    $stm -> execute();
    $client= $stm ->fetch();
    /*company information  */
    
    $stmm="SELECT*from company where id=$company_id" ; 
    $stm=$ddb->prepare($stmm);
    $stm -> execute();
    $dd=$stm -> fetch();

}
catch(PDOException $e){
    echo ($e->getmessage());
} 
    


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>company page side client </title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <style>
                      
                  @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap');

                  *{
                            margin: 0;
                            padding: 0;
                            box-sizing: border-box;
                            font-family: 'Roboto', sans-serif;
                    }
                body {
                        font-family: Arial, sans-serif;
                        background-color: #000;
                        margin: 0;
                        padding: 0;
                        color: #f0f0f0;
                    }

              /* header */
                
              header {
                  display: flex;
                  background-color: #000000;
                  color: white;
                  padding: 10px;
                  justify-content: space-between;
                  align-items: center;
                  text-align: center;
                  gap: 350px;
                  border-bottom: #00bcd4 solid 4px;
                  width: 100%;
                  
                }
                .log{
                  display: flex;
                  width: 100px;
                }
                img {
                    width: 50px;
                  
                  }
                  .a{
                      width: 25px;
                  }
                  svg{
                      width: 17px;
                  }
                  a{
                      text-decoration: none;
                      color: #fff;
                      display: flex;
                  }
                em{
                  font-size: 12px;
                  position: relative;
                  top: 21px;
                  right: 22px;
                  text-decoration: none;
                  font-family: 'Open Sans', sans-serif;
                  font-style: normal;
                }
                .home{
                  position: relative;
                  left: 14px;
                }
                .user{
                  display: flex;
                  flex-direction: row;
                  position: relative;
                  right: 20px;
                }
                /*profile img*/
                .imgbox{
                    width: 35px;
                    height: 35px;
                    border: 2px solid whitesmoke;
                    border-radius: 50%;
                    overflow: hidden;
                }
                .imgbox img{
                    width: 155%;
                    position: relative;
                    right:  9px;
                }
                .logo{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    gap: 10px;
                    margin-right: 10px;
                }
                .logo h5{
                    text-transform: capitalize;
                }
                a{
                  text-decoration: none;
                  color: #f0f0f0;
                }

              /* footer css       */
                
                .containerfo{
                  background-color: #000000;
                  color: white;
                  overflow: hidden;
                  border-top: #00bcd4 solid 4px;
                  padding-bottom: 1rem;
                  padding-top: 3rem;
                  padding-right: 40px;
                  width: 100%;
                  padding-left: 0; /* Ensure no padding from the left */
                  margin-left: 0;
                }
                .footer{
                  display: flex;
                  width: 100%;
                  height: 35vh;
                  justify-content: center;
                  flex-wrap: wrap;
                  margin: 0 auto;
                  gap: 40px;
                
                
                }
                .logsection{
                  display: flex;
                  flex-direction: column;
                  gap: 10px;
                  padding-right: 40px;
                }
                .footer-heading ,.logsection{
                  display: flex;
                  flex-direction: column;
                
                }
                .logsection img {
                  width: 80px;
                
                }
                .logsection h2:hover ,span:hover {
                  color: red;
                  transition: 0.4s ease-out;
                }
                .footer-heading h2 {
                  margin-bottom: 20px;
                }
                .footer-heading a{
                  text-decoration: none;
                  color: #fff;
                
                  margin-bottom: 12px;
                }
                .footer-heading a:hover{
                  color: red;
                  transition: 0.4s ease-out;
                }
                .footer span{
                  text-decoration: none;
                  margin-bottom: 12px;
                }
                .footer-email h2{
                margin-bottom: 30px;
                
                }
                #email {
                width: 250px;
                height: 40px;
                border-radius: 4px;
                outline: none;
                border: none;
                padding-left: 10px;
                font-size: 1rem;
                margin-bottom: 10px;
                }
                #btn {
                width: 100px;
                height: 40px;
                border-radius: 4px;
                background-color: #f9423d;
                outline: none;
                border: none;
                color: #fff;
                font-size: 1rem;
                }
                #btn:hover {
                cursor: pointer;
                background-color: #337af1;
                }
                
                /* content */
                .main{
                    position: relative;
                    left: 100px;
                    display: flex;
                    flex-direction: column;
                    width: 80%;
                    justify-content: center;
                    align-items: center;
                    margin-bottom: 100px;
                  }
                .ban {
                        width: 70%;
                        border-radius: 12px;
                        margin-top: 50px;
                        overflow: hidden;
                        position: relative;
                    }
                    .ban img{
                        width: 100%;
                        border-radius: 12px;
                    }

                    #pen {
                            position: absolute;
                            bottom: 2px;
                            right: 0;
                            cursor: pointer;
                            background-color: #0080ff;
                            padding: 10px;
                            border-radius: 12px;
                        }
                    #pen2{
                        font-size: 10px;
                        position: absolute;
                        bottom: 3px;
                        right: 10px;
                        background-color: #0080ff;
                        padding: 8px;
                        border-radius: 12px;

                    }
                    .logg{
                        background-color: #f0f0f0;
                        position: relative;
                        bottom: 30px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        flex-direction: column;
                        width: 90px;
                        height: 90px;
                        border-radius: 50px;
                        border:2px solid #0080ff;  
                        overflow: hidden;          
                    }
                    .logg img{
                        width:100%;
                    }
                    .ne {
                            position: relative;
                            bottom: 22px;
                        }
                    .p1 {
                        font-size: 22px;
                        font-family: sans-serif;
                        text-align: center;
                    }
                    .p2{
                        opacity: 80%;
                        font-size: 19px;
                    }
                    .p22{
                        opacity: 80%;
                        font-size: 19px;
                        width: 700px;
                    }

                    em {
                        font-style: normal;
                        padding-left: 20px;
                        padding-bottom: 10px;
                        font-size: 18px;
                    }
                    .btn{
                        margin-left: 50px;
                        background-color: #0080ff;
                        border-radius: 5px;
                        padding: 8px;
                        position: absolute;
                        right: 10px;
                    }
                    .btn1{
                        font-weight: 600;
                        margin-left: 50px;
                        color: #f0f0f0;
                        background-color: #179b81;
                        border-radius: 5px;
                        padding: 8px;
                        position: absolute;
                        right: 150px;
                    }
                    .lab{
                        position: relative;
                        display: flex;
                        flex-direction: column;
                        border-bottom: 2px solid whitesmoke;
                        margin-bottom: 20px;
                        margin-top: 10px;
                        padding: 20px;
                    }
                    .hidden{
                        display: none;
                            padding-top: 25px;
                    }
                    .labin{
                        display: flex;
                        gap: 100px;
                    }
                    .input1 {
                        font-family: inherit;
                        padding: 10px;
                        font-size: 16px;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                        width: 300px;
                        box-sizing: border-box;
                        margin-bottom: 20px;
                    }
                        .input1:focus {
                            border: 3px solid #179b81;
                        border-bottom: 1px solid #0080ff;
                        box-shadow: 0 1px 0 0 #f0f0f0;
                        }
                        .part {
                            display: flex;
                            border-radius: 9px;
                            padding: 10px;
                            flex-direction: row;
                            gap: 70px;
                            margin: 10px;
                            border: 1px solid #fff;
                            width: 80%;
                            justify-content: space-evenly;
                        }
                        .part1:hover , .part2:hover {
                            transform: scale(1.05);
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.7);
                            
                        }
                        .part1 a, .part2 a {
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.7);
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            gap: 10px;
                        }
                        .part1 i, .part2 i{
                            font-size: 20px;
                            padding-right: 15px;
                        }
                        .part1 i{
                            color: #0080ff;
                        }
                        .mid{
                                border-left: 3px solid;
                            }
                        
            
                            
    </style>
</head>
<body>
<header>
<a href="clientsearch.php" class="home"><svg class="a"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#208cdf" d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg></a>
        <div class="log">
                <a href="landing__page.html"><img src="img/logosite.png" class="img"/></a>
        </div>  
        <a href="clientpro.php">
              <div class="logo">
                        <div class="imgbox">
                            <img src="<?='images/'.$client['image']?>" > 
                        </div>
                        <h5><?=$client['username']?></h5>
            </div>
        </a>
        
  </header>
  </div>
  <div class="main">
                     <div class="ban">
                        <img src="<?="img/".$dd['banner']?>">
                     </div>
                     
                     <div class="logg">
                        <img src="<?="img/".$dd['image']?>">
                     </div>
                        <div class="ne">
                                    <p class="p1"><?=$dd['nom']?></p>
                                    <p class="p1"><?=$dd['email']?></p>
                        </div>
                        
                        <form method="post">
                            <h2 >company  Information</h2>
                            <div class="ne1" style="width: 1000px;">
                            <div class="lab"><label class="labin"><em>Name</em><em class="p2"><?=$dd['nom']?></em></div> 

                               <div class="lab"><label class="labin"><em>Email</em><em class="p2"><?=$dd['email']?></em></label></div> 
                                
                               <div class="lab"><label class="labin"><em>Phone</em><em class="p2"><?="+212 ".$dd['number']?></em></label></div> 
                                
                              <div class="lab"><label class="labin"><em>Address</em><em class="p2"><?=$dd['city']?></em></label></div>  
                                
                              <div class="lab"> <label class="labin"><em>About</em><em class="p22"><?=$dd['about']?></em></label></div> 
                                

                        </form>
    </div>
</div>
   <div class="containerfo">
        <div class="footer">
          <div class="logsection">
            <img
            loading="lazy" srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&"
            class="img"  />
            <h2>Find out</h2>
            <span>hello@findout.com</span>
            <span>Phone : +212 63456789</span>
          </div>
          <div class="footer-heading h1">
            <h2> Quick Links </h2>
            <a href="">Services</a>
            <a href="">Portfolio</a>
            <a href="">About us</a>
            <a href="">Testimonial</a>
          </div>
          <div class="footer-heading h2">
            <h2> Resources </h2>
            <a href="">Support</a>
            <a href="">Privacy Policy</a>
            <a href="">Terms & Conditions</a>
            <a href="">Testimonial</a>
          </div>
          <div class="footer-email">
            <h2> Subscribe </h2>
            <input type="email" placeholder="youremail@gmail.com" id="email">
            <input type="submit" value="Send" id="btn">
          </div>
        </div>
  </div>
      
</body>
</html>