<?php require 'inc/data/products.php'; ?>

<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    //si l'utilisateur est connecter + 
    if( isset($_SESSION['loginname'])) {
        
        //a appuyer sur le bouton add
        if(isset($_GET['add_to_cart'])){
            $id = $_GET['add_to_cart'] ;
            
            echo $catalog[$id]['name'];
            
            if( isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]++;
            } else {
                $_SESSION['cart'][$id] = 1;
            }
        
            foreach($_SESSION['cart'] as $value){
                echo $value . ' ';
            }
    
            //ajoute un message ici
            $_SESSION['message_ajout'] = "Felicitation vous avez bien ajouter : " . $catalog[$id]['name'] . " a votre panier";
            
            $chemin = 'Location: /' ;
            header($chemin);
        }
    }
    else{
        if(isset($_GET['add_to_cart'])) {
            echo 'Connecte-toi pour pouvoir acheter vos fameux cookies :)';
        }
    }
?>


<?php require 'inc/head.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <a href="?add_to_cart=<?= $id; ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
        <?php 
            if(isset($_SESSION['message_ajout'])){
                echo $_SESSION['message_ajout'];
                unset($_SESSION['message_ajout']);
            }   
        ?>
    </div>
</section>

<?php require 'inc/foot.php'; ?>
