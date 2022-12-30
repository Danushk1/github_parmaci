

<?php

session_start();
require "connection.php";

$email = $_SESSION["u"];


   

$user_rs = Database::search("SELECT * FROM `add_order` WHERE `users_email`='".$email['email']."'");
$user_num = $user_rs->num_rows;

if($user_num == 1){

    $product_data = $user_rs->fetch_assoc();

    echo ("Product conform or regect");
   
}else{

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/parmacylogo.png" />

</head>

<body>

    <div class="container-fluid">
        <div class="row gy-3">
        <?php include "header.php";?>



            <div class="col-12">
                <div class="row">

                   


                    <div class="col-12">
                        <div class="row">






                            <div class="col-12">
                                <hr class="border-success" />
                            </div>







                            <div class="col-12">
                                <hr class="border-success" />
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-lg-6 border-end border-success">
                                        <div class="row">
                                            <div class="col-12 offset-lg-1 col-lg-3">



                                       
                                            <label class="form-label fw-bold" style="font-size: 18px;">Delivery Address</label>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="input-group mb-2 mt-2">

                                                <input type="text" class="form-control" id="da" placeholder="Delivery Address" />

                                            </div>
                                        </div>


                                



                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 offset-lg-1 col-lg-3">
                                            <label class="form-label fw-bold" style="font-size: 18px;">delivery time</label>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="input-group mb-2 mt-2">

                                                <input type="text" class="form-control" id="dt" placeholder="delivery time   — 2 hour time slots" />

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="border-success" />
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label fw-bold" style="font-size: 20px;">Note</label>
                                </div>
                                <div class="col-12">
                                    <textarea cols="30" rows="10" class="form-control" id="not"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="border-success" />
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label fw-bold" style="font-size: 20px;">Add Product Images</label>
                                </div>
                                <div class="offset-lg-2 col-lg-10">
                                    <div class="row">
                                        <div class="col-2 border border-primary rounded">
                                            <img src="resource/addproductimg.svg" class="img-fluid" style="height: 300px;" id="i0" />
                                        </div>
                                        <div class="col-2 border border-primary rounded">
                                            <img src="resource/addproductimg.svg" class="img-fluid" style="height: 300px;" id="i1" />
                                        </div>
                                        <div class="col-2 border border-primary rounded">
                                            <img src="resource/addproductimg.svg" class="img-fluid" style="height: 300px;" id="i2" />
                                        </div>
                                        <div class="col-2 border border-primary rounded">
                                            <img src="resource/addproductimg.svg" class="img-fluid" style="height: 300px;" id="i3" />
                                        </div>
                                        <div class="col-2 border border-primary rounded">
                                            <img src="resource/addproductimg.svg" class="img-fluid" style="height: 300px;" id="i4" />
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                                    <input type="file" class="d-none" id="imageuploader" multiple />
                                    <label for="imageuploader" class="col-12 btn btn-primary" onclick=" changeProductImage();">Upload Images</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="border-success" />
                        </div>



                        <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                            <button class="btn btn-success" onclick="addProduct();">Save Product</button>
                        </div>

                    </div>



                    

                </div>

            </div>
        </div>



    </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>


<?php
}
    ?>
 
