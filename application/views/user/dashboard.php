<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
 ?>
 
 <!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="glyphicon glyphicon-inbox"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $boxes; ?>
							</div>
							<div class="desc">
								Pudła w magazynach
							</div>
						</div>
						<a class="more" href="/warehouse/boxes">
						Więcej... <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $orders; ?>
							</div>
							<div class="desc">
								 Ilość zamówień
							</div>
						</div>
						<a class="more" href="/order/orders">
						Więcej... <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-group fa-icon-medium"></i>
						</div>
						<div class="details">
							<div class="number">
								 <?php echo $customers; ?>
							</div>
							<div class="desc">
								Klienci
							</div>
						</div>
						<a class="more" href="/admin/customers">
						Więcej... <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>