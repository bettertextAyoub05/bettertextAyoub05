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
                            <small>Etudiant</small>
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
                                    case 'add_user':
                                        require_once('admin_includes/add_user.php');
                                    break ;
                                    case 'edit_user':
                                        require_once('admin_includes/edit_user.php');
                                     break ;
                                    default:
                                        require_once('admin_includes/view_all_users.php');
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

          