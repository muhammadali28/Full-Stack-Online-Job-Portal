<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>  
</head>
<body>

<?php include('header.php'); ?>
<?php include('connection.php'); ?>

<?php
 if(isset($_GET['jobid'])){
    $delid=$_GET['jobid'];
    echo $delid;
     $sql = "DELETE from jobs where jobid='$delid' ";
     mysqli_query($con,$sql);
    header('Location: viewjobs.php');
    }
?>

<div class="container">
    <div class="single">
        <div class="box_1">
        
            <h3>All Jobs</h3>

            <?php
                $sql= "SELECT jobs.jobid,jobs.name,categories.name as 'catname',jobs.description,jobs.skill,jobs.timing,jobs.salary,jobs.location,jobs.date 
                from jobs 
                INNER JOIN categories ON categories.catid = jobs.catid
                ORDER by jobs.jobid DESC";
                $rs= mysqli_query($con,$sql);
                while($jobdata= mysqli_fetch_array($rs)){
            ?>

            <div class="col-md-4 icon-services">
                <div class="icon">
                    <i class="fa fa-calendar"></i>
                </div>
                <div class="icon-box-body">
                    <h4><b><?= $jobdata['catname'] ?></b></h4>
                    <small><b>Company : </b><?= $jobdata['name'] ?></small>
                    <p><b>Description : </b><?= $jobdata['description'] ?></p>
                    <p><b>Skills : </b><?= $jobdata['skill'] ?></p>
                    <p><b>Timing : </b><?= $jobdata['timing'] ?></p>
                    <p><b>Location : </b><?= $jobdata['location'] ?></p>
                    <br>
                    
                    <div>
                        <a href="singlejob.php?jobid=<?=$jobdata['jobid']?>" class="btn btn-primary"> More Details</a>
                        <a href="apply.php?jobid=<?=$jobdata['jobid']?>" class="btn btn-primary"> Apply Now</a>
                        <?php
                        if($_SESSION['type']==3){
                        ?>    
                            <a href="viewjobs.php?jobid=<?=$jobdata['jobid']?>" class="btn btn-danger"> Delete</a>
                        <?php
                        }
                        ?>
                    </div>   
                    <br>
                    <br>
                </div>
            </div>

            <div class="clearfix"> 
            </div>
            
            <?php 
                }
            ?>

                
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

</body>
</html>