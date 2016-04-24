
    <?php include 'Include/header.php';?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <?php include 'Include/side.php';?>
                </div>
                <div class="col-sm-9 padding-right">
                    <div class="recommended_items">
                        <?php // include 'Include/recommended.php';?>
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">Features Items</h2>

                        <?php 
                            require 'Control/get_articles.php';
                            $articles = get_articles('all');
                            foreach ($articles as $article) {
                        ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="article_pic/<?php echo $article->id; ?>" alt="" />
                                        <h2><?php echo $article->price; ?> TND</h2>
                                        <p><?php echo $article->description; ?></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-plus-square" aria-hidden="true"></i>Details</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?php echo $article->price; ?> TND</h2>
                                            <p><?php echo $article->description; ?></p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-plus-square" aria-hidden="true"></i>Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'Include/footer.php';?>
    
