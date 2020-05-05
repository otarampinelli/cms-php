<?php include "includes/headerAdmin.php"; ?>

<?php 

    if(isset($_SESSION['username'])) {
        
        $username = $_SESSION['username'];

        $query = "SELECT * FROM users WHERE username = '{$username}'";

        $selectUser = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($selectUser)) {

            $userId = $row['user_id'];
            $username = $row['username'];
            $userPassword = $row['user_password'];
            $userFirstname = $row['user_firstname'];
            $userLastname = $row['user_lastname'];
            $userEmail = $row['user_email'];
            $userImage = $row['user_image'];
            $userRole = $row['user_role'];

        }

    }
    
?>


<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigationAdmin.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>


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
                                <option value="subscriber"><?php echo $userRole ?></option>

                                <?php 

                                    if($userRole == "admin") {
                                        echo "<option value='admin'>admin</option>";
                                    } else {
                                        echo "<option value='subscriber'>subscriber</option>";
                                    }
                                
                                ?>

                                <!-- <option value="admin">admin</option>
                                <option value="subscriber">Subscriber</option> -->
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
                            <input class="btn btn-primary" type="submit" name="editUser" value="Update Profile">
                        </div>

                        </form>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <?php include "includes/footerAdmin.php"; ?>

</body>

</html>
