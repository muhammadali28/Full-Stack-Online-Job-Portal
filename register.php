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
                            <input type="text" placeholder="Name" name="Name" value=""  class="form-control" required="required">
                        </div>    
                        
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Your Email *" value="" required="required"/>
                        </div>
                        
                        <div class="form-group">
                            <select  placeholder="Gender" name="gender" class="form-control" required="required">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <select  placeholder="Career level" name="career" class="form-control" required="required">
                                <option value="Entry level">Entry Level</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Medium level">Medium Level</option>
                                <option value="Senior level">Senior Level</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <select  placeholder="Experience" name="experience" class="form-control" required="required">
                                <option value="freshie">Freshie/Intern</option>
                                <option value="1 year">1+ year</option>
                                <option value="2 year">2+ year</option>
                                <option value="3 year">3+ year</option>
                                <option value="4 year">4+ year</option>
                                <option value="5 year">5+ year</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-control" name="degree" placeholder="Degree" value="" required="required"/>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Your Password *" value="" required="required"/>
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
    echo $roletype=$_POST['roletype'];
    echo $name = $_POST['Name'];
    echo $email = $_POST['email'];
    echo $gender = $_POST['gender'];
    echo $career = $_POST['career'];
    echo $experience = $_POST['experience'];
    echo $degree = $_POST['degree'];
    echo $password = $_POST['password'];
    $sql = "INSERT into `user` (`name`,`email`,`password`,`gender`,`careerlevel`,`experience`,`Degree`,`rollid`) values('$name','$email','$password','$gender','$career','$experience','$degree','$roletype')";
    //mysqli_query($con,$sql1);
   // print_r($_POST);
    if(mysqli_query($con,$sql)){
       echo"<script> alert('registered succesfully!') </script>";       
       header('Location: login.php');
   }else{
    echo"<script> alert('not registered !') </script>";
   }
}


?>