<table class="table table-stripped">
                            <tr>
                                <td>ID</td>
                                <td>author</td>
                                <td>comment</td>
                                <td>email</td>
                                <td>status</td>
                                <td>response to</td>
                                <td>approve </td>
                                <td>unApprove</td>
                                <td>Date</td>
                                <td colspan="2">Operations</td>

                            </tr>
                            <tr>


                            <?php 
                            $sql = "select * from comments";
                            $comments = mysqli_query($con,$sql);
                            while($row=mysqli_fetch_assoc($comments))
                            
                            {
                                $comment_id=$row['comment_id'];
                                $comment_post_id=$row['comment_post_id'];


                            ?>
                                <td><?php echo $comment_id ?></td>
                                <td><?php echo $row['comment_author']; ?></td>
                                <td><?php echo $row['comment_content']; ?></td>
                                <td><?php echo $row['comment_email']; ?></td>
                                <td><?php echo $row['comment_status']; ?></td>

                                <?php  
                                $query ="select * from posts where post_id = '$comment_post_id'";
                                $result=mysqli_query($con,$query);
                                while($value = mysqli_fetch_assoc($result))
                                {

                                    $post_id = $value['post_id'];
                                    $post_title=$value['post_title'];

                                    ?>

                                <td><a href="../post.php?p_id=<?php echo $post_id?>"><?php echo $post_title ?></a></td>
                                <td><a href="comments.php?approve=<?php echo $comment_id ?>">Approve</a></td>

                                <td><a href="comments.php?unapprove=<?php echo $comment_id ?>">unapprove</a></td>


                                    <?php
                                }


                                 ?>




                                
            <td><?php echo $row['comment_date']; ?></td>
            <td><a href="comments.php?del=<?php echo $comment_post_id ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>


                         
                            </tr>
                             <?php
                                } 


                                    // Delete Comment
            if(isset($_GET['del']))
                                {
                $sql_comment="delete from comments where comment_id ='$comment_id'";
                $comment_query = mysqli_query($con,$sql_comment);
                if($comment_query)
                 {    header("location:comments.php"); }
            }


                  // approve
                  if(isset($_GET['approve']))
                
                  {
                   $cmt_id = $_GET['approve'];
                  $sql_comment="update comments set comment_status='approve' where comment_id='$cmt_id'";
                  $sql_result = mysqli_query($con,$sql_comment);


                          if($sql_result)
                          {
                                  header('location:comments.php');
                          }
  
                  }


                  // unapprove
                  if(isset($_GET['unapprove']))
                
                  {
                   $cmt_id = $_GET['unapprove'];
                  $sql_comment="update comments set comment_status='unapprove' where comment_id='$cmt_id'";
                  $sql_result = mysqli_query($con,$sql_comment);


                          if($sql_result)
                          {
                                  header('location:comments.php');
                          }
  
                  }

                                
                                ?>
                        </table>

