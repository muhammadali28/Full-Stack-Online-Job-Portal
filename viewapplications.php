<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applications | Jobs Portal</title>
    
</head>
<body>

<?php 
    
    include('header.php'); 
    include('connection.php');

    if(!isset( $_SESSION['userid'] ) ){
        header('Location: login.php');
    } 
      
echo $userid = $_SESSION['userid'];

echo $appid = $_GET['id'];

  //update category
  $sql = "SELECT * from `application` where `appid`='$appid'";
  $rs = mysqli_query($con,$sql);
  $appdata = mysqli_fetch_array($rs);

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
                                 <th>Job</th>
                                 <th>User</th>
                                 <th>Email</th>
                                 <th>Date</th>
                                 <th>CV</th>
                                 <th>Status</th>
                                 <th>Operation</th>
                                
                            </tr>
                      </thead>

                      <tbody id="mytable">
                           <?php
                              
                              $sql = "SELECT application.appid, categories.name as 'catname',user.name as 'username',user.email, application.date, application.cv,application.appstatus
                              from application
                              INNER join jobs on jobs.jobid = application.jobid
                              INNER join categories on categories.catid = jobs.catid
                              INNER join user on user.userid = application.userid
                              where jobs.userid= $userid;
                              ";

                              $rs = mysqli_query($con,$sql);
                              while($data = mysqli_fetch_array($rs)){
                           ?>
                            
                            <tr>
                                <td><?=$data['appid']?></td>
                                <td><?=$data['catname']?></td>
                                <td><?=$data['username']?></td>
                                <td><?=$data['email']?></td>
                                <td><?=$data['date']?></td>
                                <td><a href="uploads/<?=$data['cv']?>" class="btn btn-warning"target="_blank">Download CV</a></td>
                                <td><?=$data['appstatus']?></td>
                                <?php
                                if(!isset($_GET['id'])){?>
                                <td><a href="viewapplications.php?id=<?=$data['appid']?>" class="btn btn-info"> Edit</a></td>
                                <?php
                                } ?>

                            </tr>
                            <?php
                            }
                            ?>
                      </tbody>
            </table>
        </div>    
  
        
            <?php
            if(isset($appdata['appid'])){
            ?>
            
            <form method="post" action="viewapplications.php">
            <input type="hidden" name="appid" value="<?= $appdata['appid']?>" >
                  <td><SELECT  name="status" class="form-control">
                  <option value="Pending">Pending</option>
                  <option value="Accepted">Accepted</option>
                  <option value="Rejected">Rejected</option>
                  </SELECT></td>
                  <td><input type="submit"  name="updatestatus" value="Update Status" class="btn btn-info"></td>
              </form>
            <?php  
              }
            ?>
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
</html>
<?php
if(isset($_POST['updatestatus']))
{
     $appid = $_POST['appid'];
     $appstatus = $_POST['status'];
     echo $appid;
     echo $appstatus;
     $sql = "UPDATE `application` SET `appstatus`='$appstatus' WHERE `appid`='$appid'";
     if(mysqli_query($con,$sql)){
         echo "<script>alert('Update Status Successfully')</script>";
         header('Location: viewapplications.php');
     }else{
         echo "<script>alert('Not Updated')</script>";
     }

}
?>