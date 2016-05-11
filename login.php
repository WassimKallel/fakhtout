	<?php include 'Include/header.php';?>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="Control/login.php" method="POST">
							<input type="text" name="pseudo" placeholder="Pseudo" />
							<input type="password" name="password" placeholder="Password" />
							<?php
                            if(!empty($_GET['err'])) {
                             if($_GET['err'] == 1) { ?>
                            <div class="alert alert-danger fade in">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong></strong> Invalid Pseudo
                            </div>
                            <?php } 
                            else if($_GET['err'] == 2) { ?>
                            <div class="alert alert-danger fade in">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong></strong> Invalid Password
                            </div> 
                             <?php } 
                            }?>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>

						<form action="Control/signup.php" method="POST">
							<input type="text" name="name" placeholder="Name"/>
							<input type="text" name="pseudo" placeholder="Pseudo"/>
							<input type="password" name="password" placeholder="Password"/>
							<?php
                            if(!empty($_GET['err'])) {
                             if($_GET['err'] == 4) { ?>
                            <div class="alert alert-danger fade in">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong></strong> Type a valid pseudo
                            </div>
                            <?php } 
                            else if($_GET['err'] == 3) { ?>
                            <div class="alert alert-danger fade in">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong></strong> This pseudo already exists
                            </div> 
                             <?php } 
                            }?>
							<button type="submit" class="btn btn-default">Signup</button>
							
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
	<?php include 'Include/footer.php';?>
