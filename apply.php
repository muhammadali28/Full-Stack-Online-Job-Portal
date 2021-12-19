<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>
    
</head>
<body>

<?php include('header.php') ?>
<?php include('connection.php') ?>

<?php

$roll=$_SESSION['type'];

if(!isset($_SESSION['userid'])){
    header('Location: login.php');
}elseif($roll!=2){
    header('Location: index.php');
}

$jobid=$_SESSION['jobid'];
$userid= $_SESSION['userid'];

// echo $userid;
// echo $jobid;
// echo $roll;
?>

<div class="container">
    <div class="row">
        
        <div class="col-md-6">
            <div class="login-content">
                <br>
                 <form action="apply.php" method="post" enctype="multipart/form-data">

                   <!-- for get data from id in view table -->
                   <div class="section-title">
                       <h3>Apply Jobs</h3>
                   </div> 
                    <div class="textbox-wrap">
                        <div class="input-group">
                            
                            <input type="File" name="file" class="form-control"> 
                        </div>
                    </div>
                    
                   <div class="login-button"> 
                        <input type="submit"  name="apply" value="Apply" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php 
//apply job

if(isset($_POST['apply'])){
    
    $jobid=$_SESSION['jobid'];
    $userid= $_SESSION['userid'];
    $date = date('d/m/y');

    $file = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
   
    move_uploaded_file($tmp,"uploads/$file");
    
    $sql="INSERT INTO `application`(`userid`,`jobid`,`cv`,`date`,`appstatus`) VALUES ('$userid','$jobid','$file','$date','pending')";   
    if(mysqli_query($con,$sql)){
        echo "<script> alert('Applied to job succesfully !') </script>";        
        header('Location: appliedjobs.php'); 
    }else{
        echo "<script> alert('Error in applying !') </script>";   
    }
    
         
}
?>



 <?php include('footer.php'); ?>


</body>
</html>

