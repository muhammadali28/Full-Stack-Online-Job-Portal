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


<div class="container">
    <div class="row">
        <div class="box_1">

            <?php
                $jobid=$_GET['jobid'];

                $sql= "SELECT jobs.jobid,jobs.name,categories.name as 'catname',jobs.description,jobs.skill,jobs.timing,jobs.salary,jobs.location,jobs.date,jobs.nov,jobs.jobstatus 
                from jobs 
                INNER JOIN categories ON categories.catid = jobs.catid
                where jobs.jobid= $jobid";
                $rs= mysqli_query($con,$sql);
                $jobdata= mysqli_fetch_array($rs);

                $_SESSION['jobid']= $jobdata['jobid']; 

            ?>

            <div class="col-sm-12 icon-services">
                <br>
                <br>
                <div class="icon">
                    <i class="fa fa-calendar"></i>
                </div>
                <div class="icon-box-body">
                    <h3><b>Job : <?= $jobdata['catname'] ?></b></h3>
                    <small><b>Company : </b><?= $jobdata['name'] ?></small>
                    <p><b>Description : </b><?= $jobdata['description'] ?></p>
                    <p><b>Skills : </b><?= $jobdata['skill'] ?></p>
                    <p><b>Salary : </b><?= $jobdata['salary'] ?></p>
                    <p><b>Timing : </b><?= $jobdata['timing'] ?></p>
                    <p><b>No Of Vacancies : </b><?= $jobdata['nov'] ?></p>
                    <p><b>Location : </b><?= $jobdata['location'] ?></p>
                    <p><b>Hiring : </b><?= $jobdata['jobstatus'] ?></p>
                    <p><b>Post Date : </b><?= $jobdata['date'] ?></p>
                    <br>
                    <?php
                    
                    if(isset($_SESSION['type'])){
                        if($_SESSION['type'] == 2){
                            echo ' <a href="viewjobs.php" class="btn btn-primary"> Back</a>';
                            echo ' <a href="apply.php" class="btn btn-primary"> Apply Now</a>';
                        }
                    }else{
                        echo ' <a href="login.php" class="btn btn-primary"> Login</a>';
                        echo  ' <a href="register.php" class="btn btn-primary">Register</a>';
                    }
                    ?>   

                    <br>
                    <br>
                </div>
            </div>

            <div class="clearfix"> 
            </div>

        </div>
    </div>
</div>

<?php include('footer.php'); ?>

</body>
</html>