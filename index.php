<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page | Seeking Job Portal</title>  
</head>
<body>
<?php include('header.php'); ?>
<?php include('connection.php'); ?>



<style>

/* main */
#home {
    padding: 0;
  }

  #home h1 {
    color: #ffffff;
  }

  #home h3 {
    color: #f9f9f9;
    font-size: 16px;
    font-weight: 300;
    margin: 0;
    padding: 5px 0 40px 0;
  }

  @media (min-width: 768px) {
    .home-slider .col-md-6 {
      padding-left: 0;
    }
  }

  .home-slider .caption {
    display: flex;
    justify-content: center;
    flex-direction: column;
    text-align: left;
    /* background-color: rgba(20,20,20,0.2); */
    background-image: url("images/main.jpg");
    height: 100%;
    background-repeat: no-repeat;
    background-size: auto;
    color: #ffffff;
    cursor: e-resize;
  }

  .home-slider .item {
    background-repeat: no-repeat;
    background-attachment: local;
    background-size: cover;
    height: 650px;
    background-image: url("../images/main.jpg");
	background-position: center;
  }
  
  .caption h3 a { color: #FFF; }
  .caption h3 a:hover { color: #FF3; }

  .home-slider .item-first {
    
  }
  }

/* jobs */
  #courses .section-title {
    text-align: center;
  }

  #courses .owl-theme .owl-nav {
    margin-top: 30px;
  }

  #courses .owl-theme .owl-nav [class*=owl-] {
    border-radius: 2px;
    font-size: 16px;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    padding: 0;
  }

  .courses-thumb {
    background: #f9f9f9;
    position: relative;
  }

  .courses-thumb-secondary {
    margin-bottom: 30px;
  }

.form .form-control,
  .modal .form-control { background-color: #eee;  }

  .courses-top {
    position: relative;
  }

  .courses-image {
    background: linear-gradient(to right, #202020, #101010);
  }

  .courses-date {
    background: linear-gradient(rgba(255, 0, 0, 0), rgba(0, 0, 0, 0.6));
    width: 100%;
    position: absolute;
    bottom: 0;
    padding: 20px 25px;
  }

  .courses-date span,
  .courses-author span {
    font-size: 14px;
    font-weight: bold;
  }

  .courses-date span {
    color: #ffffff;
    display: inline-block;
    margin-right: 10px;
  }

  .courses-detail {
    padding: 25px 25px 15px 25px;
  }

  .courses-detail h3 {
    margin: 0 0 2px 0;
  }

  .courses-info {
    border-top: 1px solid #f0f0f0;
    position: relative;
    clear: both;
    padding: 15px 25px;
  }

  .courses-author,
  .courses-author span {
    display: inline-block;
    vertical-align: middle;
  }

  .courses-author img {
    display: inline-block !important;
    border-radius: 50px;
    width: 50px !important;
    height: 50px;
    margin-right: 10px;
  }

  .courses-price {
    float: right;
    margin-top: 10px;
  }

  .courses-price span {
    background: #29ca8e;
    border-radius: 2px;
    color: #ffffff;
    display: block;
    padding: 5px 10px;
  }

  .courses-price.free span {
    background: #3f51b5;
  }

</style>


<section id="home">
    <div class="row">
        <div class="home-slider">
            <div class="item">
                <div class="caption">
                    <div class="container">
                        <div class="col-md-6 col-sm-12">
                            <h1>Welcome <?php echo $_SESSION['name'];?> to Seeking,</h1>
                            <h2>One stop solution for all your problems!</h2>
                            <a href="viewjobs.php" class="section-btn btn btn-default">Browse Jobs</a>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
         <div class="single">
            
            <div class="col-md-12 col-sm-12">
                <div class="section-title text-center">
                    <h2>Latest Jobs</h2>
                </div>
            </div>

            <?php
                $sql= "SELECT jobs.jobid,jobs.name,categories.name as 'catname',jobs.description,jobs.skill,jobs.timing,jobs.salary,jobs.location,jobs.date 
                from jobs 
                INNER JOIN categories ON categories.catid = jobs.catid
                ORDER by jobs.jobid DESC LIMIT 3";
                $rs= mysqli_query($con,$sql);
                while($jobdata= mysqli_fetch_array($rs)){
            ?>

            <div class="col-md-4 col-sm-4">
                <div class="courses-thumb courses-thumb-secondary">
                    <div class="courses-top">
                        <div class="courses-image">
                                <img style="height: 30%; width:100%" src="images/c1.gif"  alt="">
                        </div>
                        <div class="courses-date">
                                <span title="Posted on"><i class="fa fa-calendar"></i> <?= $jobdata['date'] ?></span>
                                <span title="Location"><i class="fa fa-map-marker"></i><?= $jobdata['location'] ?></span>
                                <span title="Type"><i class="fa fa-file"></i><?= $jobdata['timing'] ?></span>
                        </div>
                    </div>

                    <div class="courses-detail">
                        <h3><a href="singlejob.php?jobid=<?=$jobdata['jobid']?>"><?= $jobdata['catname'] ?></a></h3>

                        <p class="lead"><strong>Rs: <?= $jobdata['salary'] ?></strong></p>

                        <p><strong><?= $jobdata['name'] ?></strong></p>
                    </div>
                    
                    <div class="courses-info">
                    <?php
                    if(!isset($_SESSION['type'])){

                        echo ' <a href="login.php" class="btn btn-primary"> Login</a>';
                        echo  ' <a href="register.php" class="btn btn-primary">Register</a>';
                    
                    }
                    ?>
                    <a href="singlejob.php?jobid=<?=$jobdata['jobid']?>" class="section-btn btn btn-primary btn-block">View Details</a>
                    <br>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
            <br>
            <br>
                    
            <div class="clearfix"> 
            </div>
            
            <?php 
                }
            ?>

            

            <div class="clearfix"> 
            </div>
            
            

            <a href="viewjobs.php" class="btn btn-primary"> View More</a>                                        
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

</body>
</html>