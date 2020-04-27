<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Date</th>
                                <!-- <th>Approve</th>
                                <th>Unapprove</th>
                                <th>Edit</th>
                                <th>Delete</th> -->
                            </tr>
                        </thead>
                        <tbody>


                            <?php 
                            
                                $query = "SELECT * FROM users";
                                $selectComments = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($selectComments)) {
                                    $userId = $row['user_id'];
                                    $username = $row['username'];
                                    $userFirstname = $row['user_firstname'];
                                    $userLastname = $row['user_lastname'];
                                    $userEmail = $row['user_email'];
                                    $userRole = $row['user_role'];
                                    $userDate = date(DATE_RFC822);

                                    echo "<tr>";
                                    echo "<td>{$userId}</td>";
                                    echo "<td>{$username}</td>";
                                    echo "<td>{$userFirstname}</td>";
                                    
                                    // // add category 
                                    // $query = "SELECT * FROM categories WHERE cat_id = {$postCategory} ";
                                    // $selectCategory = mysqli_query($connection, $query);

                                    // while($row = mysqli_fetch_assoc($selectCategory)) {
                                    //     $catId = $row['cat_id'];
                                    //     $catTitle = $row['cat_title'];

                                    //     echo "<td>{$catTitle}</td>";
                                
                                    // }

                                    echo "<td>{$userLastname}</td>";
                                    echo "<td>{$userEmail}</td>";

                                    // $query = "SELECT * FROM posts WHERE post_id = $commentPost ";
                                    // $postQuery = mysqli_query($connection, $query);

                                    // while($row = mysqli_fetch_assoc($postQuery)) {

                                    //     $postId = $row['post_id'];
                                    //     $postTitle = $row['post_title'];

                                    //     echo "<td><a href='../post.php?p_id=$postId'>{$postTitle}</a></td>";

                                    // }

                                    echo "<td>{$userRole}</td>";
                                    echo "<td>{$userDate}</td>";
                                    // echo "<td><a href='comments.php?approve=$commentId'>Approve</a></td>";
                                    // echo "<td><a href='comments.php?unapprove=$commentId'>Unapprove</a></td>";
                                    // echo "<td><a href='comments.php?delete=$commentId'>Delete</a></td>";
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

    if(isset($_GET['approve'])) {

        $commentId = $_GET['approve'];

        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $commentId ";
        $approveQuery = mysqli_query($connection, $query);

        header("Location: comments.php");

    }                           


    if(isset($_GET['unapprove'])) {

        $commentId = $_GET['unapprove'];

        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $commentId ";
        $unapproveQuery = mysqli_query($connection, $query);

        header("Location: comments.php");


    }



   if(isset($_GET['delete'])) {

    $idComment = $_GET['delete'];

    $query = "DELETE FROM comments WHERE comment_id = {$idComment} ";

    $deleteQuery = mysqli_query($connection, $query);

    header("Location: comments.php");

   }

?>