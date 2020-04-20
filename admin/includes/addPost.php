<?php 

    if(isset($_POST['createPost'])) {
        
        $postTitle = $_POST['title'];
        $postAuthor = $_POST['author'];
        $postCategory = $_POST['postCategory'];
        $postStatus = $_POST['postStatus'];

        $postImages = $_FILES['image']['name'];
        $postImageTemp = $_FILES['image']['tmp_name'];

        $postTags = $_POST['postTags'];
        $postContent = $_POST['postContent'];
        $postDate = date('d-m-y');
        $postComment = 4;


        move_uploaded_file($postImageTemp, "../images/$postImages");

        $query = "INSERT INTO posts(post_category_id, post_title, post_author, 
        post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";

        $query .= "VALUES({$postCategory}, '{$postTitle}', '{$postAuthor}', now(), '{$postImages}', '{$postContent}', 
        '{$postTags}', '{$postComment}', '{$postStatus}' ) ";

        $postQuery = mysqli_query($connection, $query);

       confirmQuery($postQuery);

    }

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="postCategory">Post Category Id</label>
        <input type="text" class="form-control" name="postCategory">
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