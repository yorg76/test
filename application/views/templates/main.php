<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
 ?>
 
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

<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="/">
			<img src="<?php echo ASSETS_ADMIN_LAYOUT_IMG; ?>logo-big.png" alt="ArchiDOX" class="logo-default" />
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">

				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="<?php echo ASSETS_ADMIN_LAYOUT_IMG; ?>avatar.png"/>
					<span class="username">
					<?php echo $user->username; ?> </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="/user/profile">
							<i class="icon-user"></i> Mój profil </a>
						</li>
						<li>
							<a href="/user/calendar">
							<i class="icon-calendar"></i> Mój kalendarz</a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="/default/logout">
							<i class="icon-logout"></i> Wyloguj </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search" action="/search" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" name="query" placeholder="Szukaj...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>

				<?php foreach ($acls as $acl):?>
					
					<?php if($acl->menu==1 &&  $acl->parent==0 && $acl->checkRights()):?>
					<li class="<?php if ($_controller==$acl->controller) echo "active open";?>">
						<a href="<?php echo $base.$acl->controller?>/<?php echo $acl->action?>">
							<i class="<?php echo $acl->icon?>"></i>
							<span class="title"><?php echo $acl->description?></span>
							<span class="arrow <?php if ($_controller==$acl->controller) echo "open";?>"></span>
						</a>
							<?php if($acl->has_children() > 0):?>
								<ul class="sub-menu">
									<?php foreach($acl->children() as $sub_m):?>
									<?php if($sub_m->checkRights()):?>
									<li class="<?php if ($_action==$sub_m->action) echo "active";?>">
										<a href="<?php echo $base.$acl->controller; ?>/<?php echo $sub_m->action; ?>">
										<i class="<?php echo $sub_m->icon; ?>"></i>
											<?php echo $sub_m->description;?></a>
										
										<?php if($sub_m->has_children() > 0):?>
											<ul class="sub-menu" <?php if ($_action=='boxes' || $_action=='documents' || $_action=='documentlists' || $_action=='bulkpackagings') echo "style=\"display:block;\"" ?> >
											<?php foreach($sub_m->children() as $sub_m_sub):?>
												<?php if($sub_m_sub->checkRights()):?>
												<li class="<?php if ($_action==$sub_m_sub->action) echo "active";?>">
												
													<a href="<?php echo $base.$acl->controller; ?>/<?php echo $sub_m_sub->action; ?>">
													<i class="<?php echo $sub_m_sub->icon; ?>"></i>
														<?php echo $sub_m_sub->description;?></a>
												</li>		
												<?php endif;?>
											<?php endforeach;?>
											</ul>
										<?php endif;?>
									</li>
									<?php endif;?>
									<?php endforeach;?>
								</ul>
							<?php endif;?>
					</li>
					<?php endif;?>
				<?php endforeach;?>
				<li>
					<br />
				</li>
				<li style="text-align: center; background-color:white;">
					<img alt="Innowacyjna Gospodarka" src="/public/images/ig.jpg" style="height: 41px;">
				</li>
				<li style="text-align: center; background-color:white;">
					<img alt="PARP" src="/public/images/parp.jpg" style="height: 41px;">
				</li>
				<li style="text-align: center; background-color:white;">
					<img alt="Unia Europejska" src="/public/images/eu.jpg" style="height: 41px;">
				</li>
			</ul>
			
			 
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
				
					<?php echo View::factory('messages')->render(); ?>
					
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					<?php echo ucfirst(__($_controller)); ?> <small></small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="/user/dashboard"><?php echo ucfirst(Auth_ORM::instance()->get_user()->username); ?></a>
							<i class="fa fa-angle-right"></i>
						</li>						
						
						<li>
							<a href="<?php echo "/".$_controller."/".$_action.(Request::current()->param('id')!=NULL ? "/".Request::current()->param('id'):''); ?>"><?php echo ucfirst(__($_action)); ?></a>
							<?php echo (Request::current()->param('id')!=NULL ? '<i class="fa fa-angle-right"></i>'.Request::current()->param('id'):''); ?>
							
						</li>
						
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<?php echo $content; ?>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<div class="page-footer">
	<div class="page-footer-inner">
	 <?php echo date('Y')?> &copy; Archiwum Depozytowe Sp z o.o.
	</div>
	<div class="page-footer-tools">
		<span class="go-top">
		<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
<br />
<?php echo $footer; ?>

<script>

        jQuery(document).ready(function() {
        	<?php echo $init; ?>    
        });
</script>
</body>
</html>
