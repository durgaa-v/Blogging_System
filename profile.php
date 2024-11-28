<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portfolio</title>
    <link rel="stylesheet" href="profile.css">
    <script src="https://kit.fontawesome.com/90f37ea620.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>
<body>


    <?php 
    
        session_start();

        if($_SESSION['loggedIn']){



            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "lecturenotes";


            $title = $description = "";
            $titleErr = $descriptionErr = "";
            $status = true;
            $conn = new mysqli($servername,$username,$password,$dbname);
            $id = $_SESSION['userDetails']['id'];



            if(!empty($_POST)){
                



                

                    if(empty($_POST['title'])){
                        $titleErr = "Title cannot be empty";
                        $status = false;
                    }
                    else{
                        $title = $_POST['title'];
                    }

                    if(empty($_POST['description'])){
                        $descriptionErr = "Description cannot be empty";
                        $status = false;
                    }
                    else{
                        $description = $_POST['description'];
                    }


                    if($status){

                        
                        if($conn -> connect_error){
                            die("Connection failed");
                        }


                        $sql = "INSERT INTO post(title,description,user_id) VALUES('$title','$description','$id')";

                        $result = $conn -> query($sql);








                        
                        
                    }


                    

            }
        }


            else{
                header('Location:login.php');
            }

            
    ?>



    <div class="wrapper">



        <div class="left-container">
            
            <!-- <img src="background.jpg" alt="" class="background" width="100%" height="100%"> -->
            <img class="profile_img" src="<?php echo $_SESSION['userDetails']['image'];?>" alt="Profile picture" height="150px" width="150px">
            <h3><?php echo $_SESSION['userDetails']['first_name'];?> <?php echo $_SESSION['userDetails']['last_name'];?></h3>
        <!-- <pre class="text">       Front-End Web Developer
                             &
            Coding enthusiast.
            </pre> -->

            <div class="nav-links">
                <span class="text">Email-id: <?php echo $_SESSION['userDetails']['email']; ?></span>

            </div>
        </div>



        <div class="right-container">


                <img src="background.jpg" alt="" class="background" width="100%" height="100%">
                <div class="logout"><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></div>

                <form action="profile.php" method="POST">
                
                <div class="post-row"><input type="text" name="title" id="title" placeholder="WRITE A COOL TITLE FOR YOUR POST....." value="<?php echo $title?>"></div>
                <div class="post-row"><span><?php echo $titleErr;?></span></div>
                <div class="post-row"><textarea name="description" id="" cols="50" rows="20" placeholder="WRITE SOMETHING INTERESTING....." value="<?php echo $description?>"></textarea></div>
                <div class="post-row"><span><?php echo $descriptionErr;?></span></div>
                <div class="post-row"><input type="submit" class="create-btn" value="Create Post"></div>

                

                
                
                
                </form>







        </div>



    </div>


    <div class="post-section"  style="background-color:#cfb2b5;>
    <br><br>


            <div class="post-container>
    <?php 



                    $sql_post = "SELECT created_date_time,title,description FROM post INNER JOIN users ON post.user_id = users.id WHERE user_id = $id ORDER BY post.id DESC";


                    $result_post = $conn -> query($sql_post);


                    while($row = $result_post -> fetch_assoc()){

                    echo "<center><br><div><h3>". $row['title']. "</h3>";
                    echo "<h5> CREATED ON: " . $row['created_date_time']."<h5><br><br>";
                    echo "<p>" . $row['description']."<p></div><br><br><hr><hr></center>";
                    }

                    $conn -> close();

                ?>

</div>




    </div>

    


</body>
</html>