<?php require_once('./admin_includes/header.php') ;?>
<body>

<?php require_once('./admin_includes/nav.php') ;?>



                <?php 
                if(isset($_GET['p_id']))
                {
                    $post_id=$_GET['p_id'];
                    $sql="select * from posts where post_id='$post_id'";
                    $result=mysqli_query($con,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                    $post_id=$row['post_id']; 
                    $post_author=$row['post_author'];
                    $post_title=$row['post_title']; 
                    $post_cat_id=$row['post_cat_id'];
                    $post_status=$row['post_status']; 
                    $img=$row['post_img'];
                    $post_tags=$row['post_tags'];
                    $post_content=$row['post_content'];

                    }
                }
                // update record
                if(isset($_POST['btn_edit_post']))
                {
                 
                    $post_title=$_POST['post_title'];
                     $post_cat_id=$_POST['cat_name'];
                    $post_author=$_POST['post_author'];
                    $post_status=$_POST['post_status'];

                     $image=$_FILES['image']['name'];
                    $post_temp=$_FILES['image']['tmp_name'];
            

                    $post_tags=$_POST['post_tags'];
                     $post_content=$_POST['post_content'];

                        if (empty($image))
                        {
                            $query="select * from posts where post_id='$post_id'";
                            $result=mysqli_query($con,$query);
                             
                            $image=$row['post_img'];
                        }



                     $sql="update posts set post_cat_id='$post_cat_id',post_title='$post_title',post_author='$post_author',post_date=now(),post_img='$image',post_content='$post_content', post_status='$post_status' where post_id='$post_id'";

                     $result=mysqli_query($con,$sql);


                     if($result)
                     {
                         header("location:./posts.php");
                         move_uploaded_file($post_temp,"../imgs/$post_image");
                     }
                }

            ?>





            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col">
                        
            <!-- add Category   -->
            <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                    <label>Post title</label>
                    <input type="text" name="post_title" placeholder="post title" class="form-control mb-4" value="<?php echo $post_title ?>">
                </div>
                <div class="form-group">
                   <select name="cat_name" id="" class="form-control">
                       <?php 

                       $query =  "select * from categories";
                       $data = mysqli_query($con,$query);
                       while ($row = mysqli_fetch_assoc($data)) 
                       {
                           $cat_id=$row['post_cat_id'];
                       ?>

                       <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_title'];?></option>
                       <?php
                        }

                       ?>
                   </select>
                </div> 
                <div class="form-group">
                    <label>post author</label>
                    <input type="text" name="post_author" placeholder="post author" class="form-control mb-4" value="<?php echo $post_author ?>">
                </div> 
                <div class="form-group">
                    <label>post status</label>
                    <!-- <input type="text" name="post_status" placeholder="post status" class="form-control mb-4" value="<?php echo $post_status ?>"> -->
                    <select name="post_status" class="form-control">
                        <option value="draft"><?php echo $post_status ?></option>
                        <?php 
                        
                        if($post_status=="published")
                        {
                     echo "<option value='draft'>Draft</option>";
                        }
                        else
                        {
                            echo "<option value='published'>published</option>";
                        }

                        ?>
                    </select>
                </div> 
                <div class="form-group">
                    <label>Image</label>
                    <img width="100" height="80" class="img-responsive" src="../imgs/<?php echo $img; ?>">
                    <input type="file" name="image" placeholder="image" class="form-control mb-4">
                </div> 
                <div class="form-group">
                    <label>post Tags</label>
                    <input type="text" name="post_tags" placeholder="post tags" class="form-control mb-4" value="<?php echo $post_tags ?>">
                </div> 
                <div class="form-group">
                    <label>post content</label>
                    <textarea name="post_content" id="" class="form-control" cols="30" rows="10"></textarea>
                </div> 
                
                <div class="form-group">
                    <button class="btn btn-success pt-2" type="submit" name="btn_edit_post">edit post</button>
                    </div>

                </form>
                    </div>  

                </div>
                <!-- /.row -->
                </div>
            <!-- /.container-fluid -->

      
                <?php require_once('./admin_includes/footer.php') ;?>

          