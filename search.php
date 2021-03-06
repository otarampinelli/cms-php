<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<body>

        <!-- Navigation -->
        <?php include "includes/navigation.php"; ?>

        <!-- Page Content -->
        

<div class="container">

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <?php 

            if(isset($_POST['submit'])) {

            $search = $_POST['search'];


            $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search' ";

            $searchQuery = mysqli_query($connection, $query);

            if(!$searchQuery) {

                die("Query failed" . mysqli_error($connection));

            }

            $count = mysqli_num_rows($searchQuery);

            if($count == 0) {

                echo "<h1>No result</h1>";

            } else {
                
                  
           // $query = "SELECT * FROM posts";
           // $select_all_posts_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($searchQuery)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                //$post_tags = $row['post_tags'];
                //$post_comment_count = $row['post_comment_count'];
                //$post_status = $row['post_status'];

                ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                        <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                
           <?php } 

            }

            }
            
            ?>
     


        <!-- Second Blog Post -->

        <!-- Third Blog Post -->

        <!-- Pager -->
        <ul class="pager">
            <li class="previous">
                <a href="#">&larr; Older</a>
            </li>
            <li class="next">
                <a href="#">Newer &rarr;</a>
            </li>
        </ul>

    </div>

        <?php include "includes/sidebar.php"; ?>

        <!-- /.row -->

        <hr>

        <?php include "includes/footer.php"; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
