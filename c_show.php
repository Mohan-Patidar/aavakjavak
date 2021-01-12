<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="./assets/css/global.css">
<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
<link rel="stylesheet" href="./assets/css/data-table.css">
<link rel="stylesheet" href="./assets/css/data-table-css.css">


<?php
  include ('header.php');
?>
<div class="container">
<?php
$uid = $_SESSION['id'];
$id = $_GET['id'];
$sql = "Select * from customers  WHERE id='" . $_GET['id'] . "'";
$result = mysqli_query($conn, $sql);
$query= "SELECT * FROM `customer_detail` WHERE customer_id= $id";
$results = mysqli_query($conn, $query);

?>
   <?php  
      
     $row = mysqli_fetch_assoc($result);
      $a = $row['name'];
        $b = $row['lname'];
        $n=$a[0];
        $l= $b[0];  
      ?>

      

<div class="mt-4">
    <div class="bg-white ">
      <div class="d-flex align-items-center justify-content-between box-padding">
        <div class="d-flex align-items-center">
          <div class="name-icon">
            <h3><?php  echo $n.''.$l ;?></h3>
          </div>
          <div>
            <p class="user-name">
              <?php  echo $row['name'].' '. $row['lname'] ;?>
            </p>
            <p class="user-no">
            <?php echo $row['phone'];?>
            </p>
          </div>
        </div>
        <div>
          <p class="user-name text-right">
            total balance
          </p>
          <div>
            <span class="f-color">&#8377 <?php echo $row['price'] ?></span>
            <span class="m-0" style="color: #4D4D57;">You will give</span>
          </div>
        </div>
      </div>
      <div class="b-bottom"></div>
      <div class="box-padding">
        <?php
        
          echo '<table  class="display" style="width:100%">
          <thead>
              <tr>
                  <th>Entries</th>
                  <th>Details</th>
                  <th>Attachments</th>
                  <th>you gave </th>
                  <th>you got</th> 
              </tr>
          </thead>';
          $count = 0;


          // $rows = mysqli_fetch_assoc($results);

          
        ?>

        <tbody>
       <?php while($rows = $results->fetch_assoc()){
                    ?>
                    
            <tr>
              <td><?php echo $rows['date']; ?> </td>
              <td class="text-capitalize"><?php echo $rows['detail']; ?> </td>
              <td ></td>
              <td class="you-gave">&#8377 <?php echo $rows['gave_amount']; ?></td>
              <td class="you-got">&#8377 <?php echo $rows['got_amount']; ?></td>
              
              <td>
                
              </td>
        </tbody>
        <?php
       }
          echo "</table>";
        ?>
        <ul class="gave-got-button">
          <li>
            <button  data-toggle="modal" data-target="#mModal<?php echo $count; ?>">You Got</button>
            
          </li>
          <div class="modal" id="mModal<?php echo $count; ?>">
              <div class="modal-dialog">
                <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">You Got &#8377 <?php  echo $row['name'];?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>  
                  <!-- Modal body -->
                  <div class="modal-body">
                    <input type="hidden" id="old_price" value="<?php echo $row['price'] ?>" >
                    <input type="hidden" id="id" value="<?php echo $row['id'] ?>" >
                    <form action="javascript:void(0)" method="Post" class="text-left" >
                      <label>Enter Amount</label>
                      <input type="number" name="sprice" id="sprice" class="add" autocomplete="off" required>
                      <div style="display: none;" class="pop">
                        <label>Enter Details</label>
                        <input type="text" name="sdetail" id="sdetail" required>
                        <label>When did you got?</label>
                        <input type="date" name="date" id="sdate" required>
                        <input type="submit" id="sub" class="open pop-submit-button" value="Got" />
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <li>
            <button  data-toggle="modal" data-target="#myModal<?php echo $count; ?>">You Gave</button>
            
          </li>
          <div class="modal" id="myModal<?php echo $count; ?>">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">You Gave &#8377 <?php  echo $row['name'];?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                  <input type="hidden" id="old_price" value="<?php echo $row['price'] ?>" >
                  <input type="hidden" id="id" value="<?php echo $row['id'] ?>" >
                
                  <form action="javascript:void(0)" method="Post" class="text-left" >
                    <label>Enter Amount</label>
                    <input type="number" name="price" id="price" class="add" autocomplete="off" required>
                    <div style="display: none;" class="pop">
                        <label>Enter Details</label>
                        <input type="text" name="detail" id="detail" autocomplete="off" required>
                        <label>When did you give?</label>
                        <input type="date" name="date" id="date" required>
                        <!-- <input accept="image/x-png,image/jpeg,image/png" type="file" autocomplete="off"> -->
                        <input type="submit" id="send" class="open pop-submit-button" value="Gave" />
                    </div>
                  </form>
                  
                  </div>
                </div>
              </div>
            </div>
        </ul>
      </div>
      


       
    

</div>
<!-- scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script>

$(function (){    
  $("#send").on('click',function (e) {
    e.preventDefault();
    $new =$('#price').val();
    $old = $('#old_price').val();
    $id = $('#id').val();
    $detail =$('#detail').val();
    $date = $('#date').val();
    $.ajax({
      type: "POST", 
      url: "addprice.php",
      data: {'price':$new,
            'old_price':$old,
                'id':$id,
             'detail':$detail,
             'date':$date},
      success:function(){
        location.reload();
        
       
      }
    });
    });

    $("#sub").on('click',function (e) {
    e.preventDefault();
    $new =$('#sprice').val();
    $old = $('#old_price').val();
    $id = $('#id').val();
    $sdetail =$('#sdetail').val();
    $date = $('#sdate').val();
    $.ajax({
      type: "POST", 
      url: "subprice.php",
      data: {'sprice':$new,
            'old_price':$old,
                'id':$id,
             'sdetail':$sdetail,
             'sdate':$date},
      success:function(){
        location.reload();
      }
    });
    });
    })


   
    $('.add').keyup(function(){
      $('.pop').css('display','block');
    });

    
    function goBack() {
    window.history.back();
  }

</script>
