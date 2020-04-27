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
                            Welcome to admin
                            <small>Auhtor</small>
                        </h1>

                        <?php 
                        
                            if(isset($_GET['source'])) {

                                $source = $_GET['source'];

                            } else {
                                $source = '';
                            }

                            switch($source) {

                                case 'addPost':
                                    include "includes/addUser.php";
                                break;

                                case 'editPost':
                                    include "includes/editUser.php";
                                break;

                                case '44':
                                    echo "NICE 44";
                                break;

                                default:
                                    include "includes/viewUsers.php";
                                break;

                            }
                        
                        ?>

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
