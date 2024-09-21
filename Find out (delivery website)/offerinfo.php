<?php
session_start();
require("classconected.php");
$id=$_SESSION["id"];
$dd=[];
$dc=[];
$noresualt=false;
try{
    $d="mysql:host=localhost;dbname=website";
    $ddb=new PDO($d,"root","");
    $stm=$ddb->prepare("SELECT *from clientt where id=$id");
    $stm -> execute();
    $client= $stm ->fetch();

    if (isset($_GET['x']) && isset($_GET['y']) ){
      $idoffer=$_GET["x"];
      $idcompany=$_GET["y"];
      $stmm="SELECT*from offers where id='$idoffer'"; 
      $stm=$ddb->prepare($stmm);
      $stm -> execute();
      $dd=$stm -> fetch();
      /*company statment*/ 
      $stmd="SELECT*from company where id='$idcompany'"; 
      $stm=$ddb->prepare($stmd);
      $stm -> execute();
      $dc=$stm -> fetch();
      /* count number of views statment*/
      $stmc="SELECT*from offers where id='$idoffer'";
      $stm=$ddb->prepare($stmc);
      $stm -> execute();
      $res=$stm -> fetch();
      $view=$res['views'];
      $views=$view+1;
      $stmm="UPDATE offers SET views='$views' WHERE id='$idoffer'";
      $stm=$ddb->prepare($stmm);
      $stm -> execute();
    }
    if (empty($dd)) {
        $noresualt=true;
    }
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
    <title>Offer information page </title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        
     @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap');

        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}
/*
body{
    background-color: #000000; 
       margin: 0;
    padding: 0;
}
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;

}
*/
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
/*posts section*/

body {
    font-family: Arial, sans-serif;
    background-color: #000;
    margin: 0;
    padding: 0;
    
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
    padding-left: 0; 
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
.offerinfo{
    width: 96%;
    margin: 0 0;
    padding: 40px;
    display: flex;
    flex-direction: column;
    color: #ccc;
    font-family: DINNext, Matterhorn, Helvetica, sans-serif;
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
}
.img8{
    position: relative;
    left: 15px;
    width: 500px;
    height: 350px; 
    display: flex;
    background: rgb(29, 30, 31);
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    border: 3px solid #1F2833;
  }
.title{
    color: whitesmoke;
    line-height: 3rem;
    font-family: sans-serif;
    font-size: 35px;
    font-weight: 600;
    padding-bottom: 12px;
    text-transform: none;
    padding-bottom :12px;
    padding-top :25px;
    padding-left :80px;
    margin-bottom: 20px;
    
}
.p{
    color: rgb(18, 18, 19);
  display: flex;
  position: relative;
  left: 10px;
  gap: 10px;
  font-size: 18px;
  margin-bottom: 8px;
  text-transform: capitalize;
}
.b{
  position: relative;
  right: 10px;
  bottom: 1px;
  font-size: 20px;

}
h3{
    color: white;
    padding-bottom: 10px;
}
.des{
    padding-bottom: 18px;
}
h4{
    padding-top: 5px;
    padding-bottom: 5px;
    font-size: 17px;

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
                /* see more btn*/
                .see{
                  display: flex;    
                  align-items: center;      
                  gap: 30px; 
                  margin-top: 20px;       
                }
                #btn2 {
                
                width: 100px;
                height: 40px;
                border-radius: 4px;
                background-color: #f9423d;
                outline: none;
                border: none;
                color: #fff;
                font-size: 1rem;
                }
                a{
                  text-decoration: none;
                  color: #337af1;
                  padding-top: 10px;
                  padding-left:5px;
                }
                .c{
                  width: 15px;
                  position: relative;
                  bottom: 5px;
                  left: 5px;
                }
                .dess{
                  background: rgb(29, 30, 31);
                  border-radius: 8px;
                  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
                  border: 3px solid #1F2833;
                  margin-top: 20px;
                  text-align: center;
                  height: 200px;
                  padding: 20px;

                }
                .dest{
                  background: rgb(29, 30, 31);
                  border-radius: 8px;
                  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
                  border: 3px solid #1F2833;
                  margin-top: 20px;
                  text-align: center;
                  height: 200px;
                  width: 500px;
                  padding: 20px;
                }
                .dest p{
                  color: rgb(204, 204, 204);
                  font-family:Arial, Helvetica, sans-serif;
                  font-size: 18px;
                  line-height: 1.6;
                  padding: 10x;
                  margin: 20px;
                }
                .dess p{
                  color: rgb(204, 204, 204);
                  font-family:Arial, Helvetica, sans-serif;
                  font-size: 18px;
                  line-height: 1.6;
                  padding: 10x;
                  margin: 20px;
                }
                .companyinfo h4{
                  color: rgb(204, 204, 204);
                  font-family:Arial, Helvetica, sans-serif;
                  font-size: 18px;
                  line-height: 1.6;
                  padding: 10x;
                  margin: 15px;
                }
                .companyinfo{
                  background: rgb(29, 30, 31);
                  border-radius: 8px;
                  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
                  border: 3px solid #1F2833;
                  margin-top: 20px;
                  text-align: center;
                  padding: 40px;
                }
                .p1{
                  display: flex;
                  flex-direction: column;
                  justify-content: space-between;
                  flex-basis: 300px;
                  flex-wrap: wrap;
                  gap: 40px;
                }
                .p2{
                  display: flex;
                  flex-direction: column;
                  flex-basis: 300px;
                  flex-wrap: wrap;
                  gap: 40px;
                }
                .pp{
                  display: flex;
                  flex-direction: row;
                  justify-content: space-around;
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
    <div class="offerinfo">
        <h2 class="title"><?= $dd['title']; ?></h2>
        <div class="pp">
            <div class="p1">
              <img src="<?= "img/".$dd['image']; ?>" class="img8"> 
                <div class="dess">
                  <h3 style="padding-top: 15px; font-size:25px"> description </h3>
                  <p class="des"><?= $dd['description']; ?></p>
              </div>
            </div>

            <div class="p2">
      
                    <div class="dest">
                        <h3 style="padding-top: 15px; font-size:25px"> Destination </h3>
                          <p class="p"> <svg class="b"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#c9c9c9" d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                            <?="   ".$dd['fromc']; ?></p>
                          <p class="p"><svg class="b" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="#c9c9c9" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                            <?=" ".$dd['toc']; ?></p>
                    </div>
                    <div class="companyinfo">
                        <h3 style="padding-top: 15px; font-size:25px"> Company Information </h3>
                        <h4>Company Name : <?=" ".$dc['nom']; ?></h4>
                        <h4>Company email : <?=" ".$dc['email']; ?></h4>
                        <h4>Company website : <?=" ".$dc['website']; ?></h4>
                          <div class="see">
                              <h4>Company Profile : </h4>
                              <a href="compclient.php?x=<?=$dc['id']; ?>" id="btn2" >See more 
                                  <svg class="c" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#c9c9c9" d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                              </a>
                          </div>
                    </div>   
              </div>
      </div>
      

      
       
        
      

          
   </div>
 
  
   <div class="containerfo">
        <div class="footer">
          <div class="logsection">
            <img
            loading="lazy" srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/147f952aadf017a6bebeb309514e905a7d06ddd05a334d7d1740e109959b8e1c?apiKey=e6c8f1ef4d084aafa6c0620dc1da92eb&"
            class="img"  />
            <h2>Find out</h2>
            <span>hello@navytech.com</span>
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