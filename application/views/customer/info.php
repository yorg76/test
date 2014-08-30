<div class="row profile">
				<div class="col-md-12">
					<!--BEGIN TABS-->
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_1" data-toggle="tab">
								Ogólne </a>
							</li>
							<li>
								<a href="#tab_1_3" data-toggle="tab">
								Statystyki </a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
									<div class="col-md-3">
										<ul class="list-unstyled profile-nav">
											<li>
												<img src="<?php echo ASSETS_ADMIN_PAGES_MEDIA ?>profile/profile-img.png" class="img-responsive" alt="">
											</li>
											<li>
												<a href="#">
												Informacje systemowe <span>
												3 </span>
												</a>
											</li>
											<li>
												<a href="#">
												Helpdesk </a>
											</li>
											<li>
												<a href="/customer/edit/<?php echo $customer->id; ?>">
												Edycja </a>
											</li>
										</ul>
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-8 profile-info">
												<h1><?php echo $customer->name?></h1>
												<p>NIP:  <?php echo $customer->nip; ?></p>
												<p>REGON: <?php echo $customer->regon; ?></p>
												<p>
													<a href="<?php echo $customer->www;?>">
													<?php echo $customer->www;?> </a>
												</p>
												<ul class="list-inline">
													<li>
														<i class="fa fa-map-marker"></i> <?php echo $customer->addresses->where('address_type','=','firmowy')->find()->city;?>
													</li>
													<li>
														<i class="fa fa-calendar"></i> <?php echo $customer->create_date ?>
													</li>
												</ul>
											</div>
											<!--end col-md-8-->
											<div class="col-md-4">
												<div class="portlet sale-summary">
													<div class="portlet-title">
														<div class="caption">
															 Podsumowanie
														</div>
														<div class="tools">
															<a class="reload" href="javascript:;">
															</a>
														</div>
													</div>
													<div class="portlet-body">
														<ul class="list-unstyled">
															<li>
																<span class="sale-info">
																Magazyny <i class="fa fa-img-up"></i>
																</span>
																<span class="sale-num">
																<?php echo $warehouses_count; ?> </span>
															</li>
															<li>
																<span class="sale-info">
																Wirtualne teczki <i class="fa fa-img-down"></i>
																</span>
																<span class="sale-num">
																<?php echo $virtualbriefcases_count; ?> </span>
															</li>
															<li>
																<span class="sale-info">
																Pozycje</span>
																<span class="sale-num">
																<?php echo $boxes_count; ?> </span>
															</li>
															<li>
																<span class="sale-info">
																Dokumenty </span>
																<span class="sale-num">
																<?php echo $documents_count; ?> </span>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!--end col-md-4-->
										</div>
										<!--end row-->
										<div class="tabbable tabbable-custom tabbable-custom-profile">
										</div>
									</div>
								</div>
							</div>
							<!--tab_1_2-->
							<div class="tab-pane" id="tab_1_3">
								<div class="row profile-account">
									<div class="col-md-12">
										<div class="portlet solid yellow">
											<div class="portlet-title">
												<div class="caption">
													<i class="fa fa-gift"></i>Markers
												</div>
												<div class="tools">
													<a href="javascript:MapsGoogle.init();" class="reload">
													</a>
												</div>
											</div>
											<div class="portlet-body">
												<div id="gmap_marker" class="gmaps">
												</div>
											</div>
										</div>
									</div>
								</div>			
							</div>
							<!--end tab-pane-->
						</div>
					</div>
					<!--END TABS-->
				</div>
			</div>