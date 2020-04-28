<?php 

    if(isset($_GET['editUser'])) {

        $user_id = $_GET['editUser'];

    $query = "SELECT * FROM users WHERE user_id = '$user_id' ";
        $editQuery = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($editQuery)) {
            $userId = $row['user_id'];
            $username = $row['username'];
            $userPassword = $row['user_password'];
            $userFirstname = $row['user_firstname'];
            $userLastname = $row['user_lastname'];
            $userEmail = $row['user_email'];
            $userRole = $row['user_role'];
            $userImage = $row['user_image'];
            $userDate = date(DATE_RFC822);


    }

}


    if(isset($_POST['editUser'])) {

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
        <input type="text" value="<?php echo $userFirstname ?>" class="form-control" name="userFirstname">
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" value="<?php echo $userLastname ?>" class="form-control" name="userLastname">
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
        <input type="text" value="<?php echo $username ?>" class="form-control" name="username">
    </div>

    <div class="form-group">
       <label for="user_email">Email</label>
       <input type="email" value="<?php echo $userEmail ?>" class="form-control" name="userEmail">
    </div>

    <div class="form-group">
      <label for="user_password">Password</label>
      <input type="password" value="<?php echo $userPassword ?>" class="form-control" name="password">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="editUser" value="Edit User">
    </div>

</form>