<?php require_once('./admin_includes/header.php') ;?>
<body>

    <div id="wrapper">
<?php require_once('./admin_includes/nav.php') ;?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Rubik:ital,wght@1,300&display=swap" rel="stylesheet">


<style>
    .nompro
    {
        font-family: 'Montserrat', sans-serif;
    }
</style>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="nompro">
                        <h1 class="page-header">
                            Administrateur
                            <small>
                            <?php
                                if(isset($_SESSION['db_user_name']))
                                {
                                    echo $_SESSION['db_user_name'];
                                }
                            ?>
                            </small>
                        </h1>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

       
                <!-- /.row -->
                
        
                    <?php
                    $sql="select * from posts";
                    $count=mysqli_query($con,$sql);
                    $num_post=mysqli_num_rows($count);

                    ?>



                                    <?php
                $sql="select * from comments";
                $count_comments=mysqli_query($con,$sql);
                $num_comments=mysqli_num_rows($count_comments);

                ?>

                    
                    <?php
                    $sql="select * from users";
                    $count_users=mysqli_query($con,$sql);
                    $num_users=mysqli_num_rows($count_users);
                        ?>

                    
                    <?php
                    $sql="select * from categories";
                    $count_categories=mysqli_query($con,$sql);
                    $num_categories=mysqli_num_rows($count_categories);
                        ?>
                 
              
                <!-- /.row -->
                <div class="row">
                    <div class="col">
                        <div class="container">
                        <script type="text/javascript">
                          google.charts.load('current', {'packages':['corechart', 'bar']});
                          google.charts.setOnLoadCallback(drawStuff);
                    
                          function drawStuff() {
                    
                            var button = document.getElementById('change-chart');
                            var chartDiv = document.getElementById('chart_div');
                    
                            var data = google.visualization.arrayToDataTable([
                              ['data', 'count'],
                                    <?php  
                                    
                                    $static_data =['posts','comments','Users','categories'];
                                    $dynamic_data=[$num_post,$num_comments,$num_users,$num_categories];
                    
                                    for($i=0 ;$i<4;$i++)
                                    {
                                        echo "['{$static_data[$i]}'".","."{$dynamic_data[$i]}],";
                                    }
                                    ?>
                    
                    
                    
                    
                             // ['posts',20]
                            ]);
                    
                            var materialOptions = {
                              width: 900,
                              chart: {
                                title: '',
                                subtitle: ''
                              },
                              series: {
                                0: { axis: 'Count' }, // Bind series 0 to an axis named 'distance'.
                                1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
                              },
                              axes: {
                                y: {
                                  distance: {label: 'parsecs'}, // Left y-axis.
                                  brightness: {side: 'right', label: 'apparent magnitude'} // Right y-axis.
                                }
                              }
                            };
                    
                            var classicOptions = {
                              width: 900,
                              series: {
                                0: {targetAxisIndex: 0},
                                1: {targetAxisIndex: 1}
                              },
                              title: 'Nearby galaxies - distance on the left, brightness on the right',
                              vAxes: {
                                // Adds titles to each axis.
                                0: {title: 'parsecs'},
                                1: {title: 'apparent magnitude'}
                              }
                            };
                    
                            function drawMaterialChart() {
                              var materialChart = new google.charts.Bar(chartDiv);
                              materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
                              button.innerText = 'Change to Classic';
                              button.onclick = drawClassicChart;
                            }
                    
                            function drawClassicChart() {
                              var classicChart = new google.visualization.ColumnChart(chartDiv);
                              classicChart.draw(data, classicOptions);
                              button.innerText = 'Change to Material';
                              button.onclick = drawMaterialChart;
                            }
                    
                            drawMaterialChart();
                        };
                        </script>
                            <div id="chart_div" style="height: 500px;"></div>
                    
                        </div>
                    </div>



   </div>
  
                <?php require_once('./admin_includes/footer.php') ;?>

          