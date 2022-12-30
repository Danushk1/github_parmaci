<?php

require "connection.php";



session_start();
if (isset($_SESSION["u"])) {

    $umail = $_SESSION["u"]["email"];

    $user_rs = Database::search("SELECT * FROM `add_order` WHERE `users_email`='" . $umail . "'");
    $orde_num = $user_rs->num_rows;

    $selected_data = $user_rs->fetch_assoc();

   
    $user_rs = Database::search("SELECT * FROM `balense` WHERE `add_order_id`='" . $selected_data["id"] . "'");
    $product_num = $user_rs->num_rows;
    $user_data = $user_rs->fetch_assoc();

    
    if ($selected_data['users_email'] !== null) {
        if ($user_data['add_order_id'] !== null) {

            ?>
            

            

        <!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>conform</title>
    <link rel="icon" href="resource/parmacylogo.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" />


</head>

<body>

    <div class="container-fluid">
        <div class="row">





            <div class="col-12">
                <div class="row">

                    <div class="col-12 bg-body rounded mt-4 mb-4">
                        <div class="row g-2">






                            <div class="row">
                                <div class="col-12 mt-4 justify-content-center">
                                    <div class="row">
                                        <div class="col-4 fw-bold fs-3">
                                            Drug
                                        </div>
                                        <div class="col-6 fw-bold fs-3">
                                            Quantity
                                        </div>
                                        <div class="col-2 fw-bold fs-3">
                                            Amount
                                        </div>
                                    </div>


                                    <div class="col-12 mt-4 justify-content-center md-textarea">
                                        <div class="row">
                                            <div class="col-4 ">

                                                <label type="text" id="d1" class="border-1" name="d1" required><?php echo ($user_data['drug']); ?></label>
                                            </div>
                                            <div class="col-5">
                                                <div class="row">

                                                    <div class="col-3">
                                                        <label type="text" id="q1" name="q1" class="border-1" required><?php echo ($user_data['qty1']); ?></label>
                                                    </div>


                                                    <div class="col-1">

                                                        <label type="text" class="" readonly>X</label>



                                                    </div>
                                                    <div class="col-1">
                                                        <label type="text" id="m1" name="m1" class="border-1" required><?php echo ($user_data['max']); ?></label>

                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-3 ">

                                                <label type="text" id="a1" name="a1" class="mb-4 border-0 fw-bold text-primary fs-2" readonly><?php echo ($user_data['amount']); ?></label>

                                            </div>
                                        </div>





                                    </div>



                                    <div class="col-12 mt-3">
                                        <div class="row">
                                            <div class="col-4 mt-2">

                                            </div>
                                            <div class="col-4 mt-2">
                                                <div class="row">
                                                    <label class="fw-bold fs-4 text-end input-lg">Total :</label>
                                                </div>

                                            </div>
                                            <div class="col-3 mt-2">
                                                <div class="row input-lg">
                                                    <label class="fs-3 border-0 fw-bold text-primary" id="t" name="t" readonly><?php echo ($user_data['total']); ?></label>
                                                </div>

                                            </div>
                                            <div class="col-1">


                                            </div>



                                        </div>
                                    </div>


                                    <div class="col-12 mt-3">
                                        <div class="row">
                                            <div class="col-4">

                                            </div>
                                            <div class="col-4 mb-4">
                                                <div class="row">
                                                    <label class="fw-bold fs-4 text-end input-lg">Drug</label>
                                                </div>

                                            </div>
                                            <div class="col-3 mt-3">
                                                <div class="row input-lg">
                                                    <input type="text" class="input-lg fw-bold text-primary fs-2" style=" height: 60px;" placeholder="2">
                                                </div>

                                            </div>
                                            <div class="col-1">


                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="row">
                                            <div class="col-4 mt-2">

                                            </div>
                                            <div class="col-4 mt-2">
                                                <div class="row">
                                                    <label class="fw-bold fs-4 text-end input-lg">Quantity</label>
                                                </div>

                                            </div>
                                            <div class="col-3 mt-2">
                                                <div class="row input-lg">
                                                    <input type="text" class="input-lg fw-bold text-primary fs-2" style=" height: 60px;" placeholder="2">
                                                </div>

                                            </div>
                                            <div class="col-1">


                                            </div>



                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <div class="row">
                                            <div class="col-4 mt-2">

                                            </div>
                                            <div class="col-4 mt-2">
                                                <div class="row">

                                                </div>

                                            </div>
                                            <div class="col-3 mt-2">



                                            </div>
                                            <div class="col-1">


                                            </div>



                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <hr>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>

    </div>
    </div>
    <div class="col-12 mt-3">
        <div class="row">

            <div class="col-2">

            </div>
            <div class="col-4 mt-2">

                <?php

                if ($user_data["status"] == 1 && ($selected_data['status'] == 2)) {
                ?>


                    <div class="row">
                        <div class="row input-lg">

                            <button id="pb<?php echo $selected_data['id']; ?>" class="btn btn-success" onclick="changeBalanseStatus('<?php echo $selected_data['id']; ?>');">order</button>


                        </div>
                    </div>

            </div>
            <div class="col-4 mt-2">
                <div class="row input-lg">


                    <button id="pb<?php echo $selected_data['id']; ?>" class="btn btn-primary" onclick="blockorder('<?php echo $selected_data['id']; ?>');">Reject</button>



                <?php

                } else if ($user_data["status"] == 1 &&($selected_data['status'] == 4)) {

                ?>

                    <div class="row">
                        <div class="row input-lg">

                        <button id="pb<?php echo $user_data['id']; ?>" class="btn btn-success">order completed</button>
                          


                        </div>
                    </div>

                </div>
                <div class="col-4 mt-2">
                    <div class="row input-lg">


                       
                        <button id="pb<?php echo $user_data['id']; ?>" class="btn btn-primary">Not Reject</button>


                    <?php







                } else if ($user_data["status"] == 1 && ($selected_data['status'] == 3)) {

                    ?>

                        <div class="row">
                            <div class="row input-lg">

                                <button id="pb<?php echo $user_data['id']; ?>" class="btn btn-danger">order Reject</button>


                            </div>
                        </div>

                    </div>
                    <div class="col-4 mt-2">
                        <div class="row input-lg">


                        <button id="pb<?php echo $user_data['id']; ?>" class="btn btn-primary"> Reject Conforme</button>

                          

                        <?php


                    } else {
                    }
                        ?>




                        </div>


                    </div>
                    <div class="col-2">

                    </div>
                </div>



            </div>

        </div>


        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
</body>

</html>


            
            <?php
          
        } else {
?>


            <h1 class="fw-bold fs-1 text-center text-primary text-bg-dark start-50">Wait a Little</h1>
        <?php
        }
    } else {

        ?>


        <h1 class="fw-bold fs-1 text-center text-primary text-bg-dark start-50">Add Order</h1>
<?php

    }
}
?>







