<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="glyphicon glyphicon-inbox"></i>Klienci
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body">
								
							<table class="table table-striped table-hover table-bordered" id="invoice_add">
							<thead>
							<tr>
								<th width="35%">
									Klient
								</th>
								<th>
									Data ostaniej f-vat
								</th>
								<th>
									Suma mag. m-czna netto
								</th>
								<th>
									Suma mag. m-czna brutto
								</th>
								<th>
									Akcje
								</th>
							</tr>
							</thead>
							<tbody>

							<?php foreach ($customers as $customer):
							
							?>
							
							<tr>
								<td style="width:10%">
									<?php echo $customer->name;?>
								</td>
								<td>
									<?php echo ($customer->invoices->order_by('invoice_date','desc')->limit(1)->find()->invoice_date != NULL ? $customer->invoices->order_by('invoice_date','desc')->limit(1)->find()->invoice_date : "BRAK");?>
								</td>
								<td>
									<?php 
										/*$customer_users= $customer->users->find_all();
										$users_ids = array();
										$sum = 0;
										
										foreach ($customer_users as $cu) {
											array_push($users_ids, $cu->id);
										}
										
										
										
										if(count($users_ids) > 0) {
											$orders_per_month=ORM::factory('Order')->where('user_id','IN',$users_ids)->and_where(DB::expr("MONTH(create_date)"),'=',date('m'))->find_all();
											
											foreach ($orders_per_month as $opm) {
												$sum += $opm->final_price;
											}
											
										}else {
											$orders_per_month=array();
										}

										echo Pricetable::money($sum); */

									
									$customer_divisions= $customer->divisions->find_all();
									$divisions_ids = array();
									$sum = 0;
									
									foreach ($customer_divisions as $div ) {
									array_push($divisions_ids, $div->id);
									}
									
									
									
									if(count($divisions_ids) > 0) {
										$boxes_in_wh=ORM::factory('Box')->where('division_id','IN',$divisions_ids)->and_where('status','=','Na magazynie')->and_where('utilisation_status', '=', 0)->count_all();
										
										
									}else {
										$boxes_in_wh=0;
									}
									
									$sum = $boxes_in_wh * $customer->pricetables->where('active','=',1)->find()->boxes_storage;
									
									echo Pricetable::money($sum);
										
										
									?>
								</td>			
								<td>
									<?php echo Pricetable::money($sum*VAT);?>
								</td>	
								<td>
									<div class="margin-bottom-5">
										<a class="btn btn-xs green margin-bottom" href="/finance/invoice_add/<?php echo $customer->id;?>" target="_blank">
											<i class="glyphicon glyphicon-info-sign"></i> Akceptuj FVAT m-czną
										</a>
									</div>
								</td>
							</tr>
							<?php endforeach;?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT -->
		</div>
	</div>
