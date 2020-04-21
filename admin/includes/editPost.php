<?php 

    if(isset($_GET['p_id'])) {

       $getPost = $_GET['p_id'];

    }

    $query = "SELECT * FROM posts";
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

?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $postTitle; ?>" type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="postCategory">Post Category Id</label>
        <input value="<?php echo $postCategory; ?>" type="text" class="form-control" name="postCategory">
    </div>

    <div class="form-group">
        <label for="title">Post Author</label>
        <input value="<?php echo $postAuthor; ?>" type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="postStatus">Post Status</label>
        <input value="<?php echo $postStatus; ?>" type="text" class="form-control" name="postStatus">
    </div>

    <div class="form-group">
        <label for="postImages">Post Images</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="postTags">Post Tags</label>
        <input value="<?php echo $postTags; ?>" type="text" class="form-control" name="postTags">
    </div>

    <div class="form-group">
        <label for="postContent">Post Content</label>
        <textarea class="form-control" name="postContent" id="" cols="30" rows="10">
            <?php 
                echo $postContent;
            ?>
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="createPost" value="Publish Post">
    </div>

</form>