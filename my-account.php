<?php
include('header.php');
$id = $_SESSION['id'];
$sql = "SELECT `name`, `email`,`lname`,`phone`,`bussiness`,`address`,`image` FROM `users` WHERE `id` = $id ";
        $result = $conn->query($sql);

        if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
 
        }


?>
<?php
if (isset($_POST['submit'])) {
    $name = filter_input(INPUT_POST, 'name');
    $lname = filter_input(INPUT_POST, 'lname');
    $phone = filter_input(INPUT_POST, 'phone');
    $bussiness = filter_input(INPUT_POST, 'bussiness');
    $address = filter_input(INPUT_POST, 'address');


    $query = "UPDATE `users` SET `name`='$name' ,`lname`= '$lname' ,`phone`= '$phone' ,`bussiness`= '$bussiness' ,`address`= '$address' WHERE `id`= $id ";
    $results = mysqli_query($conn, $query);

    if ($results) {
        $sql = "SELECT `name`, `email`,`lname`,`phone`,`bussiness`,`address`,`image` FROM `users` WHERE `id` = $id ";
        $result = $conn->query($sql);

        if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
 
        }

         header("refresh: 1");
          
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
 
    
    <link rel="stylesheet" href="./assets/css/global.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/data-table.css">
    <link rel="stylesheet" href="./assets/css/data-table-css.css">
</head>

<body>
    <main>
        
        <div class="customer-bg">
            <div class="container">
                <div class="my-heading">
                    <h3>
                        My Profile
                    </h3>
                </div>
                <div class="bg-white">
                    <div class="d-flex p-5">
                       
                        <div class="my-profile">
                            <form method="post" action="" enctype="multipart/form-data" id="myform" >
                                <div class="p-relative">
                                    <div class='preview'>
                                        <?php    
                                            if(empty($row['image'])){ ?>
                                                <img src="./upload/default.png" class="my-profile-icon">
                                                <?php }else{ ?>
                                                <img src="./upload/<?php echo $row['image']; ?>" id="img" class="my-profile-icon">
                                                <?php } ?>
                                                <div class="my-profile-edit-img">
                                            <img src="./assets/images/edit.png" width="25px" alt="">
                                        </div>
                                        
                                    </div>
                                    <div class="edit-icon">
                                        <input type="file" id="file" name="file" class="my-profile-choose-file" /> 
                                    </div>
                                </div>
                                        <input type="hidden" class="button" value="Upload" id="but_upload">
                            </form>
                        </div>
                        <div class="w-100">
                            <div class="b-bottom">
                                <p class="top-title">
                                    Personal Information
                                </p>
                            </div>
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="my-account mt-4">
                                <div class="d-flex">
                                    <div class="left-input">
                                        <label for="">First name</label><br>
                                        <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>">
                                    </div>
                                    <div class="right-input">
                                        <label for="">Last name</label><br>
                                        <input type="text" name="lname" id="lname" value="<?php echo $row['lname']; ?>">
                                    </div>
                                </div>
                                <label for="">Email</label>
                                <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>">

                                <label for="">Contact no.</label>
                                <input type="nomber" name="phone" id="phone" value="<?php echo $row['phone']; ?>">

                                <label for="">Business name</label>
                                <input type="text" name="bussiness" id="bussiness" value="<?php echo $row['bussiness']; ?>">

                                <label for="">Address</label>
                                <input type="text" name="address" id="address" value="<?php echo $row['address']; ?>">

                                <div class="b-bottom">
                                    <p class="bottom-title">
                                        Activity Notification
                                    </p>
                                </div>
                                <div class="mt-3">
                                    <label for="" class="op-100">
                                        <input type="checkbox" checked="checked" class="my-acc-chekbox">
                                        I would like to receive notifications from aavak javak when any changes are available.
                                    </label>
                                    <div class="mt-3">
                                        <input class="cstm-button" type="submit" name="submit" value="Save Changes">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$('#file').change(function(){
$("#but_upload").click();
});

$("#but_upload").click(function(){

    var fd = new FormData();
    var files = $('#file')[0].files;
    
    // Check file selected or not
    if(files.length > 0 ){
       fd.append('file',files[0]);

       $.ajax({
          url: 'upload.php',
          type: 'post',
          data: fd,
          contentType: false,
          processData: false,
          success: function(response){
             if(response != 0){
                $("#img").attr("src",response); 
                $(".preview img").show();
                location.reload();
                 // Display image element
             }else{
                alert('file not uploaded');
             }
          },
       });
    }else{
       alert("Please select a file.");
    }
});
});
</script>

</html>