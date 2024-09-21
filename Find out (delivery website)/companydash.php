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
    /* total viwes of company statement*/
    $stm2="SELECT sum(views) FROM offers  where company_id=$company_id";
    $stm=$ddb->prepare($stm2);
    $stm -> execute();
    $viwes=$stm -> fetchColumn();
    /* total posts of company statement*/
    $stm3="SELECT count(*) FROM offers  where company_id=$company_id";
    $stm=$ddb->prepare($stm3);
    $stm -> execute();
    $posts=$stm -> fetchColumn();
    /* last  posts of company statement*/
    $stm3="SELECT * from offers where company_id=$company_id  order by id DESC LIMIT 3";
    $stm=$ddb->prepare($stm3);
    $stm -> execute();
    $last_posts=$stm -> fetchall();


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
    <title>Company dashboard</title>
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
        }
        .companyinfo{
            background-color: #1B254B;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between ;
            border-radius: 8px;
            margin: 10px 0;
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
        .part1{
            display: flex;
            align-items: center;
            gap: 15px;
        }
        /* box */ 
        .datainfo{
            display: flex;
            align-items: center;
            justify-content:space-between ;
            flex-wrap: wrap;
            gap: 10px;
        }
        .datainfo .box{
            background-color: #123;
            height: 150px;
            flex-basis: 150px;
            flex-grow: 1;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }
        .datainfo .box i{
            font-size: 45px;
        }
        .datainfo .box .data{
            text-align: center;
        }
        .datainfo .box .data span{
            font-size: 35px;
        }
        /*last posts*/
        .posts {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 20px;
        margin-bottom: 30px;
        gap: 20px;
            }

            .post {
                background: rgb(29, 30, 31);
                border: 1px solid #1F2833;
                margin: 10px;
                padding: 20px;
                width: calc(20% - 40px);
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
                border-radius: 10px;
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .post img {
                width: 100%;
                height: 130px;
                border-radius: 10px 10px 0 0;
            }

            .post h2 {
                margin: 15px 0 10px 0;
                color: #fff;
                font-size: 1.5em;
            }

            .post p {
                color: rgb(181, 183, 183);
                line-height: 1.5;
            }

            .post:hover {
                transform: scale(1.05);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.7);
                border: 1px solid #bbc3c4;
            }
            @media (max-width: 768px) {
                .post,.addpost {
                    width: calc(50% - 40px);
                }
            }

            @media (max-width: 480px) {
                .post,.addpost {
                    width: calc(100% - 40px);
                }
            }
            .p{
            display: flex;
            position: relative;
            left: 10px;
            gap: 5px;
            font-size: 18px;
            margin-bottom: 8px;
            }
            .b{
            position: relative;
            right: 10px;
            bottom: 1px;
            width: 18px
            }
            #b{
            position: relative;
            right: 10px;
                top: 5px;
            width: 18px;
            }

            #btn2 {
            margin-top: 10px;
            width: 100px;
            height: 40px;
            border-radius: 4px;
            background-color: #f9423d;
            outline: none;
            border: none;
            color: #fff;
            font-size: 1rem;
            position: relative;
            bottom: 0;
            left: 5px;
            }
            #btn2:hover {
            cursor: pointer;
            background-color: #337af1;
            }
            a{
                text-decoration: none;
                color: #337af1;
                padding-top: 10px;
                padding-left:5px;
            }
            .aa{
                text-decoration: none;
                color: #f0f0f0;
                font-size: 18px;
                padding-top: 10px;
                padding-left:5px;
            }
            .c{
                width: 15px;
            }
            .btn{
                height: 40px;
                display: flex;
                align-items: center;
            }
            .addpost{
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                gap: 20px;
                background: rgb(29, 30, 31);
                border: 1px solid #1F2833;
                margin: 10px;
                padding: 40px;
                width: calc(20% - 40px);
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
                border: 1px solid #fff;
                border-radius: 10px;
                transition: transform 0.3s, box-shadow 0.3s;
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
                                <a  class="active"  href="companydash.php">
                                    <i class="fa-solid fa-house"></i>
                                    <p>Home</p>
                                </a>
                            </li>
                            <li>
                                <a href="profile.php">
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
        <div class="companyinfo">
            <div class="part1">
                 <div class="imgbox2">
                       <img src="<?="img/".$dd['image']?>" alt="companylogo">
                </div>
                <div>
                    <h2><?="Company Name: ".$dd['nom'].' '?><i class="fa fa-check-circle" style="font-size: 15px;"></i></h2>
                    <p>email :<?=" ".$dd['email']?></p>
                </div>
                
                
            </div>

                <a class="aa" href="profile.php"><i class="fas fa-pen"></i></a>
        </div>
        <div class="datainfo">
                <div class="box">
                    <i class="fas fa-table"></i>
                    <div class="data">
                        <h4>Total Post's</h4>
                        <span><?=$posts?></span>
                    </div>
                </div>
            <div class="box">
                <i class="fas fa-eye"></i>
                <div class="data">
                    <h4>Total Views</h4>
                    <span><?=$viwes?></span>
                </div>
            </div>
            <div class="box">
                <i class="fas fa-table"></i>
                <div class="data">
                    <h4>Total Post's</h4>
                    <span><?=$posts?></span>
                </div>
            </div>
            
        </div>
        <div class="midalbar">
             <i class="fas fa-table"></i>
                <p>Last Post</p>
        </div>
            <div class="posts">
                    <?php foreach($last_posts as $d): ?>
                        <div class="post">
                            <img src="<?= "img/".$d['image']; ?>" alt="<?= $d['title']; ?>">
                            <h2><?= $d['title']; ?></h2>
                            <p class="p"> <svg class="b" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#c9c9c9" d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                            <?="   ".$d['fromc']; ?></p>
                            <p class="p"><svg class="b"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="#c9c9c9" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                            <?=" ".$d['toc']; ?></p>
                            <p class="p"><i class="fas fa-eye" id="b"></i>  views :<?="  ".$d['views']; ?></p>
                        </div>
                    <?php endforeach; ?>
                    <a href="addpost.php?x=<?=$d['company_id']?>"class="addpost">
                        <div >
                            <svg  style="width:70px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#ffffff" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                            <h3 style="text-decoration: none;" >Add Post</h3>
                        </div>
                    </a>
            </div>
     </div>

</body>
</html>