<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Jobs</title>
</head>
<body>
<?php include('header.php')?> 
<?php include('connection.php')?>

<?php
if(isset($_SESSION['type'])!=1){
    header('Location: index.php');
}

$userid = $_SESSION['userid'];
?>

<div class="container">
    <div class="row">

        <div class="col-lg-12">
            <div class="login-content">
            <br/>
                <form action="jobs.php" method="post">
                    <div class="section-title">
                       <h3> Add Jobs</h3>
                    </div> 

                    <div class="textbox-wrap">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="hidden" name="userid" value="<?=$userid?>" >
                            <input type="text" placeholder="Enter Company Name" name="Name" value=""  class="form-control" required="required">  
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <textarea  placeholder="enter description" name="description" id=""  class="form-control" required="required"></textarea>  
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" placeholder="enter skill" name="skill" value=""  class="form-control" required="required">  
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="integer" placeholder="enter salary in rupees" name="salary" value=""  class="form-control" required="required">  
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" placeholder="enter timing" name="timing" value=""  class="form-control" required="required">  
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="integer" placeholder="No of Vacancies" name="vacancies" value=""  class="form-control" required="required">  
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input placeholder="enter location" name="location" value=""  class="form-control" required="required">  
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <select name="catid"  class="form-control" placeholder="Select Categories" required="required">
                            <?php
                              $sql = "SELECT * FROM `categories` WHERE catstatus='active'";
                              $data = mysqli_query($con,$sql);
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
                         <br>
                         <br>     
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <select name="jobstatus" placeholder="Job Status" class="form-control">
                            <option value="open">Open</option>
                            <option value="close">Close</option>
                                                
                            </select>  
                        </div>
                        
                    </div>
                    
                    <div class="login-button"> 
                        <input type="submit"  name="addjob" value="Add Job" class="btn btn-primary">
                    </div>
                </form>
                <br/>
            </div>    
        </div>

        <div class="col-md-12">
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Categories</th>
                    <th>Skill</th>
                    <th>Description</th>
                    <th>Salary</th>
                    <th>Timing</th>
                    <th>Total Vacancies</th>
                    <th>Hiring</th>

                </tr>
                </thead>

                <tbody id="mytable">
                <?php
                    $sql= "SELECT jobs.jobid,jobs.name,categories.name as 'catname',jobs.description,jobs.skill,jobs.timing,jobs.salary,jobs.location,jobs.date,jobs.nov,jobs.jobstatus 
                     from jobs
                        INNER JOIN user ON user.userid = jobs.userid
                        INNER JOIN categories ON categories.catid = jobs.catid
                        where jobs.userid = $userid
                    ORDER by jobs.userid DESC ";
                    $rs= mysqli_query($con,$sql);
                    while($jobdata= mysqli_fetch_array($rs)){
                ?>

                <tr>
                    <td><?= $jobdata['jobid'] ?></td>
                    <td><?= $jobdata['name'] ?></td>
                    <td><?= $jobdata['catname'] ?></td>
                    <td><?= $jobdata['skill'] ?></td>
                    <td><?= $jobdata['description'] ?></td>
                    <td><?= $jobdata['salary'] ?></td>
                    <td><?= $jobdata['timing'] ?></td>
                    <td><?= $jobdata['nov'] ?></td>
                    <td><?= $jobdata['jobstatus'] ?></td>
                </tr>

                <?php
                    }
                ?>
                </tbody>  
            </table>  
        </div>
    </div>
</div>


<?php include('footer.php') ?>

<?php
if(isset($_POST['addjob'])){
    
    $name = $_POST['Name'];
    //   $categories = $_POST['categories'];
    $catid = $_POST['catid'];
    $desc = $_POST['description'];
    $skill = $_POST['skill'];
    $date = date('d/m/y');
    $salary = $_POST['salary'];
    $timing = $_POST['timing'];
    $location = $_POST['location'];
    $userid= $_POST['userid'];
    $nov= $_POST['vacancies'];
    $jobstatus=$_POST['jobstatus'];
    

    $sql="INSERT INTO `jobs`(`name`, `description`, `skill`, `timing`, `date`, `salary`, `location`, `catid`,`userid`,`nov`,`jobstatus`) VALUES ('$name','$desc','$skill','$timing','$date','$salary','$location','$catid','$userid','$nov','$jobstatus')";
    if(mysqli_query($con,$sql)){
        echo"<script> alert('Job inserted') </script>";
        header('Location: myjobs.php');
    }else{
     echo"<script> alert('Job not inserted') </script>";
    }
}
?>
</body>
</html>