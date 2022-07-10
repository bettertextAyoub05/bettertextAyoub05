<?php require_once('./admin_includes/header.php') ;?>
<body>

<?php require_once('./admin_includes/nav.php') ;?>
   

<?php 
if (isset($_POST['btn_add_post'])) {

            $post_title=$_POST['post_title'];
            $post_cat_id=$_POST['cat_name'];
            $post_author=$_POST['post_author'];
            $post_status=$_POST['post_status'];

            $image=$_FILES['image']['name'];
            $post_temp=$_FILES['image']['tmp_name'];
            

            $post_tags=$_POST['post_tags'];
            $post_content=$_POST['post_content'];

            $sql  ="insert into posts (post_cat_id,post_title,post_author,post_date,post_img,post_content,post_tags,post_status) values ('$post_cat_id','$post_title','$post_author',now(),'$image','$post_content','$post_tags','$post_status')";
            $result=mysqli_query($con,$sql);

            if($result)
            {
                echo "Record has been saved ";
                move_uploaded_file($post_temp,"../imgs/$image");
            }
            else
            {   
                echo "query failed";
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
                    <input type="text" name="post_title" placeholder="post title" class="form-control mb-4">
                </div>


                <select name="cat_name" id="" class="form-control">
               <?php
                    $sql = "select * from categories ";
                    $value=mysqli_query($con,$sql);
                    while ($row=mysqli_fetch_assoc($value))
                    {
                        $cat_id=$row['cat_id'];
                        $cat_title=$row['cat_title'];
                ?>

                        <option value="<?php echo $cat_id?>"><?php echo $cat_title?></option>
                <?php
                    }

                ?>
                </select>
                <div class="form-group">
                    <label>post author</label>
                    <input type="text" name="post_author" placeholder="post author" class="form-control mb-4">
                </div> 
                <div class="form-group">
                    <label>post status</label>
                    <input type="text" name="post_status" placeholder="post status" class="form-control mb-4">
                </div> 
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" placeholder="image" class="form-control mb-4">
                </div> 
                <div class="form-group">
                    <label>post Tags</label>
                    <input type="text" name="post_tags" placeholder="post tags" class="form-control mb-4">
                </div> 
                <div class="form-group">
                    <label>post content</label>
                    <textarea name="post_content" id="" class="form-control" cols="30" rows="10"></textarea>
                </div> 
                
                <div class="form-group">
                    <button class="btn btn-success pt-2" type="submit" name="btn_add_post">Add post</button>
                    </div>

                </form>
                    </div>  

                </div>
                <!-- /.row -->
                </div>
            <!-- /.container-fluid -->

      
                <?php require_once('./admin_includes/footer.php') ;?>

          