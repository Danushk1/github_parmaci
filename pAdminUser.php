<?php

require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    
}
?>






<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>admin use</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="resource/parmacylogo.png" />

</head>

<body>

    <div class="container-fluid">
        <div class="row">





            <div class="col-12">
                <div class="row">

                    <div class="col-12 bg-body rounded mt-4 mb-4">
                        <div class="row g-2">

                            <div class="col-md-5 border-end">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                                    <div class="">


                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12 align-items-center border border-1   border-secondary">

                                                    <div id="mainImg" class="img-thumbnail " style="height: 500px;">

                                                    </div>
                                                </div>




                                            </div>
                                            <div class="row">

                                                <div class="col-12">
                                                    <div class="row">


                                                        <?php

                                                        $image_rs = Database::search("SELECT * FROM `images` WHERE `add_order_id`='" . $pid . "'");
                                                        $image_num = $image_rs->num_rows;
                                                        $img = array();
                                                        if ($image_num != 0) {

                                                            for ($x = 1; $x < $image_num; $x++) {
                                                                $image_data = $image_rs->fetch_assoc();
                                                                $img[$x] = $image_data["code"];

                                                        ?>


                                                                <div class="col-3 d-flex flex-column justify-content-center align-items-center 
                                                  border border-1 border-secondary mb-1">
                                                                    <img src="<?php echo $img[$x]; ?>" class="img-thumbnail mt-1 mb-1" id="productImg<?php echo $x; ?>" onclick="loadMainImg(<?php echo $x; ?>);" />
                                                                </div>

                                                            <?php
                                                            }
                                                        } else {

                                                            ?>

                                                            <div class="col-3 d-flex flex-column justify-content-center align-items-center 
                                                  border border-1 border-secondary mb-1">
                                                                <img src="" class="img-thumbnail mt-1 mb-1" />
                                                            </div>
                                                            <div class="col-3 d-flex flex-column justify-content-center align-items-center 
                                                  border border-1 border-secondary mb-1">
                                                                <img src="resource/empty.svg" class="img-thumbnail mt-1 mb-1" />
                                                            </div>
                                                            <div class="col-3 d-flex flex-column justify-content-center align-items-center 
                                                  border border-1 border-secondary mb-1">
                                                                <img src="resource/empty.svg" class="img-thumbnail mt-1 mb-1" />
                                                            </div>
                                                            <div class="col-3 d-flex flex-column justify-content-center align-items-center 
                                                  border border-1 border-secondary mb-1">
                                                                <img src="resource/empty.svg" class="img-thumbnail mt-1 mb-1" />
                                                            </div>

                                                        <?php
                                                        }
                                                        ?>





                                                    </div>
                                                </div>







                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>

                            <div class="col-md-7 border-end">
                                <div class="p-3 py-5">

                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="row" style="height: 250px;">
                                            <div class=" d-flex flex-column border border-1 border-secondary mb-1 ">


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
                                                                    <form action= "pAdminUserProcess.php?id=<?php echo ($pid)?>" method="post">
                                                                        <input type="text" id="d1" class="border-1" name="d1" required>
                                                                </div>
                                                                <div class="col-5">
                                                                    <div class="row">

                                                                        <div class="col-3">
                                                                            <input type="text" id="q1" name="q1" class="border-1" required>
                                                                        </div>


                                                                        <div class="col-1">

                                                                            <input type="text" class="" placeholder="X" readonly>



                                                                        </div>
                                                                        <div class="col-1">
                                                                            <input type="text" id="m1" name="m1" class="border-1" required>

                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                <div class="col-3 ">

                                                                    <input type="text" id="a1" name="a1" class="mb-4 border-0 fw-bold text-primary fs-2" readonly>

                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-4 ">
                                                                    <form action="pAdminUserProcess.php" method="post">
                                                                        <input type="text" id="d2" class="border-1" name="d2" required>
                                                                </div>
                                                                <div class="col-5">
                                                                    <div class="row">

                                                                        <div class="col-3">
                                                                            <input type="text" id="q2" name="q2" class="border-1" required>
                                                                        </div>


                                                                        <div class="col-1">

                                                                            <input type="text" class="" placeholder="X" readonly>



                                                                        </div>
                                                                        <div class="col-1">
                                                                            <input type="text" id="m2" name="m2" class="border-1" required>

                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                <div class="col-3 ">

                                                                    <input type="text" id="a2" name="a2" class="mb-4 border-0 fw-bold text-primary fs-2" readonly>

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
                                                                        <input class="fs-3 border-0 fw-bold text-primary" id="t" name="t" readonly>
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
                                                                    <div class="row input-lg">
                                                                        <button type="submite" class="input-lg" style=" height: 80px;" >Add</button>
                                                                        
                                                                        </form>

                                                                    </div>

                                                                   

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
                        <div class="col-4 mt-2">

                        </div>
                        <div class="col-4 mt-2">
                            <div class="row">

                            </div>

                        </div>
                        <div class="col-3 mt-2">
                            <div class="row input-lg">
                            <a href='sendEmailProcess.php?id=<?php echo ($pid)?>' class=" btn btn-primary" style=" height: 40px;" >Send Quotation</a>

                            </div>
                          
                        </div>
                        <div class="col-1">


                        </div>



                    </div>
                </div>



            </div>

        </div>


        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
</body>

</html>