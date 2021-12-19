<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employers | Jobs Portal</title>
    
</head>
<body>

<?php 
    
    include('header.php'); 
    include('connection.php');

    if(!isset( $_SESSION['userid'] ) ){
        header('Location: login.php');
    } 
      
     $userid = $_SESSION['userid'];

?>

<?php
     error_reporting(0);

    //delete category

     if(isset($_GET['delid'])){ 
        $delid = $_GET['delid'];
        echo $delid;
        $sql = "DELETE from `user` where userid='$delid'";
        mysqli_query($con,$sql);
        header('Location: employers.php');
     }
?> 

<div class="container">
    


      <div class="single">
     

            <div class="col-md-12">
                 <div class="form-group">
                 <input type="text" id="myinput" placeholder="search ......" class="form-control">
                 </div>
               
                 <table class="table">
                      <thead>
                            <tr>
                                 <th>ID</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Operation</th>
                            </tr>
                      </thead>

                      <tbody id="mytable">
                           <?php
                              
                              $sql = "Select * from user where rollid = 1
                              ";
                              $rs = mysqli_query($con,$sql);
                              while($data = mysqli_fetch_array($rs)){
                           ?>
                            
                            <tr>
                                <td><?=$data['userid']?></td>
                                <td><?=$data['name']?></td>
                                <td><?=$data['email']?></td>
                                <td><a href="employers.php?delid=<?=$data['userid'];?>" class="btn btn-danger"> Delete</a></td> 
                            </tr>
                                   
                           <?php
                              }
                            ?>
                      </tbody>
                 </table>

            </div>

      </div>
 


</div>

<script>
$(document).ready(function(){
  $("#myinput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#mytable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

</script>

<br><br>
 <?php include('footer.php'); ?>


</body>
</html