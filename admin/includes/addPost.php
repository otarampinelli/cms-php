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

     /*  if(!$postQuery) {
           die('FAILED' . mysqli_error($connection));
       } */

    }

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <select name="postCategory">
            <?php 
            
             $query = "SELECT * FROM categories ";
             $selectCategories = mysqli_query($connection, $query);

             confirmQuery($selectCategories);

             while($row = mysqli_fetch_assoc($selectCategories)) {
                 $catId = $row['cat_id'];
                 $catTitle = $row['cat_title'];

                 echo "<option value='{$catId}'>{$catTitle}</option>";
             }
            
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="postStatus">Post Status</label>
        <input type="text" class="form-control" name="postStatus">
    </div>

    <div class="form-group">
        <label for="postImages">Post Images</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="postTags">Post Tags</label>
        <input type="text" class="form-control" name="postTags">
    </div>

    <div class="form-group">
        <label for="postContent">Post Content</label>
        <textarea class="form-control" name="postContent" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="createPost" value="Publish Post">
    </div>

</form>