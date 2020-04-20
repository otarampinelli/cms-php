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


function findAllCategories() {

        Global $connection;

        $query = "SELECT * FROM categories";
            $selectCategories = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($selectCategories)) {
                $catId = $row['cat_id'];
                $catTitle = $row['cat_title'];

                echo "<tr>";
                echo "<td>${catId}</td>";
                echo "<td>${catTitle}</td>";
                echo "<td><a href='categories.php?delete={$catId}'>Delete</a></td>";
                echo "<td><a href='categories.php?edit={$catId}'>Edit</a></td>";
                echo "</tr>";
            }
}

function deleteCategories() {

    Global $connection;

    if(isset($_GET['delete'])) {

        $idCat = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$idCat} ";
        $deleteQuery = mysqli_query($connection, $query);

        header("Location: categories.php");

    }

}

?>