<div class="row">
	<div class="col-md-12">
			<div class="row search-form-default">
				<div class="col-md-12">
					<form class="form-inline" action="#">
						<div class="input-group">
							<div class="input-cont">
								<input type="text" placeholder="Szukaj..." class="form-control">
							</div>
							<span class="input-group-btn">
							<button type="button" class="btn green">
							Szukaj &nbsp; <i class="m-icon-swapright m-icon-white"></i>
							</button>
							</span>
						</div>
					</form>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-hover table-bordered" id="orders_list">
				<thead>
				<tr>
					<th>
						 ID
					</th>
					<th>
						Data
					</th>
					<th>
						 Typ
					</th>
					<th>
						Status
					</th>
					<th>
						Adres
					</th>								
				</tr>
				</thead>
				<tbody>
				<?php foreach ($orders as $order):?>
				
				<tr>
					<td>
						 <a href="/order/view_order/<?php echo $order->id ?>" style="color: black;"><?php echo $order->id;?></a>
					</td>
					<td>
						 <a href="/order/view_order/<?php echo $order->id ?>" style="color: black;"><?php echo $order->create_date;?></a>
					</td>
					<td>
						 <a href="/order/view_order/<?php echo $order->id ?>" style="color: black;"><?php echo $order->type;?></a>
					</td>
					<td>
						 <a href="/order/view_order/<?php echo $order->id ?>" style="color: black;"><?php echo $order->status;?></a>
					</td>			
					<td>
						 <a href="/order/view_order/<?php echo $order->id ?>" style="color: black;"><?php echo $order->address->street;?> <?php echo $order->address->number;?> / <?php echo $order->address->flat;?> <?php echo $order->address->city;?>, <?php echo $order->address->postal;?></a>
					</td>											
				</tr>
				
				<?php endforeach;?>
				</tbody>
				</table>
			</div>
		<!--end tab-pane-->	
	</div>
</div>
