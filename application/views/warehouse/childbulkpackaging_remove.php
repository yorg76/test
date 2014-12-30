<div class="row profile-account">
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active"><a data-toggle="tab" href="#tab_1-1"> <i
					class="fa fa-cog"></i>Usuwanie teczki <?php echo $childbulkpackaging->name; ?></a>
				<span class="after"> </span></li>

		</ul>
	</div>
	<div class="col-md-9">
		<form enctype="multipart/form-data" role="form"
			action="/warehouse/childbulkpackaging_remove/<?php echo $childbulkpackaging->id; ?>"
			method="POST" id="remove_childbulkpackaging_form">
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">
				<div class="form-group">
					<label class="control-label">Nazwa <span class="required"
						aria-required="true"> * </span>
					</label>
					<div class="input-icon right">
						<input type="text" placeholder="Nazwa" class="form-control"
							name="name" value="<?php echo $childbulkpackaging->name; ?>" DISABLED />
						<span class="help-block"></span>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Opis <span class="required"
						aria-required="true"> * </span>
					</label>
					<textarea class="form-control" name="description" DISABLED><?php echo $childbulkpackaging->description; ?></textarea>
					<span class="help-block"></span>
				</div>
				<div id="tab_1-1" class="tab-pane active">
					<div class="form-group">
						<label class="control-label">Wybór teczki <span class="required"
						aria-required="true"> * </span></label>
						<div class="input-icon right">
							<select class="form-control" name="bulkpackaging1_id">
								<option value="">-- Wybierz opakowanie --</option>
								<?php foreach ($bulkpackagings as $bulkpackaging):?>
								<?php
									echo "<option value=\"" . $bulkpackaging->id . "\">" . $bulkpackaging->name . "</option>";
									?>
								<?php endforeach;?>
							</select> 
							<span class="help-block">Wybierz teczkę, z
								którego chcesz usunąć wybrany element.</span>
						</div>
					</div>


					<br />
					<div class="margiv-top-10">
						<input type="hidden" value="<?php echo $childbulkpackaging->id ?>" name="bulkpackaging2_id" /> 
						<a href="/warehouse/bulkpackaging_view/<?php echo $bulkpackaging->id; ?>" class="btn green" id="submit"> Usuń opakowanie</a>
						<a href="/warehouse/bulkpackaging_view/<?php echo $bulkpackaging->id; ?>" class="btn default" id="cancel"> Anuluj</a>
					</div>
				</div>
			</div>
		</form>
	</div>
	<!--end col-md-9-->
</div>

