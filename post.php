<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "admin/functions.php"; ?>

<body>

        <!-- Navigation -->
        <?php include "includes/navigation.php"; ?>

        <!-- Page Content -->

        <div class="container">

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <?php 
            
            if(isset($_GET['p_id'])) {

                $postId = $_GET['p_id'];

            }

            $query = "SELECT * FROM posts WHERE post_id = $postId ";
            $select_all_posts_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_all_posts_query)) {
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

                
           <?php } ?>
  

                <!-- Blog Comments -->

                <?php 
                
                    if(isset($_POST['createComment'])) {

                        $postId = $_GET['p_id'];

                        $commentAuthor = $_POST['commentAuthor'];
                        $commnetEmail = $_POST['commentEmail'];
                        $commentContent = $_POST['commentContent'];

                        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                        $query .= "VALUES ($postId, '{$commentAuthor}', '{$commnetEmail}', '{$commentContent}', 'unapproved', now())";
                        $createComment = mysqli_query($connection, $query);

                        if($createComment) {
                            echo "success";
                        }

                        confirmQuery($createComment);

                    }

               
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label for="Author">Author</label>
                            <input type="text" class="form-control" name="commentAuthor">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" name="commentEmail">
                        </div>
                        <div class="form-group">
                            <label for="Comment">Your Comment</label>
                            <textarea class="form-control" name="commentContent" rows="3"></textarea>
                        </div>
                        <button type="submit" name="createComment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php 
                
                    $query = "SELECT * FROM comments WHERE comment_post_id = {$postId} ";
                    $query .= "AND comment_status = 'approved' ";
                    $query .= "ORDER BY comment_id DESC ";
                    $commentQuery = mysqli_query($connection, $query);

                    if(!$commentQuery) {
                        die('QUERY FAILED' . mysqli_error($connection));
                    }

                    while($row = mysqli_fetch_array($commentQuery)) {
                        $commentDate = $row['comment_date'];
                        $commentContent = $row['comment_content'];
                        $commentAuthor = $row['comment_author'];

                        ?>

                    <!-- Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $commentAuthor; ?>
                                <small><?php echo $commentDate; ?></small>
                            </h4>
                                <?php echo $commentContent; ?>
                        </div>
                    </div>

                        
                   <?php } ?>


            

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


        <!-- Blog Sidebar Widgets Column -->

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
