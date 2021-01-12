<?php
include('header.php');
        $date  =$_POST['date'];
        $detail = $_POST['detail'];
        $new = $_POST['price'];
        $old = $_POST['old_price'];
        $id  =$_POST['id'];
        $result = $new + $old;
        $sql = "UPDATE `customers` SET `price`= $result WHERE `id`= $id";
        $results = mysqli_query($conn,$sql);
        
        echo $results?"data added Successfully!":"data added failed.";
        
        $query  ="INSERT INTO `customer_detail`(`customer_id`, `gave_amount`,`got_amount` ,`detail`,`date`) VALUES ('$id','$new','','$detail','$date')";
        $results = mysqli_query($conn,$query);
?>

