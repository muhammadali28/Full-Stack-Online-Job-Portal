<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    
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
     $catid = $_GET['catid'];
    
     //update category
     $sql = "SELECT * from `categories` where `catid`='$catid'";
     $rs = mysqli_query($con,$sql);
     $catdata = mysqli_fetch_array($rs);

    //delete category
     if(isset($_GET['delid'])){
        $delid = $_GET['delid'];
        echo '$delid';
        $sql1 = "DELETE from `categories` where catid='$delid'";
        mysqli_query($con,$sql1);
       header('Location: categories.php');
     }
?>

    <div class="container">
    
        <div class="row">
            
            <div class="col-md-4">
                <div class="login-content">
                 <form action="categories.php" method="post">

                   <!-- for get data from id in view table -->
                   <div class="section-title">
                       <h3>Categories</h3>
                   </div> 
                    <div class="textbox-wrap">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="hidden" name="cid" value="<?= $catdata['catid']?>" >
                            <input type="text" placeholder="enter a name" name="Name" value="<?= $catdata['name']?>"  class="form-control" required="required">
                            
                            <?php
                                if($_SESSION['type']==3){
                            ?>
                            <SELECT type="text" placeholder="Status" name="catstatus" class="form-control">
                            <option value="pending">Pending</option>
                            <option value="active">Active</option>
                            <option value="rejected">Rejected</option>
                            </SELECT>
                            <?php
                                }
                            ?>    
                            
                        </div>
                    </div>
                    
                   <div class="login-button"> 
                        <input type="submit"  name="addcat" value="Add Category" class="btn btn-primary">
                        <?php
                        if($_SESSION['type']==3){
                        ?>    
                            <input type="submit"  name="updatecat" value="Update Category" class="btn btn-info">
                        <?php
                        }
                        ?>
                    </div>
                 </form>
                </div>
            </div>

            <div class="col-md-8">
               
                 <table class="table">
                      
                            <tr>
                                 <th>ID</th>
                                 <th>Name</th>
                                 <th>Status</th>
                            </tr>

                            <?php
                            $sql= "SELECT * FROM `categories`";
                            $rs= mysqli_query($con,$sql);
                            while($data= mysqli_fetch_array($rs)){
                            ?>
                          
                            <tr>
                                <td><?=$data['catid']?></td>
                                <td><?=$data['name']?></td>
                                <td><?=$data['catstatus']?></td>
                                <td>
                                <?php
                                if($_SESSION['type']==3){
                                ?>    
                                    <a href="categories.php?catid=<?=$data['catid']?>" class="btn btn-info"> Edit</a>
                                    <a href="categories.php?delid=<?=$data['catid']?>" class="btn btn-danger"> Delete</a>
                                <?php
                                }
                                ?>
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
    $sql = "insert into categories (name,catstatus) values('$catname','pending')";
   
   // print_r($_POST);
    if(mysqli_query($con,$sql)){
       echo"<script> alert('record inserted') </script>";
       header('Location: categories.php'); 
   }else{
    echo"<script> alert('record not inserted') </script>";
   }
}

//update category
if(isset($_POST['updatecat']))
           {

                $cid = $_POST['cid'];
                $catname = $_POST['Name'];
                $catstatus = $_POST['catstatus'];
                $sql = "UPDATE `categories` SET `name`='$catname',`catstatus`='$catstatus' WHERE `catid`='$cid'";
                if(mysqli_query($con,$sql)){
                    echo "<script>alert('Update Category Successfully')</script>";
                    header('Location: categories.php');
                }else{
                    echo "<script>alert('Not Updated')</script>";
                }

           }

?>