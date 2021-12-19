<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


</head>
<!------ Include the above in your HEAD tag ---------->
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

<body>
<?php include('header.php') ?>    

<?php include('connection.php') ?>    



<div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Login </h3>
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Your Password *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" name="login" value="Login" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>

<?php 
//add category

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * from `user` where `email`= '$email' AND `password` ='$password'";
    $rs= mysqli_query($con,$sql);
   // print_r($_POST);
    if(mysqli_num_rows($rs)>0){
        $data= mysqli_fetch_array($rs);

        $roletype=$data['rollid'];
        $userid=$data['userid'];
        $username=$data['name'];
        
        $_SESSION['type']=$roletype;
        $_SESSION['userid']=$userid;
        $_SESSION['name']=$username;

        if($roletype == 1){
            echo"<script> alert('admin login succesfully !') </script>";        
            header('Location: index.php');
        }
        else if($roletype == 2){
            echo"<script> alert('user login succesfully !') </script>";        
            header('Location: index.php');
        }
        else if($roletype == 3){
            echo"<script> alert('admin login succesfully !') </script>";        
            header('Location: index.php');
        }

   }else{
    echo"<script> alert('email or password is wrong !') </script>";
   }
}

//update category
if(isset($_POST['updatecat']))
           {

                $cid = $_POST['cid'];
                $catname = $_POST['Name'];
                $sql = "UPDATE `categories` SET `name`='$catname' WHERE `catid`='$cid'";
                if(mysqli_query($con,$sql)){
                    echo "<script>alert('Update Category Successfully')</script>";
                }else{
                    echo "<script>alert('Not Updated')</script>";
                }

           }

?>