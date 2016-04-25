<div class="left-sidebar">
<h2>Search</h2>
    <div class="panel panel-default">
    <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
      <input type="text" class="form-control" placeholder="Search for...">
    </div><!-- /input-group -->
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
                    <a href="#"> <span class="pull-right"></span><?php echo $brand[0]; ?></a>
                </li>
            </ul>
            <?php } ?>
        </div>
        
        
    </div>
    <!--/brands_products-->
    <div class="price-range">
        <!--price-range-->
        <h2>Price Range</h2>
        <div class="well text-center">
            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slid id="sl2">
            <br />
            <b class="pull-left">TND 0</b> <b class="pull-right">TND 600</b>
        </div>
    </div>
    <!--/price-range-->
</div>