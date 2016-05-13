<footer id="footer">
        <!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="companyinfo">
                            <a href=" index.php"><img src="images/home/logo.png" alt="" /></a>
                            <p><br>Fakhtout Foundation - Best Online shopping website</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Categories</h2>
                            <ul class="nav nav-pills nav-stacked">
                            <?php require_once 'Control/get_categories.php'; 
                            $categories = get_categories();
                            foreach ($categories as $category) {
                            ?>
                                    <li><a href="<?php echo 'index.php?cat='. $category->id; ?>"><?php echo $category->name ?></a></li>
                            <?php } ?>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Brands</h2>

                            <ul class="nav nav-pills nav-stacked">
                            <?php require_once 'Control/get_brands.php'; 
                            $brands = get_brands();
                            foreach ($brands as $brand) {
                            ?>
                                    <li>
                                        <a href="index.php?brand=<?php echo $brand[0]; ?>"> <span class="pull-right"></span><?php echo $brand[0]; ?></a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="images/home/map.png" alt="" />
                            <center><p>505 Avenue l'UMA - La Soukra <br> Ariana</p></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2016 Fakhtout Inc. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>

</html>