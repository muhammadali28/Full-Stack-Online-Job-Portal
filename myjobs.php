<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Jobs | Jobs Portal</title>
    
</head>
<body>

<?php 
    
    include('header.php'); 
    include('connection.php');

    if(!isset( $_SESSION['userid'] ) ){
        header('Location: login.php');
    }
    elseif(isset($_SESSION['type'])!=1){
      header('Location: index.php');
    } 
      
     $userid = $_SESSION['userid'];

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
                                 <th>Company</th>
                                 <th>Job</th>
                                 <th>Skill</th>
                                 <th>Date</th>
                                 <th>Salary</th>
                                 <th>Vacancies</th>
                                 <th>Hiring</th>
                                 <th>Operation</th>   
                            </tr>
                      </thead>

                      <tbody id="mytable">
                           <?php
                              
                              $sql = "SELECT jobs.jobid,jobs.name,categories.name as 'catname',jobs.skill,jobs.date,jobs.salary,jobs.nov,jobs.jobstatus
                              from jobs
                              INNER JOIN user ON user.userid = jobs.userid
                              INNER JOIN categories ON categories.catid = jobs.catid
                              where jobs.userid = $userid
                              ";
                              $rs = mysqli_query($con,$sql);
                              while($data = mysqli_fetch_array($rs)){
                           ?>
                            
                            <tr>
                                <td><?=$data['jobid']?></td>
                                <td><?=$data['name']?></td>
                                <td><?=$data['catname']?></td>
                                <td><?=$data['skill']?></td>
                                <td><?=$data['date']?></td>
                                <td><?=$data['salary']?></td>
                                <td><?=$data['nov']?></td>
                                <td><?=$data['jobstatus']?></td>
                                <td><a href="updatejob.php?id=<?=$data['jobid']?>" class="btn btn-info"> Edit</a></td>
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
</html>

