                 <table class="table table-stripped">
                            <tr>
                                <td>ID</td>
                                <td>author</td>
                                <td>title</td>
                                <td>Category</td>
                                <td>status</td>
                                <td>IMG</td>
                                <td>Comment</td>
                                <td>Date</td>
                                <td colspan="2">Operations</td>

                            </tr>
                            <tr>


                            <?php 
                            $query = "select * from posts";
                            $result = mysqli_query($con,$query);
                            while($row=mysqli_fetch_assoc($result))
                            
                            {
                                $cat_id=$row['post_cat_id'];

                            ?>
                                <td><?php echo $row['post_id']; ?></td>
                                <td><?php echo $row['post_author']; ?></td>
                                <td><?php echo $row['post_title']; ?></td>


                                <?php 
                                

                                $query="select * from categories where cat_id='$cat_id'";
                                $data=mysqli_query($con,$query);
                                while($value=mysqli_fetch_assoc($data))
                                {
                                ?>

                                <td><?php echo $value['cat_title']; ?></td>

                                <?php
                                }
                                
                                ?>





                                <td><?php echo $row['post_status']; ?></td>
                                <td><img width="50" height="50" class="img-responsive" src="../imgs/<?php echo $row['post_img']; ?>" alt=""></td>
                                <td><?php echo $row['post_comment_coun']; ?></td>
                                <td><?php echo $row['post_date']; ?></td>
                                <td><a href="posts.php?del=<?php echo $row['post_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
                                <td><a href="posts.php?opt=edit_post&p_id=<?php echo $row['post_id']; ?>" class="btn btn-success"><span class="fa fa-edit"></span></a></td>

                         
                            </tr>
                             <?php
                                } 
                                ?>
                        </table>


                        <?php 
                        if(isset($_GET['del']))
                        {
                            $del_id=$_GET['del'];
                            $sql="delete from posts where post_id='$del_id'"; 
                            $result=mysqli_query($con,$sql);
                            if($result)
                            {
                                unlink("../imgs/$old");
                                header("location:http://localhost/CMS/admin/posts.php");
                            }
                           
                        }
                        
                        ?>