<link rel="stylesheet" href="assests/css/table.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<?php
$id = $_GET['id'];
$name = $_GET['name'];
include('header.php');

//sum of gave amount
 $sql = "SELECT SUM(`gave_amount`) As total_price FROM `customer_detail` WHERE customer_id= $id ";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_object($result) ;
$g_amount = $row->total_price;
//sum of taken amount
$sqli = "SELECT SUM(`got_amount`) As total_price FROM `customer_detail` WHERE customer_id= $id ";
 $results = mysqli_query($conn, $sqli);
 $rows = mysqli_fetch_object($results) ;
 $t_amount= $rows->total_price;

//remaining price
$r_amount  = $g_amount - $t_amount;
echo "You Gave :" .$g_amount;
echo "<br>";
echo "You Got :" .$t_amount;
echo "<br>";
echo "Remaining Amount :" .$r_amount;

$query= "SELECT * FROM `customer_detail` WHERE customer_id= $id ";
$results = mysqli_query($conn, $query);

echo "<h4>Customer Name:". $name ."</h4>";
echo "<br>";
echo "<br>";

echo"<div class='row'>
        <div class='column'>
            <table  id='example' class='center' style='width:80%'>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Detail</th>
                        <th>You Gave</th>  
                        <th>You Got</th> 
                    </tr>
                <thead>
                <tbody>";

while($rows = $results->fetch_assoc()){
    ?>
                
                    <tr>   
                        <td><?php echo $rows['date']; ?></td>
                        <td><?php echo $rows['detail']; ?></td>
                        <td><?php echo $rows['gave_amount']; ?></td>
                        <td><?php echo $rows['got_amount']; ?></td>
                        
                        
                        
                    </tr>
                
                <?php
				}
                ?>
                </tbody>   
            </table>
        </div>
    
            


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(function() {
        $('#example').DataTable();
        $('#exam').DataTable();
    });
</script>
<button onclick="goBack()">Go Back</button>
<script>
function goBack() {
  window.history.back();
}
</script>