<?php 

    if(isset($_GET['p_id'])) {

       $getPost = $_GET['p_id'];

    }

    $query = "SELECT * FROM posts WHERE post_id = $getPost ";
    $editPosts = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($editPosts)) {
        $postId = $row['post_id'];
        $postAuthor = $row['post_author'];
        $postTitle = $row['post_title'];
        $postCategory = $row['post_category_id'];
        $postStatus = $row['post_status'];
        $postImage = $row['post_image'];
        $postTags = $row['post_tags'];
        $postCommnet = $row['post_comment_count'];
        $postDate = $row['post_date'];
        $postContent = $row['post_content'];

    }

    if(isset($_POST['updatePost'])) {

        $postTitle = $_POST['title'];
        $postAuthor = $_POST['author'];
        $postCategory = $_POST['postCategory'];
        $postStatus = $_POST['postStatus'];

        $postImage = $_FILES['image']['name'];
        $postImageTemp = $_FILES['image']['tmp_name'];

        $postTags = $_POST['postTags'];
        $postContent = $_POST['postContent'];

        move_uploaded_file($postImageTemp, "../images/$postImage");

        if(empty($postImage)) {

            $query = "SELECT * FROM posts WHERE post_id = {$getPost} ";
            $selectImage = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($selectImage)) {

                $postImage = $row['post_image'];

            }

        }

        $query = "UPDATE posts SET ";
        $query .= "post_title = '{$postTitle}', ";
        $query .= "post_category_id = '{$postCategory}', ";
        $query .= "post_date = now(), ";
        $query .= "post_author = '{$postAuthor}', ";
        $query .= "post_status = '{$postStatus}', ";
        $query .= "post_tags = '{$postTags}', ";
        $query .= "post_content = '{$postContent}', ";
        $query .= "post_image = '{$postImage}' ";
        $query .= "WHERE post_id = {$postId} ";

        $updatePost = mysqli_query($connection, $query);

        confirmQuery($updatePost);

    }

?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $postTitle; ?>" type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        
        <select name="postCategory" id="">

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
        <input value="<?php echo $postAuthor; ?>" type="text" class="form-control" name="author">
    </div>
    
    <div class="form-group">
        <select name="postStatus" id="">

            <option value='<?php echo $postStatus; ?>'><?php echo $postStatus; ?></option>
            
            <?php 
            
                if($postStatus == 'published') {
                    echo " <option value='draft'>Draft</option>";
                } else {
                    echo " <option value='published'>Published</option>";
                }
            
            ?>


        </select>
    </div>

    <div class="form-group">
        <img width="100" src="../images/<?php echo $postImage; ?>" name="postImage" alt="">
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="postTags">Post Tags</label>
        <input value="<?php echo $postTags; ?>" type="text" class="form-control" name="postTags">
    </div>

    <div class="form-group">
        <label for="postContent">Post Content</label>
        <textarea class="form-control" name="postContent" id="form-body" cols="30" rows="10"><?php echo $postContent; ?></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="updatePost" value="Update Post">
    </div>

</form>

<script>
    ClassicEditor
        .create( document.querySelector( '#form-body' ) )
        .catch( error => {
            console.error( error );
        } );


</script>

