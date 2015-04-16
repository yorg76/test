<div class="row profile-account">	
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1-1">
				<i class="fa fa-cog"></i>Nowa lista dokumentów</a>
				<span class="after">
				</span>
			</li>

		</ul>
	</div>
	<div class="col-md-9">
		<form role="form" action="/warehouse/documentlist_add" method="POST" id="add_documentlist_form">
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">
			
				<div id="tab_1-1" class="tab-pane active">
				<div class="form-group">
						<label class="control-label">Wybór pudła
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<select class="form-control" name="box_id">
								<option>-- Wybierz pudło dla listy dokumentów --</option>
								<?php foreach ($boxes as $box):?>
								<?php 
									if($box->id == $box_id) {
										$checked = "selected=\"true\"";
									}else {
										$checked = "";
									}
											echo "<option value=\"".$box->id."\"".$checked." >".$box->id."</option>";
								?>
								<?php endforeach;?>
							</select>
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label">Nazwa
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<input type="text" placeholder="Nazwa" class="form-control" name="name" value="" />
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Opis
							<span class="required" aria-required="true"> * </span>
						</label>
						<textarea class="form-control" name="description" placeholder="Opis listy dokumentów"></textarea>
						<span class="help-block"></span>
					</div>
					<br/>
					<input type="hidden" value="<?php echo $box->id ?>" name="box_id" />
					<div class="margiv-top-10">
						<a href="/warehouse/documentlists" class="btn green" id="submit">
						Zapisz zmiany</a>
						<a href="/warehouse/documentlists" class="btn default" id="cancel">
						Anuluj</a>
					</div>
				</div>	
			</div>
		</form>
	</div>
	<!--end col-md-9-->
</div>