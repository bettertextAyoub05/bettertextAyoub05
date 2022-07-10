<?php require_once('./admin_includes/header.php') ;?>
<body>

    <div id="wrapper">
<?php require_once('./admin_includes/nav.php') ;?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Rubik:ital,wght@1,300&display=swap" rel="stylesheet">


<style>
    .nompro
    {
        font-family: 'Montserrat', sans-serif;
    }
</style>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="nompro">
                        <h1 class="page-header">
                            Administrateur
                            <small>
                            <?php
                                if(isset($_SESSION['db_user_name']))
                                {
                                    echo $_SESSION['db_user_name'];
                                }
                            ?>
                            </small>
                        </h1>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

       
                <!-- /.row -->
                
                <div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php
$sql="select * from posts";
$count=mysqli_query($con,$sql);
$num_post=mysqli_num_rows($count);

?>

                  <div class='huge'><?php echo $num_post ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php
$sql="select * from comments";
$count_comments=mysqli_query($con,$sql);
$num_comments=mysqli_num_rows($count_comments);

?>

                     <div class='huge'><?php echo $num_comments ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php
                    $sql="select * from users";
                    $count_users=mysqli_query($con,$sql);
                    $num_users=mysqli_num_rows($count_users);
                        ?>

                    <div class='huge'><?php echo $num_users ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                    $sql="select * from categories";
                    $count_categories=mysqli_query($con,$sql);
                    $num_categories=mysqli_num_rows($count_categories);
                        ?>
                        <div class='huge'><?php echo $num_categories ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
      
</div>
                <!-- /.row -->



   </div>
  
                <?php require_once('./admin_includes/footer.php') ;?>

          