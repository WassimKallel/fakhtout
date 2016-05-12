<?php include 'Include/header.php';?>
<?php require_once 'Control/get_article.php';?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Current Cart</h2>
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

					<?php }}
					else echo '<tr><td>empty cart</tr></td>'; ?>
					</tbody>
				</table>
			</div>
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
										<a class="btn btn-default check_out" href="checkout.php">Check Out</a>
								</div>
							</div>
						</div>
					</div>
				</section><!--/#do_action-->
			<div class="step-one">
				<h2 class="heading">History</h2>
			</div>
			<?php require_once 'Control/get_history.php';
			require_once 'Control/get_article.php';
			$history = get_history($user->id);
			foreach ($history as $i => $entry) {
			?>
			<h3><?php echo $entry['date']; ?></h3>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php $carts = $entry['cart'];
					$total = 0;
					foreach ($entry['cart']->cart_array as $k => $cart_item) { 
						$article = get_article($cart_item['item_id']);
						$total_per_article = intval($article->price) *  intval($cart_item['quantity']);
						$total = $total + $total_per_article;
						?>
						<tr>
							<td class="cart_product">
								<img class="cart-img" src="article_pic/<?php echo $article->id; ?>" alt="" /></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $article->name; ?></a></h4>
								<p></p>
							</td>
							<td class="cart_price">
								<p><?php echo $article->price ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<span><?php echo $cart_item['quantity']; ?></span>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $total_per_article ?> TND</p>
							</td>
						</tr>
						<?php } ?>
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td><?php if(isset($total)) {echo $total;} else { echo 0;} ?></td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span><?php if(isset($total)) {echo $total;} else { echo 0;} ?></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<?php } ?>
		</div>

	</section> <!--/#cart_items-->
 <?php include 'Include/footer.php';?>