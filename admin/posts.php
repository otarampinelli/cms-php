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
                            Welcome to admin
                            <small>Auhtor</small>
                        </h1>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php 
                            
                                $query = "SELECT * FROM posts";
                                $selectPosts = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($selectPosts)) {
                                    $postId = $row['post_id'];
                                    $postAuthor = $row['post_author'];
                                    $postTitle = $row['post_title'];
                                    $postCategory = $row['post_category_id'];
                                    $postStatus = $row['post_status'];
                                    $postImage = $row['post_image'];
                                    $postTags = $row['post_tags'];
                                    $postComments = $row['post_comment_count'];
                                    $postDate = $row['post_date'];

                                    echo "<tr>";
                                    echo "<td>{$postId}</td>";
                                    echo "<td>{$postAuthor}</td>";
                                    echo "<td>{$postTitle}</td>";
                                    echo "<td>{$postCategory}</td>";
                                    echo "<td>{$postStatus}</td>";
                                    echo "<td><img width='100' src='../images/$postImage' alt='image'></td>";
                                    echo "<td>{$postTags}</td>";
                                    echo "<td>{$postComments}</td>";
                                    echo "<td>{$postDate}</td>";
                                    echo "</tr>";
                                }

                            ?>

                            
                                <td>10</td>
                                <td>John</td>
                                <td>Bootstrap Framework</td>
                                <td>Bootstrap</td>
                                <td>Status</td>
                                <td>Image</td>
                                <td>Tags</td>
                                <td>Comments</td>
                                <td>Date</td>
                            
                        </tbody>
                    </table>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <?php include "includes/footerAdmin.php"; ?>

</body>

</html>
