<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/css/global.css">
</head>
<body>
    


<?php 
include('conn.php');
session_start();
    if(isset($_POST['login'])){
        $email_error = $password_error=$invalid="";
        $email = $_POST['email'];
        $password =$_POST['password'];

        if(empty($_POST["email"])){
            $email_error = "Email is required";
        }else {
          $email = $_POST["email"];
        
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_error = "Invalid email format";
          }
        }
        if(empty($password)){
          $password_error = "Please enter password";
        }
 
        if(empty($email_error) && empty($password_error)){

            $query = "SELECT * FROM users WHERE email = '$email' AND password ='".md5($password)."'";
            $result = mysqli_query($conn,$query);
            $row = mysqli_num_rows($result);
            if($row == 1){  
            echo "<h1><center> Login successful </center></h1>";
            $rs=mysqli_fetch_assoc($result);
           
            $id= $rs['id'];
            $_SESSION['id'] = $id;
            
            header('location: dashboard.php');  
        }  
        else{  
            $invalid ="Invalid login details";  
        }       

        }
        

    }
?>

<main>
    <div class="container-fluid pl-0">
        <div class="row">
            <div class="col-md-6">
                <div class="bg-img-login div-center">
                    <div class="p-relative c-white p-100">
                        <h1 class="heading">
                            Hey <br> Glad to see you
                        </h1>
                        <p class="title">
                            to keep connected with us <br> please login with your personal info
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="div-center">
                    <div class="text-center m-auto">
                        <div class="w-500">
                            <div>
                                <img src="./assets/images/Group.png" alt="" class="logo">
                            </div>
                            <div class="top-heading">
                                <h1>Log In</h1>
                            </div>
<div>
<?php if (isset($invalid)){?>
        <p class="form-text text-muted"><?php echo $invalid; ?><p>
    <?php }?>  

    
<form method="POST" action="">
    <!-- <label>Email Id</label> -->
    <div class="form-group">
    <input type="text" name="email" id="email" placeholder="Email">
    <?php if (isset($email_error)){?>
        <p class="error"><?php echo $email_error?><p>
    <?php }?>  
    </div>
    <!-- <label>Password</label> -->
    <div class="form-group">
    <input type="password"  name="password" id="password" placeholder="Password"> 
    <?php if (isset($password_error)){?>
        <p class="error"><?php echo $password_error?><p>
    <?php }?>
    </div>
    <!-- <button type="submit" name="login">Log In</button> -->
    <div class="icon">
        <input type="submit" name="login" value="Log In" class="login-button">
        <div class="arrow">
            <img src="./assets/images/arrow.png" width="30px" alt="">
        </div>
    </div>
    
    <div class="hr"></div>
    
</form>
<!-- <p>Not registered yet? <a href='register.php'>Register Here</a></p> -->

<div class="text-center">
    <div class="font-16">
        <p>Don't have an account yet?
            <span> 
                <a href="register.php">Sign up</a>
            </span>
        </p>
    </div>
</div>

</div>
</div>
</div>
</div>

</div>
</div>
</div>
</main>
    
</div>
</body>
</html>