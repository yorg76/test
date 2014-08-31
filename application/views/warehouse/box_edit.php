<div class="row profile-account">	
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1-1">
				<i class="fa fa-cog"></i>Edycja pozycji</a>
				<span class="after">
				</span>
			</li>
		</ul>
	</div>
	<div class="col-md-9">
		<form role="form" action="/warehouse/box_edit" method="POST" id="add_box_form">
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
										if ($box->storagecategory->id == $storagecategory->id) $checked=" selected=\"true\"";
										else $checked="";
										
										echo "<option value=\"".$storagecategory->id."\"".$checked." >".$storagecategory->name."</option>";

								?>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Data początku magazynowania
							<span class="required" aria-required="true"> * </span>
						</label>
							<div class="input-group input-medium date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
								<input type="text" class="form-control form-filter input-sm" readonly name="date_from" value="<?php echo $box->date_from;?>">
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
							<div class="input-group input-medium date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy" data-date-start-date="+0d">
								<input type="text" class="form-control form-filter input-sm" readonly name="date_to" value="<?php echo $box->date_to;?>">
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
							<div class="input-group input-medium date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy" data-date-start-date="+0d">
								<input type="text" class="form-control form-filter input-sm" readonly name="date_reception" value="<?php echo $box->date_reception;?>">
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
										if ($box->warehouse->id == $warehouse->id) $checked=" selected=\"true\"";
										else $checked="";
										
										echo "<option value=\"".$warehouse->id."\"".$checked." >".$warehouse->name."</option>";

								?>
								<?php endforeach;?>
							</select>
						</div>
					</div>				
					<div class="form-group">
						<label class="control-label">Status blokady
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon">
							<i class="fa fa-lock fa-fw"></i>
							<input id="lock" class="form-control" type="text" name="lock" value="<?php echo $box->lock;?>">
						</div>
					</div>
		
					<div class="form-group">
						<label class="control-label">Status plomby
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon">
							<i class="fa fa-lock fa-fw"></i>
							<input id="seal" class="form-control" type="text" name="seal" value="<?php echo $box->seal;?>">
						</div>
					</div>		
					<br/>
					<br/>
					<div class="margiv-top-10">
						<a href="/warehouse/boxes/" class="btn green" id="submit">
						Zapisz zmiany</a>
						<a href="/warehouse/boxes/" class="btn default" id="cancel">
						Anuluj</a>
					</div>
				</div>	
			</div>
		</form>
	</div>
	<!--end col-md-9-->
</div>