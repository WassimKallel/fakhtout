<?php include 'Include/header.php';?>
	<?php 
	require_once("Model/Article.class.php");
	require_once("Control/get_article.php");
	$article = get_article($_GET['id']);
	 ?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
				<?php include 'Include/side.php';?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img class="product-img" src="article_pic/<?php echo $article->id; ?>" alt="" />
							</div>
							

						</div>
						<div class="col-sm-7">
							<?php
                            if(!empty($_GET['notif'])) {
                             if($_GET['notif'] == "added") { ?>
                            <li><div class="alert alert-success fade in">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Welcome</strong> Item Successfully added
                            </div></li>
                            <?php } 
                            }?>
							<div class="product-information"><!--/product-information-->
								<h2><?php echo $article->name ?></h2>
								<img src="images/product-details/rating.png" alt="" />
								<form method="GET" action="Control/add_to_cart.php">
								<span>
									<span> <?php echo $article->price ?> TND</span>
									<label>Quantity:</label>
									
									<input type="text" name="qty" value="3" />
									<input name="id" type="hidden" value="<?php echo $article->id; ?>"></input>
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
									</form>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> <?php echo $article->brand ?></p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#similar" data-toggle="tab">Similar products</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
							<p><?php echo $article->description ?></p>
							</div>
							<div class="tab-pane fade" id="similar" >
									<div class="content">
										<?php 
											require 'Control/get_articles.php';
											$cat = isset($_GET['cat']) ? $_GET['cat'] : $article->category;
											$articles = get_articles($cat);
											shuffle($articles);
											$i = 0 ;
											foreach ($articles as $article) {
										?>
				
											<div class="one_entry">
											
												<div class="product-image-wrapper">
													<div class="single-products">
														<div class="productinfo text-center">
															<img class="product-img" src="article_pic/<?php echo $article->id; ?>" alt="" />
															<h2><?php echo $article->price; ?> TND</h2>
															<p><?php echo substr($article->description,0,100).'...'; ?></p>
															<div class="item-details">
																<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
																<a href="product-details.php?id=<?php echo $article->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-plus-square" aria-hidden="true"></i>Details</a>
															</div>
															<div class="gap"></div>
														</div>
														
														<div class="product-overlay">
															<div class="overlay-content">
																<h2><?php echo $article->price; ?> TND</h2>
																<p><?php echo $article->description; ?></p>
																<div>
																	<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
																	<a href="product-details.php?id=<?php echo $article->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-plus-square" aria-hidden="true"></i>Details                </a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											
				
										<?php } ?>
							</div>
						
							
							
							
						</div>
					</div>
					<!--/category-tab-->
					

					
				</div>
			</div>
		</div>
	</section>

		
	<?php include 'Include/footer.php';?>