<?php

    include "connection.php"; 
    include "./model/product.model.php"; 
    include "./controller/product.controller.php"; 
    include "./view/product/product.view.php"; 
    $products = new ProductView(); 
?> 
<!DOCTYPE html>
<html lang="en"> 
    <head> 
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
        <title>TEST PHP</title>
    </head> 
    <body> 
        <!-- navigation bar --> 
         <?php include "./view/utils/navbar.utils.php"; ?>

        <!-- mencari produk via url --> 
         <?php $products->find(); ?> 
        
         <!-- semua produk --> 
         <table border="1"> 
            <tr> 
                <th>ID</th> 
                <th>NAME</th> 
                <th>PRICE</th> 
                <th>STOCK</th> 
            </tr> 
            <?php $products->show() ?> 
        </table> 
        <!-- footer disini --> 
    </body> 
</html>