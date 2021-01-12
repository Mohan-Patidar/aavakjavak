
<?php
  if(!isset($email)){
    $email = $name = $lname = "";
    $name_error =  $name_error = $email_error = $password_error="";
  }
  include "conn.php";
    if (isset($_POST['submit']) ){
        $name = filter_input(INPUT_POST,'name');
        $lname = filter_input(INPUT_POST,'lname');
        $email = filter_input(INPUT_POST,'email');
        $password = filter_input(INPUT_POST,'password');
        $cpassword = filter_input(INPUT_POST,'cpassword');
        
        if(empty($name)){
            $name_error = "Please enter name";
        }elseif(!preg_match("/^[a-zA-Z ]*$/",$name)){
            $name_error = "Only letters and white space allowed";
        }
        if(empty($lname)){
            $lname_error = "Please enter last name";
        }elseif(!preg_match("/^[a-zA-Z ]*$/",$lname)){
            $lname_error = "Only letters and white space allowed";
        }
      
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
        }elseif($password != $cpassword){
          $password_error = "Password does not match";
        }
 
        
  
       	if(empty($email_error) && empty($password_error) && empty($name_error)){

          $sql_u = "SELECT * FROM users WHERE name='$name'";
          $sql_e = "SELECT * FROM users WHERE email='$email'";
          $res_u = mysqli_query($conn, $sql_u);
          $res_e = mysqli_query($conn, $sql_e);

          if(mysqli_num_rows($res_e) > 0){
            $email_error = "Sorry... email already taken"; 	
          }else{
               $query = "INSERT INTO users (name,lname, email,password) 
                        VALUES ('$name','$lname','$email','".md5($password)."')";
               $results = mysqli_query($conn, $query);
            
              if($results){
                // echo "Registeration success <br/><a href='index.php'> Login</a>."; 
                header("location:index.php");
               }
              }
            }
 
    }
?>  


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/css/global.css">
    
</head>
<body>
<main>
  <div class="container-fluid pl-0">
      <div class="row">
        <div class="col-md-6">
            <div class="bg-img-signup div-center">
                <div class="p-relative c-white p-100">
                    <h1 class="heading">
                        Hey <br> Glad to have you
                    </h1>
                    <p class="title">
                        want to connected width us <br> please sign up with your personal info
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
                          <h1>Sign up</h1>
                      </div>
<div class="">
    <div class="login">
    <form  action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <?php if (isset($err)){?>
        <p class="error"><?php echo $err?><p>
        <?php }?>
        <div class="form-group">
        <input class="form-control"  type="text"  name="name" placeholder="First Name"   />
        <?php if (isset($name_error)){?>
        <p class="error"><?php echo $name_error?><p>
        <?php }?>
        </div>

        <div class="form-group">
        <input class="form-control"  type="text"  name="lname" placeholder="Last Name"   />
        <?php if (isset($lname_error)){?>
        <p class="error"><?php echo $lname_error?><p>
        <?php }?>
        </div>
        
        <div class="form-group">
        <input class="form-control" type="text"  name="email" placeholder="Email Address">
        <?php if (isset($email_error)){?>
            <p class="error"><?php echo $email_error?><p>
        <?php }?>
        </div>
       
        <div class="form-group">
        <input class="form-control" type="password"  name="password" placeholder="Password">
        <?php if (isset($password_error)){?>
            <p class="error"><?php echo $password_error?><p>
        <?php }?>
        </div>

        <div class="form-group">
        <input class="form-control" type="password"  name="cpassword" placeholder="Confirm Password">
        </div>
       
        
        <div class="form-group text-center" >
        <!-- <input   class="btn btn-primary btn-lg " type="submit" name="submit" value="Register" > -->
        <div class="icon">
            <input type="submit" name="submit" value="sign up" class="login-button m-0">
            <div class="arrow">
                <img src="./assets/images/arrow.png" width="30px" alt="">
            </div>
        </div>
        </div>
        </div>
        <!-- <p class="text-center">Already a user ?<a href="index.php">login </a></p> -->
        <div class="hr"></div>
        <div class="text-center">
            <div class="font-16">
                <p>Already have an account !
                    <span> 
                        <a href="index.php">Log In</a>
                    </span>
                </p>
            </div>
        </div>
    </div>

        
       
    </form>
    </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </main>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

</script>

</body>
</html>

