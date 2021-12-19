<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Jobs</title>
</head>
<body>
<?php include('header.php')?> 
<?php include('connection.php')?>

<?php
if(isset($_SESSION['type'])!=1){
    header('Location: index.php');
}

echo $userid = $_SESSION['userid'];
?>


<?php
     error_reporting(0);
     $jobid = $_GET['id'];
    echo $jobid;    

     //update category
     $sql = "SELECT * from `jobs`
        where jobs.jobid = $jobid";
     $rs = mysqli_query($con,$sql);
     $jobdata = mysqli_fetch_array($rs);
?>

<div class="container">
    <div class="row">

        <div class="col-lg-12">
            <div class="login-content">
            <br/>
                <form action="updatejob.php?id=<?=$jobdata['jobid']?>" method="post">
                    <div class="section-title">
                       <h3> Update Job</h3>
                    </div> 

                    <div class="textbox-wrap">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="hidden" name="jobid" value="<?= $jobdata['jobid']?>" >
                            <input type="text" placeholder="Enter Company Name" name="Name" value="<?= $jobdata['name']?>"  class="form-control">  
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input placeholder="enter description" name="description" value="<?= $jobdata['description']?>"  class="form-control">  
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" placeholder="enter skill" name="skill" value="<?= $jobdata['skill']?>"  class="form-control">  
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" placeholder="enter salary" name="salary" value="<?= $jobdata['salary']?>"  class="form-control">  
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" placeholder="enter timing" name="timing" value="<?= $jobdata['timing']?>"  class="form-control">  
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="integer" placeholder="No of Vacancies" name="vacancies" value="<?= $jobdata['nov']?>"  class="form-control">  
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input placeholder="enter location" name="location" value="<?= $jobdata['location']?>" class="form-control">  
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <select name="catid" placeholder="Job" class="form-control">
                            <?php

                              $sql1 = "SELECT * FROM `categories` WHERE catstatus='active'";
                              $data = mysqli_query($con,$sql1);
                              if(mysqli_num_rows( $data) > 0){
                                    while($rs=mysqli_fetch_array($data)){
                                         ?><option value="<?=$rs['catid']?>"><?= $rs['name']?></option><?php
                                    }
                              }else{
                                   ?><option>No category found</option><?php
                              }

                            ?>                    
                            </select>  
                        </div>
                         <br/>     
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <select name="jobstatus" placeholder="<?= $jobdata['jobstatus']?>" class="form-control">
                            <option value="Open">Open</option>
                            <option value="Close">Close</option>
                                                
                            </select>  
                        </div>
                        
                    </div>
                    
                    <div class="login-button"> 
                        <input type="submit"  name="updatejobs" value="Update Job" class="btn btn-primary">
                    </div>

                    <?php
                    
                    ?>
                </form>
                <br/>
            </div>    
        </div>
        
    </div>
</div>

<?php

if(isset($_POST['updatejobs'])){
    
    $name = $_POST['Name'];
    $desc = $_POST['description'];
    $skill = $_POST['skill'];
    $salary = $_POST['salary'];
    $timing = $_POST['timing'];
    $location = $_POST['location'];
    $nov= $_POST['vacancies'];
    $jobstatus=$_POST['jobstatus'];
         $catid=$_POST['catid'];       
    $jobid=$_POST['jobid'];

    $sql="UPDATE `jobs` SET `name`='$name',`description`='$desc',`skill`='$skill',`timing`='$timing',`salary`='$salary',`timing`='$timing',`location`='$location',`catid`='$catid',`nov`='$nov',`jobstatus`='$jobstatus' WHERE `jobid`='$jobid'";
    if(mysqli_query($con,$sql)){
       echo"<script> alert('Job updated') </script>";
       header('Location: myjobs.php');
    }else{
     echo"<script> alert('Job not updated') </script>";
    }
}
?>


<?php include('footer.php') ?>


</body>
</html>

