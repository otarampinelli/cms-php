<?php 

    function insertCategories() {

        Global $connection;

        if(isset($_POST['submit'])) {

            $cat_title = $_POST['cat_title'];


            if($cat_title == "" || empty($cat_title)) {
                
                 echo "This field should not be empty";

            } else {

             $query = "INSERT INTO categories(cat_title) VALUE('{$cat_title}')";

                 $queryCreate = mysqli_query($connection, $query);

                 if(!$queryCreate) {

                     die('QUERY FAILED' . mysqli_error($connection));

                 }


            }

         }

    }

?>