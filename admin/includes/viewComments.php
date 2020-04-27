<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Comments</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>In Response to</th>
                                <th>Date</th>
                                <th>Approve</th>
                                <th>Unapprove</th>
                                <!--<th>Edit</th>-->
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php 
                            
                                $query = "SELECT * FROM comments";
                                $selectComments = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($selectComments)) {
                                    $commentId = $row['comment_id'];
                                    $commentPost = $row['comment_post_id'];
                                    $commentAuthor = $row['comment_author'];
                                    $commentContent = $row['comment_content'];
                                    $commentEmail = $row['comment_email'];
                                    $commentStatus = $row['comment_status'];
                                    $commentDate = $row['comment_date'];

                                    echo "<tr>";
                                    echo "<td>{$commentId}</td>";
                                    echo "<td>{$commentAuthor}</td>";
                                    echo "<td>{$commentContent}</td>";
                                    
                                    // // add category 
                                    // $query = "SELECT * FROM categories WHERE cat_id = {$postCategory} ";
                                    // $selectCategory = mysqli_query($connection, $query);

                                    // while($row = mysqli_fetch_assoc($selectCategory)) {
                                    //     $catId = $row['cat_id'];
                                    //     $catTitle = $row['cat_title'];

                                    //     echo "<td>{$catTitle}</td>";
                                
                                    // }

                                    echo "<td>{$commentEmail}</td>";
                                    echo "<td>{$commentStatus}</td>";

                                    $query = "SELECT * FROM posts WHERE post_id = $commentPost ";
                                    $postQuery = mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($postQuery)) {

                                        $postId = $row['post_id'];
                                        $postTitle = $row['post_title'];

                                        echo "<td><a href='../post.php?p_id=$postId'>{$postTitle}</a></td>";

                                    }

                                    echo "<td>{$commentDate}</td>";
                                    echo "<td><a href='posts.php?source=editPost&p_id='>Approve</a></td>";
                                    echo "<td><a href='posts.php?delete='>Unapprove</a></td>";
                                    echo "<td><a href='comments.php?delete=$commentId'>Delete</a></td>";
                                    echo "</tr>";
                                }

                            ?>

                            <!--
                                <td>10</td>
                                <td>John</td>
                                <td>Bootstrap Framework</td>
                                <td>Bootstrap</td>
                                <td>Status</td>
                                <td>Image</td>
                                <td>Tags</td>
                                <td>Comments</td>
                                <td>Date</td>

                            -->
                            
                        </tbody>
                    </table>

<?php 

   if(isset($_GET['delete'])) {

    $idComment = $_GET['delete'];

    $query = "DELETE FROM comments WHERE comment_id = {$idComment} ";

    $deleteQuery = mysqli_query($connection, $query);

    header("Location: comments.php");

   }

?>