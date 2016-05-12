<?php include 'Include/header.php';?>
<?php require_once 'Control/get_article.php';?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Description</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php 
					if(!empty($user->cart->cart_array)) {
						$total = 0;
					foreach ($user->cart->cart_array as $cart_item) { 
						$total_per_article = 0;
						$article = get_article($cart_item['item_id']);
						$total_per_article = intval($article->price) *  intval($cart_item['quantity']);
						$total = $total + $total_per_article;
						?>
						<tr>
							<td class="cart_product">
								<img class="cart-img" src="article_pic/<?php echo $article->id; ?>" alt="" />
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $article->name ?> </a></h4>
							</td>
							<td class="cart_price">
								<p><?php echo $article->price ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="Control/add_to_cart.php?id=<?php echo $article->id ?>"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo  $cart_item['quantity'];  ?>" autocomplete="off" size="2">
									<a href="Control/remove_item_cart.php?del=<?php echo $article->id ?>" class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $total_per_article ?> TND</p>
							</td>
							<td class="cart_delete">
								<a href="Control/remove_item_cart.php?del=<?php echo $article->id ?>&all=yes " class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>

					<?php }} ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p></p>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span><?php if(isset($total)) {echo $total;} else { echo 0;} ?></span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span><?php if(isset($total)) {echo $total;} else { echo 0;} ?></span></li>
						</ul>
							<a class="btn btn-default update" href="Control/reset.php">Reset</a>
							<a class="btn btn-default check_out" href="Control/checkout.php">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
 <?php include 'Include/footer.php';?>