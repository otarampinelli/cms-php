<?php include "includes/headerAdmin.php"; ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigationAdmin.php"; ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin

                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

                   
                <!-- /.row -->
                
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-text fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">

                            <?php 
                            
                                $query = "SELECT * FROM posts";
                                $selectAll = mysqli_query($connection, $query);
                                $postCount = mysqli_num_rows($selectAll);


                                echo "<div class='huge'>{$postCount}</div>"
                            ?>

                        
                                <div>Posts</div>
                            </div>
                        </div>
                    </div>
                    <a href="posts.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">

                            <?php 
                            
                            $query = "SELECT * FROM comments";
                            $selectPostCount = mysqli_query($connection, $query);
                            $commentCount = mysqli_num_rows($selectPostCount);

                            echo "<div class='huge'>{$commentCount}</div>";
                        
                        ?>
                            <div>Comments</div>
                            </div>
                        </div>
                    </div>
                    <a href="comments.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">

                                <?php 
                                
                                    $query = "SELECT * FROM users";
                                    $selectUsers = mysqli_query($connection, $query);
                                    $usersCount = mysqli_num_rows($selectUsers);

                                    echo "<div class='huge'>{$usersCount}</div>";
                                
                                ?>

                                <div> Users</div>
                            </div>
                        </div>
                    </div>
                    <a href="users.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-list fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">

                                <?php 
                                
                                    $query = "SELECT * FROM categories";
                                    $selectCategories = mysqli_query($connection, $query);
                                    $categoriesCount = mysqli_num_rows($selectCategories);

                                    echo "<div class='huge'>{$categoriesCount}</div>";

                                ?>

                                <div>Categories</div>
                            </div>
                        </div>
                    </div>
                    <a href="categories.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
                <!-- /.row -->

        <?php 
        
            $query = "SELECT * FROM posts WHERE post_status = 'draft'";
            $selectDraft = mysqli_query($connection, $query);
            $postDraft = mysqli_num_rows($selectDraft);

            $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
            $selectUnapproved = mysqli_query($connection, $query);
            $commentUnapproved = mysqli_num_rows($selectUnapproved);

            $query = "SELECT * from users WHERE user_role = 'subscriber'";
            $selectSubscriber = mysqli_query($connection, $query);
            $userSubscriber = mysqli_num_rows($selectSubscriber);

        
        ?>


        <div class="row">
            <script type="text/javascript">
                google.charts.load('current', {'packages':['bar']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                    ['Data', 'count'],

                        <?php 
                        
                            $elementsText = ['Active Posts', 'Draft Posts', 'Unapproved Comments', 'User Subscriber', 'Comments', 'Users', 'Categories'];
                            $elementCount = [$postCount, $postDraft, $commentUnapproved, $userSubscriber, $commentCount, $usersCount, $categoriesCount];

                            for($i = 0; $i < 7; $i++) {
                                echo "['{$elementsText[$i]}'" . " ," . "{$elementCount[$i]}],";
                            }

                        ?>

                    // ['Posts', 1000],
                    ]);

                    var options = {
                    chart: {
                        title: '',
                        subtitle: '',
                    }
                    };

                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }
        </script>
        </div>

        <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
        

        </div>
        <!-- /#page-wrapper -->

    </div>
    
    <?php include "includes/footerAdmin.php"; ?>

</body>

</html>
