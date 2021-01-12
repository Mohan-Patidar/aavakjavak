<?php
include('header.php');

if(isset($_POST['submit'])){

    $name= $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO `customers`(`name`, `phone`, `address`,`price`) VALUES ('$name','$phone' ,'$address','0')";
    $results = mysqli_query($conn,$sql);
    
    if($results) {
     
      $last_id = mysqli_insert_id($conn);
     
      header("location:c_show.php?id=". $last_id);
      }
   
}
?>



<h1>Add Customer</h1>
<form method="Post" action=""> 
<label>Name</label>
<input type="text" name="name" id="name"></br>

<label>Contact no.</label>
<input type="text" name="phone" id="phone"></br>

<label>Address</label>
<input type="text" name="address" id="address"></br>

<button type="submit" name="submit">Add</button></br>
</form>
<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
  }
</script>