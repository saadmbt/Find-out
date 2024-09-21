<?php
session_start();
require("classconected.php");
$last_posts=[];
try{
    $d="mysql:host=localhost;dbname=website";
    $ddb=new PDO($d,"root","");
    $company_id=$_SESSION["id"];
    /* last  posts of company statement*/
    $stm3="SELECT * from offers where company_id=$company_id";
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
    <title>company  posts page </title>
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
            height: 100vh;
            padding: 20px;
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
            top: 480px;
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

        /*last posts*/
    .posts {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
    gap: 15px;
    margin-bottom: 30px;
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
    .post {
        width: calc(50% - 40px);
    }
}

@media (max-width: 480px) {
    .post {
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

#btn2 {    
  margin-top: 10px;
  width: 80px;
  height: 20px;
  border-radius: 4px;
  background-color: #337af1;
  outline: none;
  border: none;
  color: #fff;
  font-size: 1rem;
  }
.btn2 {    
  margin-top: 10px;
  width: 80px;
  height: 20px;
  border-radius: 4px;
  background-color: #a00;
  outline: none;
  border: none;
  color: #fff;
  font-size: 1rem;
  }
  #btn2:hover {
  cursor: pointer;
  background-color: #337af1;
  }
  .pp{
    font-style: normal;
    position: relative;
    bottom: 4px;
    right: 22px;
    color: #fff;
    padding: 30px;
  }
  a{
    text-decoration: none;
    color: #337af1;
    padding-top: 10px;
    padding-left:5px;
  }
  .c{
    width: 15px;
  }
  .btn{
    height: 50px;
    display: flex;
    align-items: center;
    flex-direction: row;
    gap: 40px;
  }
  #b{
  position: relative;
  right: 10px;
    top: 5px;
  width: 18px;
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
                        <a  href="companydash.php">
                            <i class="fa-solid fa-house"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li>
                        <a href="profile.php?x=<?=$company_id?>">
                            <i class="fa-solid fa-user"></i>
                           <p>Profile</p> 
                        </a>
                    </li>
                    <li>
                        <a   class="active"  href="posts.php">
                            <i class="fa-solid fa-table"></i>
                           <p>Posts</p> 
                        </a>
                    </li>
                    <li>
                        <a href="addpost.php?x=<?=$company_id?>">
                            <i class="fa-solid fa-plus"></i>
                           <p>Add Post</p> 
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
                <i class="fas fa-table"></i>
                <p>All Posts</p>
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
                <div class="btn">
                    <a href="change.php?x=<?= $d['id'] ?>" id="btn2"><em class="pp" >Change</em></a>
                    <a href="delete.php?x=<?= $d['id'] ?>" class="btn2"><em class="pp">Delete</em></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
</body>
</html>