<?php include "db.php"; ?>

<?php

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $selectUser = mysqli_query($connection, $query);

        if(!$selectUser) {
            die('FAILED QUERY' . mysqli.error($connection));
        }

        while($row = mysqli_fetch_array($selectUser)) {

            $db_userId = $row['user_id'];
            $db_username = $row['username'];
            $db_userPassword = $row['user_password'];
            $db_userFirstname = $row['user_firstname'];
            $db_userLastname = $row['user_lastname'];
            $db_userRole = $row['user_role'];

        }

        if($username !== $db_username && $password !== $db_userPassword) {
            header("Location: ../index.php");
            echo 'Login not valid';
        } else if($username == $db_username && $password == $db_userPassword) {
            header("Location: ../admin/index.php");
        } else {
            header("Location: ../index.php");
        }

    }

?>