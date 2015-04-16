<div class="row">
	<div class="col-md-12">
		<div class="tabbable tabbable-custom tabbable-full-width">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#tab_box"> Wyszukaj
						pudło</a></li>
				<li><a data-toggle="tab" href="#tab_document"> Wyszukaj dokument</a>
				</li>
			</ul>

			<div class="tab-content">
				<div id="tab_box" class="tab-pane active">
					<h4>Dane pudła</h4>
					<form class="form" role="form" action="/warehouse/boxes_search_result"
						method="POST" id="search_box_form">
						<div class="alert alert-danger display-hide">
							<button class="close" data-close="alert"></button>
							<span>Popraw błędy w formularzu</span>
						</div>
						<div class="form-group">
							<label class="control-label">Magazyn
							</label>
							<div class="input-icon right">
								<select class="form-control input-large" name="warehouse_id">
									<option value="">-- Wybierz magazyn --</option>
											<?php foreach ($warehouses as $warehouse):?>
											<?php
												echo "<option value=\"" . $warehouse->id . "\">" . $warehouse->name . "</option>";
												?>
											<?php endforeach;?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Kategoria przechowywania 
							</label>
							<div class="input-icon right">
								<select class="form-control input-large" name="storage_category_id">
									<option value="">-- Wybierz kategorię --</option>
											<?php foreach ($storagecategories as $storagecategory):?>
											<?php
												echo "<option value=\"" . $storagecategory->id . "\">" . $storagecategory->name . "</option>";
												?>
											<?php endforeach;?>
										</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Data początku magazynowania 
							</label>
							<div
								class="input-group input-medium date date-picker margin-bottom-5"
								data-date-format="yyyy-mm-dd">
								<input type="text" class="form-control form-filter input-sm"
									readonly name="date_from" placeholder="Od"> <span
									class="input-group-btn">
									<button class="btn btn-sm default" type="button">
										<i class="fa fa-calendar"></i>
									</button>
								</span>
							</div>
							<span class="help-block"></span>
						</div>
						<div class="form-group">
							<label class="control-label">Data końca magazynowania 
							</label>
							<div
								class="input-group input-medium date date-picker margin-bottom-5"
								data-date-format="yyyy-mm-dd">
								<input type="text" class="form-control form-filter input-sm"
									readonly name="date_to" placeholder="Do" size="16"> <span
									class="input-group-btn">
									<button class="btn btn-sm default" type="button">
										<i class="fa fa-calendar"></i>
									</button>
								</span>
							</div>
							<span class="help-block"></span>
						</div>
						<div class="form-group">
							<label class="control-label">Data odbioru 
							</label>
							<div
								class="input-group input-medium date date-picker margin-bottom-5"
								data-date-format="yyyy-mm-dd">
								<input type="text" class="form-control form-filter input-sm"
									readonly name="date_reception" placeholder="Termin odbioru"
									size="16"> <span class="input-group-btn">
									<button class="btn btn-sm default" type="button">
										<i class="fa fa-calendar"></i>
									</button>
								</span>
							</div>
							<span class="help-block"></span>
						</div>
						<div class="form-group">
							<label class="control-label">Kod kreskowy
							</label> <input type="text" class="form-control input-large"
								id="barcode" placeholder="Opis" name="barcode"> <span class="help-block"></span>
						</div>

						<div class="form-group">
							<label class="control-label">Opis
							</label> <input type="text" class="form-control input-large"
								id="description" placeholder="Opis" name="description"> <span class="help-block"></span>
						</div>
						<button type="submit" class="btn green">
							Szukaj &nbsp; <i class="m-icon-swapright m-icon-white"></i>
						</button>

					</form>
					<br> <br>

				</div>
				<!--end tab-pane-->
				<!--end tab-pane-->
				<div id="tab_document" class="tab-pane">
					<div class="row">
						<div class="col-md-8">
							<div class="document">
								<h4>Dane dokumentu</h4>
								<form class="form" role="form"
									action="/warehouse/documents_search_result" method="POST"
									id="search_document_form">
									<div class="alert alert-danger display-hide">
									<button class="close" data-close="alert"></button>
									<span>Popraw błędy w formularzu</span>
									</div>
									<div class="form-group">
										<label class="control-label">Nazwa <span class="required" aria-required="true"> * </span>
										</label> <input type="text" class="form-control input-large" id="name" name="name"
											placeholder="Nazwa"> <span class="help-block"></span>
									</div>
									<div class="form-group">
										<label class="control-label">Opis
										</label> <input	type="text" class="form-control input-large" id="description" name="description"
											placeholder="Opis"> <span class="help-block"></span>
									</div>
									<button type="submit" class="btn green">
										Szukaj &nbsp; <i class="m-icon-swapright m-icon-white"></i>
									</button>

								</form>
							</div>
							<br> <br>

						
						</div>
						<!--end tab-pane-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div></div>
