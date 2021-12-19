<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    
</head>
<body>

<style>
.login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-form-1{
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    color: #333;
}
.login-container form{
    padding: 10%;
}
.btnSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
}
.login-form-1 .btnSubmit{
    font-weight: 600;
    color: #fff;
    background-color: #0062cc;
}


</style>

<?php include('header.php') ?>
<?php include('connection.php') ?>



<div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Register </h3>
                    <form action="register.php" method="post">
                        <div class="form-group">
                            <select  placeholder="Roletype" name="roletype" class="form-control">
                                <option value="2">Job Seeker</option>
                                <option value="1">Employer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Name" name="Name" value=""  class="form-control">
                        </div>    
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Your Password *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" name="addreg" value="Register" />
                        </div>
                    </form>
                </div>
            </div>
        </div>


 <?php include('footer.php'); ?>


</body>
</html>

<?php 
//add category
if(isset($_POST['addreg'])){
    $roletype=$_POST['roletype'];
    $name = $_POST['Name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT into `user` (`name`,`email`,`password`,`rollid`) values('$name','$email','$password','$roletype')";
   
   // print_r($_POST);
    if(mysqli_query($con,$sql)){
       echo"<script> alert('registered succesfully!') </script>";
       header('Location: login.php');
   }else{
    echo"<script> alert('not registered !') </script>";
   }
}


?>