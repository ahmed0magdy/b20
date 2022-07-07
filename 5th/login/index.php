
<?php

$products = [
    [
        'id' => 1,
        'name' => 'laptop',
        'price' => [
            15000 , 20000
        ],
        'image' => '1.jpg'
    ],
    [
        'id' => 2,
        'name' => 'mobile',
        'price' => [
            12000, 10000
        ],
        'image' => '2.jpg'
    ],
    [
        'id' => 3,
        'name' => 'tv',
        'price' => [
            8000 , 12000
        ],
        'image' => '3.jpg'
    ]
];
$title = "Home";
include_once "layouts/header.php";
include_once "layouts/navbar.php";
?>
<div class="container">
    <div class="row">
        <div class="col-12 text-center h1 text-dark mt-5">
            Products 
        </div>
        <?php foreach($products AS $product) { ?>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <img src="images/<?= $product['image'] ?>" alt="" class="w-100">
                        <h4 class="card-title"><?= $product['name'] ?></h4>
                    </div>
                    <div class="card-footer text-muted">
                        <p class="card-text">
                            <?php foreach($product['price'] AS $price) { 
                                echo $price .' EGP <br>';
                            } ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php 
include_once "layouts/footer.php";
include_once "layouts/scripts.php";
?>
  