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

    $fnameErr = $lnameErr = $emailErr = $phoneErr = $passErr = $repassErr = "";
    $fname= $lname = $email = $phone = $pass = $repass = "";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lecturenotes";
    $status = true;


    
    if(!empty($_POST)){

        if(empty($_POST['fname'])){
            $fnameErr = "*First name cannot be empty";
            $status = false;
        }

        else{
            $fnameErr = "";
            $fname = $_POST['fname'];

        }

        if(empty($_POST['lname'])){
            $lnameErr = "*Last name cannot be empty";
            $status = false;

        }

        else{
            $lnameErr = "";
            $lname = $_POST['lname'];

        }

        if(empty($_POST['email'])){
            $emailErr = "*Email cannot be empty";
            $status = false;

        }

        else{
            $emailErr = "";
            $email = $_POST['email'];

        }

        if(empty($_POST['pnumber'])){
            $phoneErr = "*Phone number cannot be empty";
            $status = false;

        }

        else{
            $phoneErr = "";
            $phone = $_POST['pnumber'];

        }

        if(empty($_POST['password'])){
            $passErr = "*Password cannot be empty";
            $status = false;

        }
        else{
            $passErr = "";
            $pass = $_POST['password'];
            $pass = sha1($pass);
        }

        if(empty($_POST['repassword'])){
            $repassErr = "*Password cannot be empty";
            $status = false;

        }
        elseif($_POST['password'] != $_POST['repassword']){
            $repassErr = "*Passwords don't match";
            $status = false;

        }
        elseif($_POST['password'] == $_POST['repassword']){
            $repassErr = "";
        }

        //File related code
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profileImage"]["name"]);
        $fileStatus = true;
        //get the image extension

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if($imageFileType != "jpg" && $imageFileType != "png"){

            $fileErr = "Only JPG AND PNG FILE TYPES ALLOWED";
            $fileStatus = false;
            $status = false;
        }

        if($fileStatus){
            if(move_uploaded_file($_FILES["profileImage"]["tmp_name"],$target_file)){
                $status = true;
                //die("File uploaded);
            }
            else{
                $fileErr = "Issues in the file upload";
                $status = false;
            }
        }



        $conn = new mysqli($servername,$username,$password,$dbname);

        //Check Connection
        if($conn -> connect_error){
            die("Connection failed " . $conn -> connect_error);
        }
        else{


            if($status){
                $sql = "INSERT INTO users (first_name,last_name,email,phone_no,password,image) VALUES('$fname','$lname','$email','$phone','$pass','$target_file')";
                echo $sql;
                if($conn -> query($sql)){
                    echo "New record created successfully";
                    header('Location:login.php');
                }
                else{
                    echo "Erro: " . $sql . "<br>" . $conn -> error;

                }
            }
        }

        $conn -> close();

    }

    
    
    ?>
        

        <form action="register.php" method="POST" enctype="multipart/form-data">
        
            <fieldset> 
                    <legend>
                        REGISTRATION
                    </legend>
                    <div class="row"><span class="register">Already have an account? <a href="login.php">Click Here</a></span></div>

                <div class="container">
                    <div class="row"><label>First Name: </label><input id="inputfield-1" onblur="validatef()" type="text" name="fname" value="<?php echo $fname;?>">
                        <span id="err1" style="display: none;">*First name cannot be empty</span>
                        <span id="err1" style="color:red;"><?php echo $fnameErr;?></span>
                        <br>
                    </div>

                    <div class="row"><label>Last Name:</label><input id="inputfield-2" onblur="validatel()" type="text" name="lname" value="<?php echo $lname;?>">
                        <span id="err2" style="display: none;">*Last name cannot be empty</span>
                        <span id="err2" style="color:red;"><?php echo $lnameErr;?></span>
                        <br>
                    </div>

                    <div class="row"><label>Email:</label><input id="inputfield-3" onblur="validateMail()" type="email" name="email" value="<?php echo $email;?>">
                        <span id="err3" style="display: none;">*Email cannot be empty</span>
                        <span id="err3" style="color:red;"><?php echo $emailErr;?></span>
                        <br>
                    </div>

                    <div class="row"><label>Phone Number: </label><input id="inputfield-4" onblur="validatePhn()" type="number" name="pnumber" value="<?php echo $phone;?>">
                        <span id="err4" style="display: none;">*Phone number cannot be empty</span>
                        <span id="err4" style="color:red;"><?php echo $phoneErr;?></span>
                        <br>
                    </div>

                    <div class="row"><label>Password: </label><input id="inputfield-5" onblur="validatePass()" type="password" name="password">
                    <span id="err5" style="display: none;">*Password cannot be empty</span>
                    <span id="err5" style="color:red;"><?php echo $passErr;?></span>
                        <br>
                    </div>

                    <div class="row"><label>Re-enter Password: </label><input id="inputfield-6" onblur="validateRePass()" type="password" name="repassword">
                    <span id="err6" style="display: none;">*Password cannot be empty</span>
                    <span id="err6" style="color:red;"><?php echo $repassErr;?></span>
                        <br>
                    </div>

                    <div class="row"><label>Upload Image:               <input name = "profileImage" type="file"/></label></div>

                    
                    <br>

                    <div class="row"><input type="submit" onclick ="registerValidate()" value="REGISTER"><input type="reset" value="RESET" ><span id="err7" style="display: none">Please check input fields</span></div>
                   
                </div>


            </fieldset>
            




        </form>


        <script src="validateRegister.js"></script>
    </body>




</html>