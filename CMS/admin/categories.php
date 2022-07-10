<?php require_once('./admin_includes/header.php') ;?>
<body>

    <div id="wrapper">
<?php require_once('./admin_includes/nav.php') ;?>

   

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Categories</small>
                        </h1>
                    </div>

                   
                    <!-- Add new categories-->
                    <div class="col-lg-6">
                    <?php   
                    if(isset($_POST['btn_category']))
                    {
                  if ($_POST['category'] == "") {

                    echo "<p class='alert alert-danger'>please Enter Category </p>";
                  }else{
                    $add_cat = $_POST['category'];
                    $query="insert into categories(cat_title) values ('$add_cat')";
                    mysqli_query($con,$query);
                    
                  }
                    }
                    
                    
                    ?>

                    <!-- add Category   -->
                <form action="" method="POST">
                    <div class="form-group">
                    <label>Add new category</span>
                    <input type="text" name="category" placeholder="category" class="form-control mb-2">
                </div>
                <div class="form-group">
                    <button class="btn btn-success pt-2" type="submit" name="btn_category">Add Categories</button>
                    </div>

                </form>
                    <!-- edit Category   -->
                    <?php  
                    if (isset($_GET['edit'])) 
                    {
                            $edit_id= $_GET['edit'];
                            $sql = "select * from categories where cat_id='$edit_id'";
                            $result=mysqli_query($con,$sql);
                            $data  =mysqli_fetch_assoc($result);


                      ?>
                    <form action="update.php" method="POST">
                <div class="form-group">
                    <label>modifier categorie</span>
                    <input type="text" name="edit_category" value="<?php echo $data['cat_title'];?>" placeholder="category" class="form-control mb-2">
                    <input type="hidden" name="edit_id" value="<?php echo $data['cat_id']; ?>">
                </div>
                <div class="form-group">
                    <button class="btn btn-success pt-2" type="submit" name="btn_edit_category">Add Categories</button>
                </div>

                </form>

                      <?php  
                    }
                    ?>


                    </div>
             
                <div class="col-lg-6">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width:20%"> Categories ID</th>
                            <th style="width:50%"> Categories name</th>
                            <th style="width:30%" colspan="2"> Operations </th>
                        </tr>
                        <tr>
                        <?php 

                        $sql = "select * from categories";
                        $result=mysqli_query($con,$sql);

                        while ($row = mysqli_fetch_assoc($result))
                         {
                        
                        ?>
                        
                        
                            <td><?php echo $row['cat_id']; ?></td>
                            <td><?php echo $row['cat_title']; ?></td>

                            <td> <a href="categories.php?del=<?php echo $row['cat_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>


                            <td> <a href="categories.php?edit=<?php echo $row['cat_id']; ?>" class="btn btn-success"><span class="fa fa-edit"></span></a></td>
                        </tr>


                        <?php
                        }

                       // Delete the Category record
                        if(isset($_GET['del'])){
                            $del = $_GET['del'];
                            $sql ="delete from categories where cat_id='$del'";
                            $result = mysqli_query($con,$sql);
                            if($result)
                            {
                                header("location: categories.php");
                            }else {
                                echo "Query Filed";
                            }
                        }
                        ?>
                    </table>
                </div>
                             


                </div>
                <!-- /.row -->
                </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
                <?php require_once('./admin_includes/footer.php') ;?>

          