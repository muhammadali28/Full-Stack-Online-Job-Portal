<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    
</head>
<body>

<?php include('header.php') ?>
<?php include('connection.php') ?>

<?php
if(!isset($_SESSION['type'])){
    header('Location: login.php');
}
?>

<?php
     error_reporting(0);
     $proid = $_SESSION['userid'];
     $proname= $_GET['updname'];
    
     
    //delete category
     if(isset($_GET['delname'])){
        $delname = $_GET['delname'];
        echo '$delid';
        $sql1 = "DELETE from `project` where `userid`='$proid' and `name`='$delname'";
        mysqli_query($con,$sql1);
       header('Location: project.php');
     }
?>

    <div class="container">
    
        <div class="row">
            
            <div class="col-md-4">
                <div class="login-content">
                 <form action="project.php" method="post">

                   <!-- for get data from id in view table -->
                   <div class="section-title">
                       <h3>Projects</h3>
                   </div> 
                    <div class="textbox-wrap">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="hidden" name="userid" value="<?= $prodata['userid']?>" >
                            <input type="text" placeholder="enter a name" name="Name" value="<?= $prodata['name']?>"  class="form-control" required="required">
                            <input type="text" placeholder="enter Description" name="Description" value="<?= $prodata['description']?>"  class="form-control" required="required">                            
                        </div>
                    </div>
                    
                   <div class="login-button"> 
                        <input type="submit"  name="addcat" value="Add Project" class="btn btn-primary">
                    </div>
                 </form>
                </div>
            </div>

            <div class="col-md-8">
               
                 <table class="table">
                      
                            <tr>
                                 <th>ID</th>
                                 <th>Name</th>
                                 <th>Desciption</th>
                            </tr>

                            <?php
                            $sql= "SELECT * FROM `project` where userid='$proid'";
                            $rs= mysqli_query($con,$sql);
                            while($data= mysqli_fetch_array($rs)){
                            ?>
                          
                            <tr>
                                <td><?=$data['userid']?></td>
                                <td><?=$data['name']?></td>
                                <td><?=$data['description']?></td>
                                <td>    
                                    <a href="project.php?delname=<?=$data['name']?>" class="btn btn-danger"> Delete</a>
                                </td>
                            </tr>

                           <?php
                            }
                           ?>
                      
                 </table>

            </div>

        </div>

</div>


 <?php include('footer.php'); ?>


</body>
</html>

<?php 
//add category
if(isset($_POST['addcat'])){
    $catname = $_POST['Name'];
    $prodesc = $_POST['Description'];    
    $sql = "insert into project (userid,name,description) values('$proid','$catname','$prodesc')";
   
   // print_r($_POST);
    if(mysqli_query($con,$sql)){
       echo"<script> alert('project inserted') </script>";
       header('Location: project.php'); 
   }else{
    echo"<script> alert('record not inserted') </script>";
   }
}


?>