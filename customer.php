
<?php
include('header.php');

if(isset($_POST['submit'])){
    $uid = $_SESSION['id'];
    $name= $_POST['name'];
    $lname= $_POST['lname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO `customers`(`uid`,`name`,`lname`,`phone`, `address`,`price`) VALUES ('$uid','$name', '$lname','$phone' ,'$address','0')";
    $results = mysqli_query($conn,$sql);
    
    if($results) {
        // header('location : dashboard.php');
        header("refresh: 1");
      }
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="./assets/css/global.css">-->
    <!--<link rel="stylesheet" href="./assets/css/bootstrap.min.css">-->
    <!--<link rel="stylesheet" href="./assets/css/data-table.css">-->
    <!--<link rel="stylesheet" href="./assets/css/data-table-css.css">-->
</head>
<body class="active">
    
<div class="customer-bg">
    <div class="container">
        <div>
            <div class="cstm-heading">
                <div>
                    <h3>
                        Customer's List
                    </h3>
                </div>
                <div>
                    <!-- <a href="addcustomer.php" class="cstm-button"  data-toggle="modal" data-target="#exampleModalCenter">add customer</a> -->
                    <a href="#" class="cstm-button"  data-toggle="modal" data-target="#exampleModalCenter">add customer</a>
                </div>

                <!-- <button type="button" class="cstm-button" data-toggle="modal" data-target="#exampleModalCenter">
                Launch demo modal
                </button> -->

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content p-5">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLongTitle">Add Customer</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form method="Post" action=""> 
                                <input type="hidden" name="uid">
                                <label>Name</label>
                                <input type="text" name="name" id="name"></br>
                                
                                <label>Last Name</label>
                                <input type="text" name="lname" id="lname"></br>

                                <label>Contact no.</label>
                                <input type="text" name="phone" id="phone"></br>

                                <label>Address</label>
                                <input type="text" name="address" id="address"></br>

                                <button type="submit" name="submit" class="cstm-button">Add</button></br>
                            </form>
                            </div>
                            <div class="modal-footer justify-content-start">
                                <!-- <button type="button" class="btn btn-secondary">Close</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>s.no.</th>
                        <th>Customer name</th> 
                    </tr>
                <thead>
                <tbody>
                    <?php
                    $uid = $_SESSION['id'];
                    $sql = "SELECT * FROM `customers` WHERE uid = $uid";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){
                    ?>
                    
                        <tr>  
                            <td><?php echo $row['id'];?></td>
                            <td><a href="c_show.php?id=<?php echo $row['id'];?>&name=<?php echo $row['name'] ?>"><?php echo $row['name']; ?></td>
                        </tr>
                    
                    <?php
                    }
                    ?>
                </tbody>   
            </table>
        </div>
        <!-- <button onclick="goBack()">Go Back</button> -->
    </div>
</div>
 
<!--<script src="./assets/js/Jquery-3.5.1.js"></script>-->
<!--<script src="./assets/js/popup.jquery.js"></script>-->
<!--<script src="./assets/js/bootstrap.min.js"></script>-->
<!--<script src="./assets/js/Jquery.js"></script>-->
<!--<script src="./assets/js/Jquery-bootstrap-4.js"></script>-->
<script>
    $(function() {
        $('#example').DataTable();
    });

    function goBack(){
        window.history.back();
    }

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

</script>
</body>
</html>