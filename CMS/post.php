


<?php require_once "includes/header.php"?>;

<!-- Navigation -->
<?php require_once "includes/nav.php"?>;

<!-- Page Content -->
<div class="container">
 
    <div class="row">

        <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php 
            
            
            if(isset($_GET['p_id']))
             {
                $p_id = $_GET['p_id'];
            }
    
    $query = "select * from posts where post_id='$p_id'";
    $data = mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($data)){

        $post_id = $row['post_id'];            
        $post_Title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_img = $row['post_img'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];

    
    ?>
           

            <!-- First Blog Post -->
            <h2>
                <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_Title ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
            <hr>
            <img class="img-responsive" src="imgs/<?php echo "$post_img"?>" alt="">
            <hr>
            <p><?php echo $post_content; ?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>




<?php  

    }


    if(isset($_POST['btn_submit']))
    {
             $p_id = $_GET['p_id'];
            $author=$_POST['author'];
            $email=$_POST['email'];
            $comment=$_POST['comment'];
             $sql="insert into comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) values('$p_id','$author','$email','$comment','approve',now())";
             $data = mysqli_query($con,$sql);
             if($data)
             {
                 echo '<div class="alert alert-success">your comment has been submitted </div>';
             }
             else
             {
                 echo '<div class="alert alert-danger">something went wrong  </div>';

             }

             $update_comment_coun ="update posts set post_comment_coun = post_comment_coun + 1 where post_id='$p_id'";
             mysqli_query($con,$update_comment_coun);
    }
?>



<!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" placeholder="Author" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="email">email</label>
                            <input type="email" name="email" placeholder="email" class="form-control">
                        </div>


                        <div class="form-group">
                        <label for="comment">comment</label>

                            <textarea class="form-control" rows="3" placeholder="comment" name="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="btn_submit">Submit</button>
                    </form>
                </div>

                <hr>
    <?php 


$comment_query = "select * from comments where comment_post_id='$p_id' AND comment_status ='approve' order by comment_id DESC";
$comment_result = mysqli_query($con,$comment_query);


            while($data = mysqli_fetch_assoc($comment_result))
            {

                $comment_author = $data['comment_author'];
                $comment_date = $data['comment_date'];
                $comment_content = $data['comment_content'];

                    ?>
       
                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">   
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?> 
                            <small><?php echo $comment_date ?></small>
                        </h4>
                       <?php echo $comment_content; ?>
                    </div>
                </div>
      <?php  
      
            }

               
              
      ?>
             
        </div>
<!-- Side Bar -->
        <?php require_once "includes/side_bar.php"?>;


    <hr>

   <!--footer-->

   <?php require_once "includes/footer.php"?>;


