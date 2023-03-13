<?php require 'inc/head.php'; ?>
<?php require 'inc/data/products.php'; ?>

<section class="cookies container-fluid">
    <div class="row">
        <?php

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }   
            if( isset($_SESSION['loginname'])) {
                if (isset($_SESSION['cart'])) {
                    foreach($_SESSION['cart'] as $id => $quantity)
                    if(isset($catalog[$id]['name'])) 
                        echo $catalog[$id]['name'] .' x' . $quantity . '<br>';
                }
                else{
                    echo 'Ton panier est vide';
                }
            }
            else{
                echo 'connecte-toi pour voir ton panier';
            }

            
            

        ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
