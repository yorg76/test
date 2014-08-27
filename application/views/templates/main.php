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
					<form class="sidebar-search" action="/user/search" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Szukaj...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				
				<li class="start <?php if ($_controller=='user') echo "active open";?>">
					<a href="/user/dashboard">
					<i class="glyphicon glyphicon-dashboard"></i>
					<span class="title">Dashboard</span>
					<span class="arrow <?php if ($_controller=='user') echo "open";?>"></span>
					</a>
				</li>
				<li class="<?php if ($_controller=='admin') echo "active open";?>">
					<a href="/admin/index">
					<i class="icon-user"></i>
					<span class="title">Administracja</span>
					<span class="selected"></span>
					<span class="arrow <?php if ($_controller=='admin') echo "open";?>"></span>
					</a>
					<ul class="sub-menu">
						<li class="<?php if ($_action=='customers') echo "active";?>">
							<a href="/admin/customers">
							<i class="icon-list"></i>
							Lista klientów</a>
						</li>
						<li class="<?php if ($_action=='users') echo "active";?>">
							<a href="/admin/users">
							<i class="icon-list"></i>
							Lista użytkowników</a>
						<li class="<?php if ($_action=='user_add') echo "active";?>">
							<a href="/admin/user_add">
							<i class="icon-user"></i>
							Dodaj nowego</a>
						</li>
						</li>
					</ul>
				</li>
				<li class="<?php if ($_controller=='customer') echo "active open";?>">
					<a href="/customer/index">
					<i class="icon-basket"></i>
					<span class="title">Klient</span>
					<span class="selected"></span>
					<span class="arrow <?php if ($_controller=='customer') echo "open";?>"></span>
					</a>
					<ul class="sub-menu">
						<li class="<?php if ($_action=='users') echo "active";?>">
							<a href="/customer/users">
							<i class="icon-list"></i>
							Lista użytkowników</a>
						</li>
						<li class="<?php if ($_action=='divisions') echo "active";?>">
							<a href="/customer/divisions">
							<i class="icon-list"></i>
							Lista działów</a>
						</li>
						<li class="<?php if ($_action=='info') echo "active";?>">
							<a href="/customer/info">
							<i class="icon-notebook"></i>
							Informacje o firmie</a>
						</li>	
						<li class="<?php if ($_action=='edit') echo "active";?>">
							<a href="/customer/edit">
							<i class="icon-globe"></i>
							Edycja danych firmowych</a>
						</li>
					</ul>
				</li>
				<li class="<?php if ($_controller=='warehouse') echo "active open";?>">
					<a href="/warehouse/index">
					<i class="icon-grid"></i>
					<span class="title">Magazyn</span>
					<span class="selected"></span>
					<span class="arrow <?php if ($_controller=='warehouse') echo "open";?>"></span>
					</a>
					<ul class="sub-menu">
						<li class="<?php if ($_action=='warehouse') echo "active";?>">
							<a href="/warehouse/warehouses">
							<i class="icon-layers"></i>
							Magazyny</a>
						</li>
						<li class="<?php if ($_action=='box') echo "active";?>">
							<a href="/warehouse/boxes">
							<i class="glyphicon glyphicon-inbox"></i>
							Pozycje</a>
							<ul class="sub-menu">
								<li class="<?php if ($_action=='boxes') echo "active";?>">
									<a href="/warehouse/boxes">
									<i class="icon-list"></i>
									Lista pozycji</a>
								</li>
								<li class="<?php if ($_action=='documents') echo "active";?>">
									<a href="/warehouse/documents">
									<i class="icon-pencil"></i>
									Dokumenty</a>
								</li>
								<li class="<?php if ($_action=='documentlists') echo "active";?>">
									<a href="/warehouse/documentlists">
									<i class="glyphicon glyphicon-list-alt"></i>
									Listy dokumentów</a>
								</li>	
								<li class="<?php if ($_action=='bulkpackagings') echo "active";?>">
									<a href="/warehouse/bulkpackagings">
									<i class="glyphicon glyphicon-th"></i>
									Opakowania zbiorcze</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="/warehouse/boxes_search">
							<i class="icon-directions"></i>
							Wyszukaj pozycję</a>
						</li>
						<li>
							<a href="/warehouse/document_search">
							<i class="icon-magnifier"></i>
							Wyszukaj dokument</a>
						</li>
						<li>
							<a href="/warehouse/add">
							<i class="icon-docs"></i>
							Dodaj...</a>
						</li>
					</ul>
				</li>
				<li class="<?php if ($_controller=='virtualbriefcase') echo "active open";?>">
					<a href="/virtualbriefcase/index">
					<i class="icon-briefcase"></i>
					<span class="title">
					Wirtualne teczki </span>
					<span class="arrow <?php if ($_controller=='virtualbriefcase') echo "open";?>">
					</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="/virtualbriefcase/add">
							<i class="icon-note"></i>
							Dodaj</a>
						</li>
						<li>
							<a href="/virtualbriefcase/remove">
							<i class="icon-trash"></i>
							Usuń</a>
						</li>
						<li>
							<a href="/virtualbriefcase/modify">
							<i class="icon-loop"></i>
							Zmień</a>
						</li>
					</ul>
				</li>
				<li class="<?php if ($_controller=='order') echo "active open";?>">
					<a href="/order/index">
					<i class="icon-calculator"></i>
					<span class="title">Zamówienia</span>
					<span class="arrow <?php if ($_controller=='orders') echo "open";?>"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="/order/new">
							<i class="icon-basket"></i>
							Nowe</a>
						</li>
						<li>
							<a href="/order/inprogress">
							<i class="icon-basket-loaded"></i>
							W trakcie</a>
						</li>
						<li>
							<a href="/order/new">
							<i class="icon-cup"></i>
							Zrealizowane</a>
						</li>
						<li>
							<a href="/order/search">
							<i class="icon-direction"></i>
							Szukaj</a>
						</li>						
					</ul>
				</li>

				
				<li class="<?php if ($_controller=='finance') echo "active open";?>">
					<a href="/finance/index">
					<i class="icon-diamond"></i>
					<span class="title">Finanse</span>
					<span class="arrow <?php if ($_controller=='finance') echo "open";?>"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="/finance/prices">
							<i class="icon-list"></i>
							Cenniki</a>
						</li>
						<li>
							<a href="/finance/invoices">
							<i class="icon-doc"></i>
							Faktury</a>
						</li>
					</ul>
				</li>
				<li class="<?php if ($_controller=='report') echo "active open";?>">
					<a href="/report/index">
					<i class="icon-puzzle"></i>
					<span class="title">Raporty</span>
					<span class="arrow <?php if ($_controller=='report') echo "open";?>"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="/report/index">
							<i class="icon-bar-chart"></i>
							Raport 1</a>
						</li>
					</ul>
				</li>
		
				<li class="<?php if ($_controller=='profile') echo "active open";?>">
					<a href="/profile/index">
					<i class="icon-user"></i>
					<span class="title">Profil</span>
					<span class="arrow <?php if ($_controller=='profile') echo "open";?>"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="/profile/index">
							<i class="icon-ghost"></i>
							Edytuj dane</a>
						</li>
						<li>
							<a href="/profile/password">
							<i class="icon-shield"></i>
							Zmień hasło</a>
						</li>
						<li>
							<a href="/default/logout">
							<i class="icon-logout"></i>
							Wyloguj</a>
						</li>									
					</ul>
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
					<?php echo ucfirst(__($_controller)); ?> <small><?php echo ucfirst(__($_action)); ?></small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="/user/dashboard">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>						
						<?php foreach($bread as $element):?>
						<li>
							<a href="#"><?php echo $element; ?></a>
							<i class="fa fa-angle-right"></i>
						</li>
						<?php endforeach;?>
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
	 <?php echo date('Y')?> &copy; BSDterminal.
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