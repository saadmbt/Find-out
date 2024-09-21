<?php
session_start();
require("classconected.php");
$result=[];
$company_id=$_SESSION["id"];
try{
    $d="mysql:host=localhost;dbname=website";
    $ddb=new PDO($d,"root","");
    $idoffer=$_GET["x"];
    /* show  post info statement*/
    $sql="SELECT * FROM offers WHERE id=$idoffer";
    $stm=$ddb->prepare($sql);
    $stm -> execute();
    $result=$stm -> fetchAll();
    
    /* change  posts for company statement*/
    if(isset($_POST["Submit"])){
        $title=$_POST["title"];
        $fromc=$_POST["fromc"];
        $toc=$_POST["toc"];
        $description=$_POST["desc"];
        $image_name= basename($_FILES["image"]["name"]);
        $stm1="UPDATE offers set title='$title' where id=$idoffer";
        $stm=$ddb->prepare($stm1);
        $stm -> execute();
        $stm2="UPDATE offers set fromc='$fromc' where id=$idoffer";
        $stm=$ddb->prepare($stm2);
        $stm -> execute();
        $stm3="UPDATE offers set toc='$toc' where id=$idoffer";
        $stm=$ddb->prepare($stm3);
        $stm -> execute();
        $stm4="UPDATE offers set description='$description' where id=$idoffer";
        $stm=$ddb->prepare($stm4);
        $stm -> execute();
        if(!empty($image_name)){
            $stm5="UPDATE offers set image='$image_name' where id=$idoffer";
            $stm=$ddb->prepare($stm5);
            $stm -> execute();
        }else{
            /*just let image as you find idiot*/
        }

        header("location:posts.php");
         
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
    <title>posts</title>
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
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: 
            center;
        }
        .midalbar{
            margin-top: 15px;
            background-color: #0080ff;
            padding: 13px;
            display: flex;
            align-items: center;
            width: 97%;
            border-radius: 8px;
            margin: 10px 0;
            gap: 15px;
        }
/* form */ 
form {

  margin-top: 30px;
  margin-bottom: 30px;
  padding: 25px;
  background: #fff;
  max-width: 500px;
  width: 100%;
  border-radius: 7px;
  box-shadow: 0 10px 15px rgba(209, 201, 201, 0.05);
}

form h2 {
  font-size: 27px;
  text-align: center;
  margin: 0px 0 30px;
}

form .form-group {
  margin-bottom: 15px;
  position: relative;
}

form label {
  display: block;
  font-size: 15px;
  margin-bottom: 7px;
}

form input,
form select {
  height: 45px;
  padding: 5px;
  width: 100%;
  font-size: 15px;
  outline: none;
  background: #fff;
  border-radius: 3px;
  border: 1px solid #bfbfbf;
}

form input:focus,
form select:focus {
  border-color: #141212;
}

form input.error,
form select.error {
  border-color: #f91919;
  background: #f9f0f1;
}

form small {
  font-size: 14px;
  margin-top: 5px;
  display: block;
  color: #f91919;
}

form .password i {
  position: absolute;
  right: 0px;
  height: 45px;
  top: 28px;
  font-size: 13px;
  line-height: 45px;
  width: 45px;
  cursor: pointer;
  color: #939393;
  text-align: center;
}

.submit-btn {
  margin-top: 30px;
}

.submit-btn input {
  color: white;
  border: none;
  height: auto;
  font-size: 16px;
  padding: 13px 0;
  border-radius: 5px;
  cursor: pointer;
  font-weight: 500;
  text-align: center;
  background: #0080ff;
  transition: 0.2s ease;
}

.submit-btn input:hover {
  background: #179b81;
}
.h2,label{
    color: #000;
}
.pho{
    width: 67%;
    position: relative;
    left: 80px;
}
.prv{
    height: auto;
    width: auto;
    border: 3px solid black;
    margin-bottom:20px ;
    overflow: hidden;
}

#pen{
    font-size: 20px;
    color: black;
    position: relative;
    bottom: -7px;
    left: 125px;
    cursor: pointer;
    background-color: #0080ff;
    padding: 10px;
    border-radius: 12px;
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
                        <a    href="posts.php">
                            <i class="fa-solid fa-table"></i>
                           <p>Posts</p> 
                        </a>
                    </li>
                    <li>
                        <a class="active" href="addpost.php?x=<?=$company_id?>">
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
                <p>Update post</p>
        </div>
        <form  method="post" enctype="multipart/form-data">
            <h2 class="h2"> Update Post </h2>
            <?php foreach($result as $d): ?>
                <div class="prv">
                    <img class="pho" src="<?= "img/".$d['image']; ?>" alt="">
                    <i class="fa-solid fa-pen" id="pen" onclick="document.getElementById('in').click()"></i>
                </div>
                
            <div class="form-group title">
                <label for="title">Title</label>
                <input type="text" id="title" placeholder="Enter The Title" name="title"  value="<?= $d['title']; ?>">
            </div>
            <div class="form-group email">
                <label for="email">City of start</label>
                <input type="text" id="email" placeholder="City of start" name="fromc" value="<?= $d['fromc']; ?>">
            </div>
            <div class="form-group password">
                <label for="password">City of end</label>
                <input type="text" id="password" placeholder="City of end" name="toc" value="<?= $d['toc']; ?>">
            </div>
            <div class="form-group Description">
                <label for="Description"> Description</label>
                <textarea name="desc" id="description" cols="70" rows="8" ><?= $d['description']; ?></textarea>   
            </div>
            <div class="image" style="display: none;">
                <label for="image"> Upload Image</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                <input type="file" name="image" id="in" >
            </div>

            <div class="form-group submit-btn">
                <input type="submit" value="Update post" name="Submit">
            </div>
            <?php endforeach; ?>
       </form>
    </div>
</body>
</html>