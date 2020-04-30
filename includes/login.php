<?php include "db.php"; ?>

<?php

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = mysqli_real_scape_string($connection, $username);
        $password = mysqli_real_scape_string($connection, $password);

        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $selectUser = mysqli_query($connection, $query);

        if(!$selectUser) {
            die('FAILED QUERY' . mysqli.error($connection));
        }

        while($row = mysqli_fetch_array($selectUser)) {

            echo $db_id = $row['user_id'];

        }

    }

?>