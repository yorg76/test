<div class="row profile-account">	
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1-1">
				<i class="fa fa-cog"></i>Nowe pudło</a>
				<span class="after">
				</span>
			</li>

		</ul>
	</div>
	<div class="col-md-9">
		<form role="form" action="/warehouse/box_add" method="POST" id="add_box_form">
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">
			
				<div id="tab_1-1" class="tab-pane active">
					
					<div class="form-group">
						<label class="control-label">Kategoria przechowywania
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<select class="form-control" name="storage_category_id">
								<option>-- Wybierz kategorię --</option>
								<?php foreach ($storagecategories as $storagecategory):?>
								<?php 
											echo "<option value=\"".$storagecategory->id."\">".$storagecategory->name."</option>";
								?>
								<?php endforeach;?>
							</select>
							
						</div>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Data początku magazynowania
							<span class="required" aria-required="true"> * </span>
						</label>
							<div class="input-group input-medium date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd" >
								<input type="text" class="form-control form-filter input-sm" readonly name="date_from" placeholder="Od">
								<span class="input-group-btn">
								<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
								</span>
							</div>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Data końca magazynowania
							<span class="required" aria-required="true"> * </span>
						</label>
							<div class="input-group input-medium date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
								<input type="text" class="form-control form-filter input-sm" readonly name="date_to" placeholder="Do" size="16">
								<span class="input-group-btn">
								<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
								</span>
							</div>
						<span class="help-block"></span>
					</div>					
					<div class="form-group">
						<label class="control-label">Data odbioru
							<span class="required" aria-required="true"> * </span>
						</label>
							<div class="input-group input-medium date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
								<input type="text" class="form-control form-filter input-sm" readonly name="date_reception" placeholder="Termin odbioru" size="16">
								<span class="input-group-btn">
								<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
								</span>
							</div>
							<span class="help-block"></span>
						</div>
					</div>		
					<div class="form-group">
						<label class="control-label">Magazyn
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<select class="form-control" name="warehouse_id">
								<option>-- Wybierz magazyn --</option>
								<?php foreach ($warehouses as $warehouse):?>
								<?php 
											echo "<option value=\"".$warehouse->id."\">".$warehouse->name."</option>";
								?>
								<?php endforeach;?>
							</select>
							
						</div>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Opis
						</label>
						<textarea class="form-control" name="description" placeholder="Opis pudła"></textarea>
						<span class="help-block"></span>
					</div>				
					<div class="form-group">
						<label class="control-label">Blokada 
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="checkbox-list">
											<label class="checkbox-inline">
											<input type="checkbox" name="lock" id="lock" value="1"> Tak </label>
											<label class="checkbox-inline">
											<input type="checkbox" name="lock" id="lock" value="0"> Nie </label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Kod kreskowy

						</label>
						<div class="input-icon">
							<i class="fa fa-lock fa-fw"></i>
							<input id="barcode" class="form-control" type="text" name="barcode" placeholder="">
						</div>
					</div>
		
					<div class="form-group">
						<label class="control-label">Kod plomby nr 1 

						</label>
						<div class="input-icon">
							<i class="fa fa-lock fa-fw"></i>
							<input id="seal" class="form-control" type="text" name="seal1" placeholder="">
						</div>
					</div>		
					<div class="form-group">
						<label class="control-label">Kod plomby nr 2 							
						</label>
						<div class="input-icon">
							<i class="fa fa-lock fa-fw"></i>
							<input id="seal" class="form-control" type="text" name="seal2" placeholder="">
						</div>
					</div>		
					
					<br/>
					<br/>
					<div class="margiv-top-10">
						<a href="/warehouse/boxes" class="btn green" id="submit">
						Zapisz zmiany</a>
						<a href="/warehouse/boxes" class="btn default" id="cancel">
						Anuluj</a>
					</div>
				</div>	
			</div>
		</form>
	</div>
	<!--end col-md-9-->