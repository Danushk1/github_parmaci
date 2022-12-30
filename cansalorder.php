<?php



require "connection.php";


    if(isset($_GET["id"])){
        $order = $_GET["id"];

       
      
        $admin = Database::search("SELECT * FROM `balense` WHERE `add_order_id`='".$order."'");
        $num = $admin->num_rows;

        
            $data = $admin->fetch_assoc();

            Database::iud("DELETE FROM `balense` WHERE `add_order_id`='".$order."'");
           

            Database::iud("DELETE FROM `images` WHERE `add_order_id`='".$order."'");
          
        

            Database::iud("DELETE FROM `add_order` WHERE `id`='".$order."'");
            echo ("removed");
        
     
       
              
               
                  
        
                  
                
        
           
        }
        ?>



