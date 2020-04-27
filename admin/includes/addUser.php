<?php 

    if(isset($_POST['createPost'])) {
        
        $postTitle = $_POST['title'];
        $postAuthor = $_POST['author'];
        $postCategory = $_POST['postCategory'];
        $postStatus = strtolower($_POST['postStatus']);

        $postImages = $_FILES['image']['name'];
        $postImageTemp = $_FILES['image']['tmp_name'];

        $postTags = $_POST['postTags'];
        $postContent = $_POST['postContent'];
        $postDate = date('d-m-y');


        move_uploaded_file($postImageTemp, '../images/$postImages');

        $query = "INSERT INTO posts(post_category_id, post_title, post_author, 
        post_date, post_image, post_content, post_tags, post_status) ";

        $query .= "VALUES({$postCategory}, '{$postTitle}', '{$postAuthor}', now(), '{$postImages}', '{$postContent}', 
        '{$postTags}', '{$postStatus}' ) ";

        $postQuery = mysqli_query($connection, $query);

       confirmQuery($postQuery);

    //  if(!$postQuery) {
    //        die('FAILED' . mysqli_error($connection));
    //    } 

    }

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" class="form-control" name="userFirstname">
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="userLastname">
    </div>

    <div class="form-group">
        <select name="userRole">
            <?php 
            
             $query = "SELECT * FROM users";
             $selectUsers = mysqli_query($connection, $query);

             confirmQuery($selectUsers);

             while($row = mysqli_fetch_assoc($selectUsers)) {
                $userId = $row['user_id']; 
                $userRole = $row['user_role'];

                 echo "<option value='{$userId}'>{$userRole}</option>";
             }
            
            ?>
        </select>
    </div>

    <!-- <div class="form-group">
        <label for="postImages">Post Images</label>
        <input type="file" name="image">
    </div> -->

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
       <label for="user_email">Email</label>
       <input type="email" class="form-control" name="userEmail">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" nmae="userPassword">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="createUser" value="Create User">
    </div>

</form>