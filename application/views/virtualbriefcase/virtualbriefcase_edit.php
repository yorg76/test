<div class="row profile-account">	
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1-1">
				<i class="fa fa-cog"></i>Edycja witrualnej teczki</a>
				<span class="after">
				</span>
			</li>

		</ul>
	</div>
	<div class="col-md-9">
		<form role="form" action="/virtualbriefcase/virtualbriefcase_edit/<?php echo $virtualbriefcase->id ?>" method="POST" id="add_virtualbriefcase_form">
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">
			
				<div id="tab_1-1" class="tab-pane active">
					
					<div class="form-group">
						<label class="control-label">Nazwa
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<input type="text" placeholder="Nazwa wirtualnej teczki" class="form-control" name="name" value="<?php echo $virtualbriefcase->name;?>" />
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Opis
							<span class="required" aria-required="true"> * </span>
						</label>
						<textarea class="form-control" name="description"><?php echo $virtualbriefcase->description;?></textarea>
					<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Dział
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<select class="form-control" name="division_id">
								<option>-- Wybierz dział --</option>
								<?php foreach ($divisions as $division):?>
								<?php 
										if ($virtualbriefcase->division->id == $division->id) $checked=" selected=\"true\"";
											else $checked="";
										echo "<option value=\"".$division->id."\"".$checked." >".$division->name."</option>";
								
								?>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					
					<br/>
					
					<div class="margiv-top-10">
						<a href="/virtualbriefcase/virtualbriefcases" class="btn green" id="submit">
						Zapisz zmiany</a>
						<a href="/virtualbriefcase/virtualbriefcases" class="btn default" id="cancel">
						Anuluj</a>
					</div>
				</div>	
			</div>
		</form>
	</div>
	<!--end col-md-9-->
</div>