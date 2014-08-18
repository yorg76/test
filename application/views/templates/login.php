<?php defined('SYSPATH') or die('No direct script access.');?>

<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
        <?php echo $header;	?>
        
</head>

<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->

<body class="<?php echo $body_class; ?>">

<!-- BEGIN LOGO -->
<div class="logo">
	<a href="/">
	<img src="<?php echo ASSETS_ADMIN_LAYOUT_IMG; ?>logo-big.png" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="default/login" method="post">
		<h3 class="form-title">Zaloguj do konta</h3>
		
		<?php echo View::factory('messages')->render(); ?>
		
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Wpisz nazwę użytkownika i hasło. </span>
		</div>
		
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Login</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Hasło</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			<input type="checkbox" name="remember" value="1"/> Zapamiętaj mnie </label>
			<button type="submit" class="btn blue pull-right">
			Zaloguj <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>

		<div class="forget-password">
			<h4>Zapomniałeś hasła ?</h4>
			<p>
				 Bez paniki, kliknij  <a href="javascript:;" id="forget-password">
				tutaj </a>
				aby zresetować hasło.
			</p>
		</div>

	</form>
	<!-- END LOGIN FORM -->
	
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="default/reset" method="post">
		<h3>Chcesz zresetować hasło ?</h3>
		<p>
			 Wpisz poniżej adres email przypisany do twojego konta.
		</p>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn">
			<i class="m-icon-swapleft"></i> Wróć </button>
			<button type="submit" class="btn blue pull-right">
			Wyślij <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
	
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 <?php echo date('Y')?> &copy; BSDterminal.
</div>
<!-- END COPYRIGHT -->

<?php echo $footer; ?>
<script>

		jQuery(document).ready(function() {     
		  	Metronic.init(); // init metronic core components
			Layout.init(); // init current layout
			QuickSidebar.init() // init quick sidebar
		  	Login.init();

	       	// init background slide images
	       	$.backstretch([
		        "<?php echo ASSETS_ADMIN_PAGES_MEDIA; ?>bg/1.jpg",
    		    "<?php echo ASSETS_ADMIN_PAGES_MEDIA; ?>bg/2.jpg",
    		    "<?php echo ASSETS_ADMIN_PAGES_MEDIA; ?>bg/3.jpg",
    		    "<?php echo ASSETS_ADMIN_PAGES_MEDIA; ?>bg/4.jpg"
		        ], {
		          fade: 1000,
		          duration: 8000
		    	}
		    );
		});
		
</script>
</body>
</html>
