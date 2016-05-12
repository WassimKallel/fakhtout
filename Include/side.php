<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/search.js"></script>
<div class="left-sidebar">
<h2>Search</h2>
    <div  style="border-radius: 0 ; box-shadow: 0;" class="panel panel-default">
      <input style="border-radius: 0; box-shadow: 0;" onblur="resetsearch()" onkeyup="searching(this.value)" type="text" class="form-control" placeholder="Search">
    </div>
    <h2>Category</h2>
        <!--shipping-->
    <!-- <div class="shipping text-center">
        <img src="images/home/shipping.jpg" alt="" />
    </div>
    <br/> -->
    <!--/shipping-->
    <div class="panel-group category-products" id="accordian">
        <!--category-productsr-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="index.php">ALL</a></h4>
            </div>
        </div>
        <?php require 'Control/get_categories.php'; 
        $categories = get_categories();
        foreach ($categories as $category) {
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="<?php echo 'index.php?cat='. $category->id; ?>"><?php echo $category->name ?></a></h4>
            </div>
        </div>
        <?php } ?>
    </div>
    
    <!--/category-products-->
    <div class="brands_products">
        <!--brands_products-->
        <h2>Brands</h2>
        <div class="brands-name">
        <?php require 'Control/get_brands.php'; 
        $brands = get_brands();
        foreach ($brands as $brand) {
        ?>
            <ul class="nav nav-pills nav-stacked">
                <li>
                    <a href="index.php?brand=<?php echo $brand[0]; ?>"> <span class="pull-right"></span><?php echo $brand[0]; ?></a>
                </li>
            </ul>
            <?php } ?>
        </div>
        
        
    </div>
    <!--/brands_products-->

</div>