


<?php require_once "includes/header.php"?>;

    <!-- Navigation -->
    <?php require_once "includes/nav.php"?>;

    <!-- Page Content -->
    <style> 
    
    .title{
font-family: 'Cabin', sans-serif;
font-family: 'Montserrat', sans-serif;
font-family: 'Pacifico', cursive;
font-family: 'Shizuru', cursive;
font-family: 'Work Sans', sans-serif;}

</style>



    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
                <div class="col-md-8">
                <?php  
        
        $query = "select * from posts where post_status='published'";
        $data = mysqli_query($con,$query);
        $post_status="";
        while($row = mysqli_fetch_assoc($data)){

            $post_id = $row['post_id'];            
            $post_Title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_img = $row['post_img'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_status = $row['post_status'];

        
        ?>
              

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><div class="title"><?php echo $post_Title ?></div></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="imgs/<?php echo "$post_img"?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
<?php  

        }
        if ($post_status !== 'published') 
        {
            echo '<div class="alert alert-danger"> post no found </div>';
        }

?>
            </div>

            <?php require_once "includes/side_bar.php"?>;


        <hr>

       <!--footer-->

       <?php require_once "includes/footer.php"?>;


   