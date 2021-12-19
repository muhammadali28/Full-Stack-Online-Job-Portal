<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    
</head>
<body>

<?php include('header.php') ?>
<?php include('connection.php') ?>

<?php
if(!isset($_SESSION['type'])){
    header('Location: login.php');
}
?>

<div class="container">
    <div class="row">
        <div class="box_1">

            <?php
                $userid=$_SESSION['userid'];

                $sql= "SELECT `userid`, `name`, `email`, `password`, `gender`, `careerlevel`, `experience`, `Degree`, `rollid` 
                FROM `user` 
                WHERE userid=$userid";
                $rs= mysqli_query($con,$sql);
                $userdata= mysqli_fetch_array($rs);

                $_SESSION['userid']= $userdata['userid']; 

            ?>

            <div class="col-sm-12 icon-services">
                <br>
                <br>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <div class="icon-box-body">
                    <h3><b>User No : <?= $userdata['userid'] ?></b></h3>
                    <small><b>Name : </b><?= $userdata['name'] ?></small>
                    <p><b>Email : </b><?= $userdata['email'] ?></p>
                    <p><b>Password : </b><?= $userdata['password'] ?></p>
                    <p><b>Gender : </b><?= $userdata['gender'] ?></p>
                    <p><b>Career Level : </b><?= $userdata['careerlevel'] ?></p>
                    <p><b>Experience : </b><?= $userdata['experience'] ?></p>
                    <p><b>Degree : </b><?= $userdata['Degree'] ?></p>
                    <?php
                    if($userdata['rollid']==2){
                    ?>    
                    <p><b>Roll Type : </b>Job Seeker</p>
                    <?php
                    }elseif($userdata['rollid']==1){
                    ?>
                    <p><b>Roll Type : </b>Employer</p>
                    <?php
                    }
                    ?>
                </div>

                <?php
                if(isset($_SESSION['type'])){
                    if($_SESSION['type'] == 2){
                ?>  
                <br>
                <p><b>Do you wish to add any Project ? </b></p>
                <br>
                <a href="project.php" class="btn btn-info"> Yes</a>
                <a href="" class="btn btn-info"> No</a>


                <?php
                    }
                }    
                ?>   

                    <br>
                    <br>
                
            </div>

            <div class="clearfix"> 
            </div>

        </div>
    </div>
</div>

<?php include('footer.php'); ?>

</body>
</html>

