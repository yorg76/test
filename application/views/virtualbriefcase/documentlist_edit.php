<div class="row profile-account">	
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1-1">
				<i class="fa fa-cog"></i>Edycja Listy dokumentów</a>
				<span class="after">
				</span>
			</li>

		</ul>
	</div>
	<div class="col-md-9">
		<form role="form" action="/virtualbriefcase/documentlist_edit/<?php echo $documentlist->id ?>" method="POST" id="add_documentlist_form">
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">
			
				<div id="tab_1-1" class="tab-pane active">
					<div class="form-group">
						<label class="control-label">Wybór wirtualnej teczki
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<select class="form-control" name="box_id">
								<option>-- Wybierz teczkę dla listy dokumentów --</option>
								<?php foreach ($virtualbriefcase as $virtualbriefcase):?>
									<?php 
										if ($virtualbriefcase->id == $id) $checked=" selected=\"true\"";
											else $checked="";
										echo "<option value=\"".$virtualbriefcase->id."\"".$checked." >".$virtualbriefcase->id."</option>";
								
									?>
								<?php endforeach;?>
							</select>
						</div>
					</div>	
					<input type="hidden" value="<?php echo $virtualbriefcase->id ?>" name="virtualbriefcase_id" />
					<div class="margiv-top-10">
						<a href="/virtualbriefcase/documentlists" class="btn green" id="submit">
						Zapisz zmiany</a>
						<a href="/virtualbriefcase/documentlists" class="btn default" id="cancel">
						Anuluj</a>
					</div>
				</div>	
			</div>
		</form>
	</div>
	<!--end col-md-9-->
</div>