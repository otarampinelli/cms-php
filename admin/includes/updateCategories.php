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

                                  <?php  } } ?>

                                <?php // UPDATE QUERY
                                
                                   if(isset($_POST['update_category'])) {

                                    $catTitle = $_POST['cat_title'];
                                    $query = "UPDATE categories SET cat_title = '{$catTitle}' WHERE cat_id = {$catId} ";
                                    $updateQuery = mysqli_query($connection, $query);

                                        if(!$updateQuery) {
                                            die('QUERY FAILED' . mysqli_error($connection));
                                        }

                                   }

                                ?>
                                  

                                    
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                                </div>
                            </form>