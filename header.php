
<?php
session_start();
include "conn.php";

if (!isset($_SESSION['id'])) {
    header("location:index.php");

    $query= "SELECT * FROM users WHERE id='" . $_SESSION['id'] . "'";
    $result= mysqli_query($conn,$query);
}

?>
<?php $id = $_SESSION['id']; 
$sql = "SELECT `image` FROM `users` WHERE `id` = $id ";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
   
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="./assets/js/jquery-bootstrap-4.js">-->
    
    <link rel="stylesheet" href="./assets/css/data-table.css">
    <link rel="stylesheet" href="./assets/css/data-table-css.css">
    <link rel="stylesheet" href="./assets/css/global.css">

    
</head>
<body>
    
<div class="header">
    <div class=container-fluid>
        <div class="d-flex align-items-center justify-content-around">
            <a href="">
                <img src="./assets/images/Group.png" width="100px" alt="">
            </a>
            <div style="width: 70%;">
                <ul class="nav">
                    <li class='active'>
                        <a href="dashboard.php">
                            <span>
                                <img src="./assets/images/dashboard.png" alt="">
                            </span>
                            <span class="ml-1"> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="my-account.php">
                            <span>
                                <img src="./assets/images/my-account.png" alt="">
                            </span>
                            <span class="ml-1"> My Account </span>
                        </a>
                    </li>
                    <li>
                        <a href="customer.php">
                            <span>
                                <img src="./assets/images/user.png" alt="">
                            </span>
                            <span class="ml-1"> Customer </span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="mail-div">
                <ul class="nav-2">
                    <li>
                        <div class="btn-group">
                            <a href="#" data-toggle="dropdown">
                                <img src="./assets/images/notification.png" alt="notification">
                            </a>
                            <div class="dropdown-menu right-side ntfn">
                                <h4 class="bg">Notification</h4>
                                <a class="dropdown-item p-0" href="#">
                                    <div class="notification-box">
                                        <span class="user-img">
                                            <h4 class="m-0">AP</h4>
                                        </span>
                                        <span>
                                            <p class="m-0">
                                                fnb
                                            </p>
                                        </span>
                                    </div>
                                </a>
                                <a class="dropdown-item" href="#"></a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="btn-group">
                            <a href="#" data-toggle="dropdown" class="ml-3">
                                <span>
                                     <?php    
                                        if(empty($row['image'])){ ?>
                                            <img src="./assets/images/NoPath.png" class="user-icon">
                                        <?php }else{ ?>
                                            <img src="./upload/<?php echo $row['image']; ?>" id="img" class="user-icon">
                                        <?php } ?>   
                                </span>
                                <span>
                                    <img src="./assets/images/arrow-down.png" alt="" >
                                </span>
                            </a>
                            <div class="dropdown-menu left-side">
                                <a class="dropdown-item" href="my-account.php">Profile</a>
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/Jquery-3.5.1.js"></script>
<script src="./assets/js/popup.jquery.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/Jquery.js"></script>
<script src="./assets/js/Jquery-bootstrap-4.js"></script>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<!--<script src="./assets/js/Jquery-3.5.1.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
<!--<script src="./assets/js/popup.jquery.js"></script>-->
<!--<script src="./assets/js/active.class.js"></script>-->

<script>
    $('#myModal').on('shown.bs.modal', function (){
        $('#myInput').trigger('focus')
    })
    
</script>

</body>
</html>