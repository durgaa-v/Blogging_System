<?php session_start(); ?>


<!DOCTYPE html>
<html>

    <head>
        <title>
            Assignment 2
        </title>

        <link rel="stylesheet" href="style.css">
    </head>


    <body>
    <img src="background.jpg" alt="background" height="100vh" width="100%">

    <?php 

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lecturenotes";

    $emailErr = $passwordErr = "";
    $email = $passInput = "";
    $status = true;

    if(!empty($_POST)){



        if(empty($_POST['email'])){
            $emailErr = "*Email cannot be empty";
            $status = false;
        }
        else{
            $email = $_POST['email'];
        }

        if(empty($_POST['password'])){
            $passwordErr = "*Password cannot be empty";
            $status = false;

        }
        else{
            $passInput = $_POST['password'];
            $passInput = sha1($passInput);
        }

        if($status){


            //Connection to database
            $conn = new mysqli($servername,$username,$password,$dbname);


            if($conn -> connect_error){
                die("Connection failed");
            }

            $sql = "SELECT id,first_name,last_name,email,image FROM users WHERE email = '$email' AND password = '$passInput'";

            $result = $conn -> query($sql);

            if($result -> num_rows > 0){

                $record = $result -> fetch_assoc();
                $_SESSION['loggedIn'] = true;
                $_SESSION['userDetails'] = $record;
                header('Location:profile.php');
            }

            else{

            }
        }


    }
    
    
    
    ?>
        

        <form action="login.php" method="POST" onsubmit ="return validate()">
                        
                <fieldset>

                        <legend>
                            LOGIN
                        </legend>
                        <div class="row"><span class="register">Don't have an account? <a href="register.php">Click Here</a></span></div>
        
        
                        <div class="row"><label>Email:</label><input id="email-input" type="email" name="email" onblur="validate ('email','err1')" onchange="change()" placeholder="test@mail.com" value="<?php echo $email;?>">

                        <span id="err1" style="display: none;">*Email cannot be empty</span>
                        <span id="err1" style="color:red;"><?php echo $emailErr;?></span>
                        
                        </div>
                        
        
                        <div class="row"><label>Password: </label><input id="pass-input" type="password" name="password" onblur="validatePass('password','err2')" onchange = "changePass()" placeholder="password">
                        <span id="err2" style="display: none;">*Password cannot be empty</span>
                        <span id="err2" style="color:red;"><?php echo $passwordErr;?></span>
                        
                        <br></div><br>
                        
    
                        <div class="row"><input type="submit" value="LOGIN"></div>
        
        
                    </fieldset>




        </form>


        <script src="validation.js"></script>
    </body>




</html>