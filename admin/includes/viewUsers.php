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
                                <th>Admin</th>
                                <th>Subscriber</th>
                                <th>Delete</th>
                                <!-- <th>Approve</th>
                                <th>Unapprove</th>
                                <th>Edit</th>
                                <th>Delete</th> -->
                            </tr>
                        </thead>
                        <tbody>


                            <?php 
                            
                                $query = "SELECT * FROM users";
                                $selectUsers = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($selectUsers)) {
                                    $userId = $row['user_id'];
                                    $username = $row['username'];
                                    $userPassword = $row['user_password'];
                                    $userFirstname = $row['user_firstname'];
                                    $userLastname = $row['user_lastname'];
                                    $userEmail = $row['user_email'];
                                    $userRole = $row['user_role'];
                                    $userImage = $row['user_image'];
                                    $userDate = date(DATE_RFC822);

                                    echo "<tr>";
                                    echo "<td>{$userId}</td>";
                                    echo "<td>{$username}</td>";
                                    echo "<td>{$userFirstname}</td>";
                                    
                                    // add category 
                                        // $query = "SELECT * FROM categories WHERE cat_id = {$postCategory} ";
                                        // $selectCategory = mysqli_query($connection, $query);

                                        // while($row = mysqli_fetch_assoc($selectCategory)) {
                                        //     $catId = $row['cat_id'];
                                        //     $catTitle = $row['cat_title'];

                                        //     echo "<td>{$catTitle}</td>";
                                    
                                        // }

                                    echo "<td>{$userLastname}</td>";
                                    echo "<td>{$userEmail}</td>";
                                    
                                    // Insert link for post

                                        // $query = "SELECT * FROM posts WHERE post_id = $commentPost ";
                                        // $postQuery = mysqli_query($connection, $query);

                                        // while($row = mysqli_fetch_assoc($postQuery)) {

                                        //     $postId = $row['post_id'];
                                        //     $postTitle = $row['post_title'];

                                        //     echo "<td><a href='../post.php?p_id=$postId'>{$postTitle}</a></td>";

                                        // }

                                    echo "<td>{$userRole}</td>";
                                    echo "<td>{$userDate}</td>";
                                    echo "<td><a href='users.php?changeAdmin=$userId'>Admin</a></td>";
                                    echo "<td><a href='users.php?changeSub=$userId'>Subscriber</a></td>";
                                    echo "<td><a href='users.php?delete=$userId'>Delete</a></td>";
                                    echo "</tr>";
                                }

                            ?>
                        </tbody>
                    </table>

<?php 

    if(isset($_GET['changeAdmin'])) {

        $userId = $_GET['changeAdmin'];

        $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $userId ";
        $changeAdmin = mysqli_query($connection, $query);

        header("Location: users.php");

    }                           


    if(isset($_GET['changeSub'])) {

        $userId = $_GET['changeSub'];

        $query = "UPDATE users SET user_role = 'subscribe' WHERE user_id = $userId ";
        $changeSub = mysqli_query($connection, $query);

        header("Location: users.php");


    }



   if(isset($_GET['delete'])) {

    $idUser = $_GET['delete'];

    $query = "DELETE FROM users WHERE user_id = {$idUser} ";

    $deleteQuery = mysqli_query($connection, $query);

    if(!$deleteQuery) {
        die('query failed' . mysqli_error($connection));
    }

    header("Location: users.php");

   }

?>