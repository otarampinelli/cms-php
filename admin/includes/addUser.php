<?php 

    if(isset($_POST['createUser'])) {

        $userFirstname = $_POST['userFirstname'];
        $userLastname = $_POST['userLastname'];
        $userRole = $_POST['userRole'];
        $username = $_POST['username'];
        $userEmail = $_POST['userEmail'];
        $userPassword = $_POST['password'];

        //move_uploaded_file($postImageTemp, '../images/$postImages');


        $query = "INSERT INTO users(username, user_password, 
        user_firstname, user_lastname, user_email, user_role) ";

        $query .= "VALUES('{$username}', '{$userPassword}', '{$userFirstname}', '{$userLastname}', '{$userEmail}', 
        '{$userRole}' ) ";

        $userQuery = mysqli_query($connection, $query);

        confirmQuery($userQuery);

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
            <option value="subscriber">Select Options</option>
            <option value="admin">admin</option>
            <option value="subscriber">Subscriber</option>
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
      <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="createUser" value="Create User">
    </div>

</form>