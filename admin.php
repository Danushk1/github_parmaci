<?php
session_start();
require "connection.php";
if (isset($_SESSION["au"])) {
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Oder History | Admins </title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/parmacylogo.png" />
</head>

<body style="background-color: #74EBD5;background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%);">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 bg-light text-center">
                <label class="form-label text-primary fw-bold fs-1">Order History</label>
            </div>

            <div class="col-12 bg-light mt-3 mb-3">
                <div class="row">
                   
                </div>
            </div>

            <div class="col-12">
                <div class="row">

                    <div class="col-1 bg-secondary text-end">
                        <label class="form-label fs-5 fw-bold text-white">Order ID</label>
                    </div>
                   
                    <div class="col-3 bg-body text-end">
                        <label class="form-label fs-5 fw-bold text-black">Buyer</label>
                    </div>
                    <div class="col-2 bg-secondary text-end">
                        <label class="form-label fs-5 fw-bold text-white">Delevery Date</label>
                    </div>
                    
                    <div class="col-2 bg-white"></div>

                </div>
            </div>

            <div class="col-12 mt-2" id="viewArea">
                <?php

                $query = "SELECT * FROM `add_order`";
                $pageno;

                if (isset($_GET["page"])) {
                    $pageno = $_GET["page"];
                } else {
                    $pageno = 1;
                }

                $invoice_rs = Database::search($query);
                $invoice_num = $invoice_rs->num_rows;

                $results_per_page = 20;
                $number_of_pages = ceil($invoice_num / $results_per_page);

                $page_results = ($pageno - 1) * $results_per_page;
                $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                $selected_num = $selected_rs->num_rows;

                for ($x = 0; $x < $selected_num; $x++) {
                    $selected_data = $selected_rs->fetch_assoc();

                ?>
                    <div class="row">

                        <div class="col-1 bg-secondary text-end">
                            <label class="form-label fs-5 fw-bold text-white mt-1 mb-1"><?php echo $selected_data["id"]; ?></label>
                        </div>
                       
                      
                        <?php
                        $user_rs = Database::search("SELECT * FROM `users` WHERE `email`='".$selected_data["users_email"]."'");
                        $user_data = $user_rs->fetch_assoc();
                        ?>
                        <div class="col-3 bg-white text-end">
                            <label class="form-label fs-5 fw-bold text-black mt-1 mb-1">
                                <?php echo $user_data["name"]; ?>
                            </label>
                        </div>
                        <div class="col-2 bg-secondary text-end">
                            <label class="form-label fs-5 fw-bold text-black mt-1 mb-1"> <?php echo $selected_data["time"]; ?></label>
                        </div>
                       
                        <div class="col-2 bg-white d-grid">


                        <?php
                     
                       if($selected_data["status"] == 4){
                        ?>
                              <a ' class="btn fw-bold mt-1 mb-1 btn-secondary">Order Delivery</a>
                              
                        <?php
                       }

                        elseif ($selected_data["status"] == 1) {
                        ?>
                              <a href='<?php echo "pAdminUser.php?id=" . ($selected_data["id"]); ?>' class="btn btn-success fw-bold mt-1 mb-1">Order</a>
                              
                        <?php
                        } elseif($selected_data["status"] == 2) {
                        ?>
                          <button  class="btn fw-bold mt-1 mb-1 btn-primary" >Admin Order Conform</button>
                           
                        <?php
                        

                        }else{
                            ?>
                          <button  class="btn btn-danger fw-bold mt-1 mb-1"  onclick='ordercansal( <?php echo $selected_data["id"]; ?>); '>Order Cansal</button>
                           
                        <?php

                        }

                       
                        
                        
                        ?>
                           
                            
                             
                               
                            
                        </div>

                    </div>
                <?php

                }

                ?>
                <!--  -->
                <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3 mt-3">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-lg justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php

                            for ($x = 1; $x <= $number_of_pages; $x++) {
                                if ($x == $pageno) {
                            ?>
                                    <li class="page-item active">
                                        <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                    </li>
                                <?php
                                } else {
                                ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                    </li>
                            <?php
                                }
                            }

                            ?>

                            <li class="page-item">
                                <a class="page-link" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!--  -->
            </div>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>
<?php

                                            }else{
                                                echo("login");
                                            }
                                            ?>