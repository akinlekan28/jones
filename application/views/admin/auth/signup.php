
<!DOCTYPE HTML>
<html>
<head>
<title>Edtel CMS | Signup</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo base_url()?>adminassets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?php echo base_url()?>adminassets/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url()?>adminassets/css/font-awesome.css" rel="stylesheet"> 
<script src="<?php echo base_url()?>adminassets/js/jquery.min.js"> </script>
<script src="<?php echo base_url()?>adminassets/js/bootstrap.min.js"> </script>
</head>
<body>
	<div class="login">
		<h1><a href="index.html">Edtel Admin</a></h1>
		<div class="login-bottom">
			<h2 class="text-center">Register</h2>
			<div class="col-md-6">
            <p class="text-center text-success"><?php if(isset($response)):?>
                                    <?php if($response == TRUE):?>
                                        <?php echo $message;?>
                                    <?php endif?>
                                    <?php if($response == FALSE):?>
                                        <?php echo $message . '<br><br>';?>
                                    <?php endif?>
                                <?php endif?> </p>
                                <form method="post">
                                <div class="login-mail">
					<input type="text" placeholder="First name" required="" name="firstname">
                    <i class="fa fa-user"></i>
                    <p><?php echo form_error('firstname')?></p>
                </div>
                <div class="login-mail">
					<input type="text" placeholder="Last name" required="" name="lastname">
                    <i class="fa fa-user"></i>
                    <p><?php echo form_error('lastname')?></p>
                </div>
                                <div class="login-mail">
					<input type="text" placeholder="Email" required="" name="email">
                    <i class="fa fa-envelope"></i>
                    <p><?php echo form_error('email')?></p>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Password" required="" name="password">
                    <i class="fa fa-lock"></i>
                    <p><?php echo form_error('password')?></p>
				</div>
                    </div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
                    <input type="submit" value="Submit" name="Submit">
                    </form>
					</label>
					<p>Already register</p>
				<a href="<?php echo site_url('auth')?>" class="hvr-shutter-in-horizontal">Login</a>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
		<!---->
<div class="copy-right">
<p class="copyright-text text-center">Made with <i style="color: red;" class="fa fa-heart heart"></i> by Akintola Olalekan.</p> </div>
	  
</body>
</html>
