<?php
session_start();
require("classconected.php");
$dd=[];
$last_posts=[];
try{
    $d="mysql:host=localhost;dbname=website";
    $ddb=new PDO($d,"root","");
    $company_id=$_SESSION["id"];
    $stmm="SELECT*from company where id=$company_id" ; 
    $stm=$ddb->prepare($stmm);
    $stm -> execute();
    $dd=$stm -> fetch();
    if(empty($dd)){
        echo"return  false";
    }
    if(isset($_POST['submit'])){
        $nom=$_POST["nom"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
        $address=$_POST["address"];
        $about=$_POST["about"];
        $stm1="UPDATE company set nom='$nom' where id=$company_id";
        $stm=$ddb->prepare($stm1);
        $stm -> execute();
        $stm2="UPDATE company set email='$email' where id=$company_id";
        $stm=$ddb->prepare($stm2);
        $stm -> execute();
        $stm3="UPDATE company set number=$phone  where id=$company_id";
        $stm=$ddb->prepare($stm3);
        $stm -> execute();
        $stm4="UPDATE company set city='$address' where id=$company_id";
        $stm=$ddb->prepare($stm4);
        $stm -> execute();
        $stm5="UPDATE company set about='$about' where id=$company_id";
        $stm=$ddb->prepare($stm5);
        $stm -> execute();
         header('location:profile.php');

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
    <title>Company profile  dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'Poppins',sans-serif;
        }
        body{
            background-color: #000;
            color: #f0f0f0;
            display: flex;
        }
        .imgbox{
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .imgbox img{
            width: 100%;
            overflow: hidden;
        }
        .logo{
            display: flex;
            align-items: center;
            gap: 20px;
            border-bottom: 1px solid  whitesmoke;
            margin-bottom: 30px;
        }
        .logo h2{
            font-size: 20px;
            text-transform: capitalize;
        }
        .menu{
            background-color: #1B254B;
            width: 220px;
            height: auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }
        ul{
            list-style: none;
            position: relative;
            height:95%;
        }
        ul li a{
            display: block;
            text-decoration: none;
            color: #f0f0f0;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            display: flex;
            align-items: center;
            gap: 40px;
            transition: 0.5s;
        }
        ul li a:hover , .active ,.datainfo .box:hover{
            background-color: #ffffff55;
        }
        .logout{
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .logout a{
            background-color: #a00;
        }
        ul li a i{
            font-size: 22px;
        }
        .imgbox2{
            display: flex;
            align-items: center;
            width: 80px;
            height: 80px;
            border-radius: 50px;            
        }
        .imgbox2 img{
            width:100%;
            overflow: hidden;
        }
        .menu-items{
            flex: 1; /* This makes the menu items take up all available space */
        }
        /*content*/ 
        .content{
            width: 100%;
            margin: 10px;
            background-color: #123;

        }
        .midalbar{
            margin-top: 15px;
            background-color: #0080ff;
            padding: 13px;
            display: flex;
            align-items: center;
            border-radius: 8px;
            margin: 10px 0;
            gap: 15px;
        }
        .main{
            position: relative;
            left: 100px;
            display: flex;
            flex-direction: column;
            width: 80%;
            justify-content: center;
            align-items: center;
        }
        .ban {
                width: 50%;
                border-radius: 12px;
                margin-top: 10px;
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
            bottom: -7px;
            right: 0;
            background-color: #0080ff;
            padding: 8px;
            border-radius: 12px;

         }
         .log{
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
        }
        .log img{
            width:100%;
            overflow: hidden;
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

        em{
            font-style: normal;
            padding-left: 20px;
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
    </style>
</head>
<body>
     <div class="menu">
                <div class="logo">
                    <div class="imgbox">
                        <img src="img/logosite.png" alt="logo"> 
                    </div>
                    <h2>Find out</h2>
                </div>
                <div class="menu-items">
                        <ul>
                            <li>
                                <a    href="companydash.php">
                                    <i class="fa-solid fa-house"></i>
                                    <p>Home</p>
                                </a>
                            </li>
                            <li>
                                <a class="active" href="profile.php">
                                    <i class="fa-solid fa-user"></i>
                                <p>Profile</p> 
                                </a>
                            </li>
                            <li>
                                <a href="posts.php">
                                    <i class="fa-solid fa-table"></i>
                                <p>Posts</p> 
                                </a>
                            </li>
                            <li>
                        <a href="addpost.php?x=<?=$company_id?>">
                            <i class="fa-solid fa-plus"></i>
                           <p>Add post</p> 
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-solid fa-cog"></i>
                                <p>Settings</p> 
                                </a>
                            </li>
                            <li class="logout">
                                <a href="logout.php">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <p>logout</p>  
                                </a>
                            </li>

                        </ul>
                </div>  
       </div>
     <div class="content">
                <div class="midalbar">
                            <i class="fas fa-user"></i>
                            <p>Company Information</p>
                    </div>
                <div class="main">
                     <div class="ban">
                        <img src="<?="img/".$dd['banner']?>">
                        <i class="fas fa-upload" id="pen" onclick="document.getElementById('in').click()"></i>
                                <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                                <input type="file" name="image" id="in" style="display: none;">
                     </div>
                     
                     <div class="log">
                        <img src="<?="img/".$dd['image']?>">
                        <i class="fas fa-pen" id="pen2" onclick="document.getElementById('in').click()"></i>
                                <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                                <input type="file" name="image" id="in" style="display: none;">
                     </div>
                        <div class="ne">
                                    <p class="p1"><?=$dd['nom']?></p>
                                    <p class="p2" ><?=$dd['email']?></p>
                        </div>
                        <form method="post">
                            <h2 style="margin-bottom: 50px;">Account Information</h2>
                            <div class="ne1" style="width: 1000px;">
                               <div class="lab"><label class="labin"><em>Name</em><em class="p2"><?=$dd['nom']?></em></label><label class="btn" id="a1" onclick="show(1,'a1')" ondblclick="hide(1)">Change</label> 
                                <div class="hidden" id="1"><input type="text" name="nom" value="<?=$dd['nom']?>" class="input1"  ><input type="submit" class="btn1" value="Update" name="submit"></div>  </div> 

                               <div class="lab"><label class="labin"><em>Email</em><em class="p2"><?=$dd['email']?></em></label><label class="btn" id="a2" onclick="show(2,'a2')">Change</label>
                               <div class="hidden" id="2"><input type="text" name="email" value="<?=$dd['email']?>" class="input1" ><input type="submit" class="btn1" value="Update" name="submit"></div></div> 
                                
                               <div class="lab"><label class="labin"><em>Phone</em><em class="p2"><?=$dd['number']?></em></label><label class="btn" id="a3" onclick="show(3,'a3')">Change</label>
                                        <div class="hidden" id="3"><input type="text" name="phone" value="<?=$dd['number']?>" class="input1" ><input type="submit" class="btn1" value="Update" name="submit"></div></div> 
                                
                              <div class="lab"><label class="labin"><em>Address</em><em class="p2"><?=$dd['city']?></em></label><label class="btn" id="a4" onclick="show(4,'a4')">Change</label>
                                        <div class="hidden" id="4"><input type="text" name="address" value="<?=$dd['city']?>" class="input1" ><input type="submit" class="btn1" value="Update" name="submit"></div></div>  
                                
                              <div class="lab"> <label class="labin"><em>About</em><em class="p22"><?=$dd['about']?></em></label><label class="btn" id="a5" onclick="show(5,'a5')">Change</label>
                                        <div class="hidden" id="5"><textarea  name="about" cols="500" rows="10"   class="input1" ><?=$dd['about']?></textarea> <input type="submit" class="btn1" value="Update" name="submit"></div></div> 
                                
                               
                        </form>
                </div>

         </div>
         <script>
            function show($id,$i) {
                document.getElementById($id).style.display='block';
                document.getElementById($i).style.display='none';
            }
            function hide($id) {
                document.getElementById($id).style.display='none';
            }
         </script>
</body>
</html>