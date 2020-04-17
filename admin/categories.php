<?php include "includes/headerAdmin.php"; ?>

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
                            Admin Page
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">

                        <?php 
                        
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
                        
                        ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Edit Category</label>

                                    <?php
                                    
                                    if(isset($_GET['edit'])) {

                                    $idCat = $_GET['edit'];    

                                    $query = "SELECT * FROM categories WHERE cat_id = {$idCat} ";
                                    $selectCategoriesId = mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($selectCategoriesId)) {
                                        $catId = $row['cat_id'];
                                        $catTitle = $row['cat_title'];

                                        ?>


                                    <input value ="<?php 

                                            if(isset($catTitle)) {
                                                echo $catTitle;
                                            }
                                    
                                    ?>" class="form-control" type="text" name="cat_title">

                                  <?php  }

                                    }

                                    ?>

                                    
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Update Category">
                                </div>
                            </form>
                        </div> <!-- add category -->

                       <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php // FIND ALL CATEGORIES QUERY
                                
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
                                
                                ?>

                                <?php // DELETE QUERY
                                
                                if(isset($_GET['delete'])) {

                                    $idCat = $_GET['delete'];
                                    $query = "DELETE FROM categories WHERE cat_id = {$idCat} ";
                                    $deleteQuery = mysqli_query($connection, $query);

                                    header("Location: categories.php");

                                }
                                
                                ?>

                                    <!--<tr>
                                        <td>Baseball Category</td>
                                        <td>Basketball Category</td>
                                    </tr>-->
                                </tbody>
                            </table>
                       </div>
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
