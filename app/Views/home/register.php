<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Yinka Enoch Adedokun">
        <title>Registration Page</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/login.css">
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
        <script src="https://code.iconify.design/iconify-icon/1.0.5/iconify-icon.min.js"></script>
    </head>
    <body>
	<!-- Main Content -->
	<div class="container">
		<div class=" main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				<span class="company__info"><h2><iconify-icon inline icon="game-icons:wolf-howl" style="font-size: 100px;"></iconify-icon></h2></span>
				<!-- <h4 class="company_title">Your Company Logo</h4> -->
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row">
						<h2>Register</h2>
					</div>
					<div class="row">
						<form method="post" class="form-group" action="/account">
							<div class="row">
							<?php 
								foreach($accounts as $account){
								$name = $account->NAME;
								$accountType = $account->ACCOUNT_TYPE;
								$username = $account->USERNAME;
								$password = $account->PASSWORD;
								}
							?>
                        	
                        <tr>
							<input type="radio" id="admin" value = "1" name="accountType" required>
							<label for="admin">Admin</label>

							<input type="radio"  id="user" value = "0" name="accountType" required>
							<label for="user">User</label>
							</div>

							<div class="row">
								<input type="text" name="name" id="name" class="form__input" placeholder="Complete Name" 
								 required>
							</div>

							<div class="row">
								<input type="text" name="username" id="username" class="form__input" placeholder="Username">
							</div>

							<div class="row">
								<!-- <span class="fa fa-lock"></span> -->
								<input type="password" name="password" id="password" class="form__input" placeholder="Password">
							</div>

							<div class="row">
								<input type="submit" value="Register" class="btn">
							</div>				
						</form>

						<?php if (session()->has('max_error')) : ?>
							<div class="alert alert-danger w-100">
								<?php echo session()->get("max_error");?>
                 			</div>
             			<?php endif; ?>

						 <?php if (session()->has('reg_added')) : ?>
							<div class="alert alert-success w-100">
								<?php echo session()->get("reg_added");?>
                 			</div>
             			<?php endif; ?>

					</div>
					<div class="row">
						<p>Already have an account? <a href="<?php echo base_url("login"); ?>">Log in here</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<div class="container-fluid text-center footer">
		<!-- Coded with &hearts; by <a href="https://bit.ly/yinkaenoch">Yinka.</a></p> -->
	</div>
</body>
</html>
