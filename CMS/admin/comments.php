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
                            <small>Comment</small>
                        </h1>

                        <?php 
                        
                                if (isset($_GET['opt']))
                                {
                                    $opt = $_GET['opt'];
                                }
                                else
                                {
                                    $opt='';
                                }
                                switch($opt)
                                {
                                    case 'add_post':
                                        require_once('admin_includes/add_post.php');
                                    break ;
                                    case 'edit_post':
                                        require_once('admin_includes/edit_post.php');
                                     break ;
                                    default:
                                        require_once('admin_includes/view_all_comments.php');
                                    break ;
                                }
                        ?>
                        
       
                    </div>  

                </div>
                <!-- /.row -->
                </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
                <?php require_once('./admin_includes/footer.php') ;?>

          
                