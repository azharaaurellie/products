<?php 

class ProductView extends ProductController
{
 public function show() 
 { 
    $products = $this->getProducts();

if (!empty($products)) {
    foreach ($products as $product) { ?>
        <tr>
            <td><?= $product['id']; ?></td>
            <td><?= $product['name']; ?></td>
            <td><?= $product['price']; ?></td>
            <td><?= $product['stock']; ?></td>
        </tr>
    <?php }
} else { ?>
    <tr>
        <td colspan="4">Tidak ada data produk</td>
    </tr>
<?php 
}
}  

    public function find() 
    { 
        $detailProduct = $this->getProductBy(); //call func controller product 
        if (empty($detailProduct)) 
            return; 
        foreach ($detailProduct as $detail) { ?> 
            <div> 
                <h3><?php echo $detail['name']; ?></h3> 
                <p>harga: Rp. <?php echo $detail['price']; ?></p> 
                <p>Stok: <?php echo $detail['stock']; ?></p>
            </div>
            <?php
        }
    }
}
            ?>