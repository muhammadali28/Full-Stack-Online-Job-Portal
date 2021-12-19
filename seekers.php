<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seekers | Jobs Portal</title>
    
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
      if(isset($_GET['id'])){
      $delid=$_GET['id'];
      $sql = "DELETE from user where userid='$delid' ";
      mysqli_query($con,$sql);
      header('Location: seekers.php');
     }
     //    $sql = "DELETE from `user` where `userid`='$delid'";
     //    mysqli_query($con,$sql);
//         header('Location: seekers.php');
//      }
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
                                 <th>Gender</th>
                                 <th>Experience</th>
                                 <th>Career level</th>
                                 <th>Degree</th>
                                 <?php
                                   if($_SESSION['type']==3){
                                   ?>    
                                   <th>Operation</th>
                                   <?php
                                   }
                                 ?>
                                 
                            </tr>
                      </thead>

                      <tbody id="mytable">
                           <?php
                              
                              $sql = "Select * from user where rollid = 2
                              ";
                              $rs = mysqli_query($con,$sql);
                              while($data = mysqli_fetch_array($rs)){
                           ?>
                            
                            <tr>
                                <td><?=$data['userid']?></td>
                                <td><?=$data['name']?></td>
                                <td><?=$data['email']?></td>
                                <td><?=$data['gender']?></td>
                                <td><?=$data['experience']?></td>
                                <td><?=$data['careerlevel']?></td>
                                <td><?=$data['Degree']?></td>
                                <?php
                                   if($_SESSION['type']==3){
                                ?>
                                <td><a href="seekers.php?id=<?=$data['userid']?>" class="btn btn-danger"> Delete</a></td> 
                                <?php
                                   }
                                 ?>
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