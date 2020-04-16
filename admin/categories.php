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
                        </div> <!-- add category -->

                       <div class="col-xs-6">

                            <?php 
                            
                                $query = "SELECT * FROM categories";
                                $selectCategories = mysqli_query($connection, $query);
                            
                            ?>

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                
                                while($row = mysqli_fetch_assoc($selectCategories)) {
                                    $catId = $row['cat_id'];
                                    $catTitle = $row['cat_title'];

                                    echo "<tr>";
                                    echo "<td>${catId}</td>";
                                    echo "<td>${catTitle}</td>";
                                    echo "</tr>";
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
