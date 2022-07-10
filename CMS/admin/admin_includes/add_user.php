<?php require_once('./admin_includes/header.php') ;?>
<body>

<?php require_once('./admin_includes/nav.php') ;?>
   

<?php 
if (isset($_POST['btn_add_user'])) {

            $first_name=$_POST['first_name'];
            $last_name=$_POST['last_name'];
            $user_role=$_POST['user_role'];
            $user_name=$_POST['user_name'];
            $user_email=$_POST['user_email'];
            $user_password=$_POST['user_password'];


            /*

            $image=$_FILES['image']['name'];
            $post_temp=$_FILES['image']['tmp_name'];
            

            $post_tags=$_POST['post_tags'];
            $post_content=$_POST['post_content'];


*/

            $sql  = "insert into users (user_name,user_password,first_name,last_name,user_email,user_role) values ('$user_name','$user_password','$first_name','$last_name','$user_email','$user_role')";

            $result=mysqli_query($con,$sql);

            if($result)
            {
                echo "Record has been saved ";
                //move_uploaded_file($post_temp,"../imgs/$image");
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
                    <label>first Name</label>
                    <input type="text" name="first_name" placeholder="first Name" class="form-control mb-4">
                </div> 
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" placeholder="Last Name" class="form-control mb-4">
                </div> 
                
                    <select name="user_role" id="" class="form-control">
                        <option name="subscriber">Select User</option>
                        <option name="admin">Admin</option>
                        <option name="subscriber">Subscriber</option>
                    </select>

                <div class="form-group">
                    <label> User Name</label>
                    <input type="text" name="user_name" placeholder="User Name" class="form-control mb-4">
                </div> 
                <div class="form-group">
                    <label>User Email</label>
                    <input type="email" name="user_email" placeholder="User Email" class="form-control mb-4">
                </div> 
                <div class="form-group">
                    <label>User Password</label>
                    <input type="password" name="user_password" placeholder="Password" class="form-control mb-4">
                </div> 
                <div class="form-group">
                    <button class="btn btn-success pt-2" type="submit" name="btn_add_user">Add post</button>
                    </div>

                </form>
                    </div>  

                </div>
                <!-- /.row -->
                </div>
            <!-- /.container-fluid -->

      
                <?php require_once('./admin_includes/footer.php') ;?>

          