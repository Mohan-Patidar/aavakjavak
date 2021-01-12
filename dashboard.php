<?php 

include('header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!--<link rel="stylesheet" href="./assets/css/global.css">-->
    <!--<link rel="stylesheet" href="./assets/css/bootstrap.min.css">-->
    <!--<link rel="stylesheet" href="./assets/css/data-table.css">-->
    <!--<link rel="stylesheet" href="./assets/css/data-table-css.css">-->
</head>
<body>

    <!-- <a href="addcustomer.php"> add Customer </a><br> -->
    <div class="box">
        <div class="container">
            <div class="img-left">
                <img src="./assets/images/Repeat Grid 2.png" width="100px" alt="">
            </div>
            <div class="img-right">
                <img src="./assets/images/Repeat Grid 1.png" width="120px" alt="">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="dashboard">
            <div style="margin-bottom: 20px;">
                <h3>
                    Transcation history
                </h3>
            </div>
            <table id="example" class="table table-striped" style="width:100%;">

                <thead style="border: none;">
                    <tr class="text-center">
                        <th style="display: none;"></th>
                        <th style="display: none;"></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // $sql  = "SELECT customers.name , customers.lname ,customers.price ,
                    //                 customer_detail.detail
                    //             FROM  customers INNER JOIN customer_detail
                    //             ON  customers.id = customer_detail.customer_id ";
                    $uid = $_SESSION['id'];
                    $sql = "SELECT * FROM `customers` WHERE uid = $uid";
                    $result = mysqli_query($conn, $sql);
                    // $row = mysqli_fetch_assoc($result);
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $a = $row['name'];
                        $b = $row['lname'];
                        $n = $a[0];
                        $l = $b[0];
                       
                    ?>
                    
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="user-img">
                                    <h3><?php echo $n . '' . $l; ?></h3>
                                </span>
                                <span>
                                    <p class="user-name"><?php echo $row['name'] . ' ' . $row['lname']; ?></p>
                                </span> 
                            </div>
                        </td>
                      
                        <td>
                            <span class="mr-2"> 
                               <!--<img src="./assets/images/min.png" height="20px" alt="">      -->
                            </span>
                             <span><?php if($row['price']<0){?>
                                <span class="minus">-</span>
                                 <span>&#8377</span>
                                <?php  echo - $row['price']; 
                                }else{?>
                                <!--<img src="./assets/images/plas.png" height="20px" alt="">  -->
                                    <span class="plas">+</span>
                                    <span>&#8377</span>
                                    <?php echo $row['price'];
                                }?></span>
                        </td>
                    </tr>
                     <?php    }    ?>
                </tbody>
            </table>
        </div>
    </div>
        
    
 <!--<script src="./assets/js/Jquery-3.5.1.js"></script>-->
 <!--   <script src="./assets/js/Jquery.js"></script>-->
 <!--   <script src="./assets/js/Jquery-bootstrap-4.js"></script>-->
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                scrollY: 460
            });
        });
    </script>


   
</body>
</html>
    