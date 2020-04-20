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
        $postCommnet = 4;


        move_uploaded_file($postImageTemp, "../images/$postImages");

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