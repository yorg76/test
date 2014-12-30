<div class="row profile-account">	
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1-1">
				<i class="fa fa-cog"></i>Usuwanie teczki <?php echo $bulkpackaging->name; ?> z wirtualnej teczki</a>
				<span class="after">
				</span>
			</li>

		</ul>
	</div>
	<div class="col-md-9">
		<form enctype="multipart/form-data" role="form" action="/virtualbriefcase/bulkpackaging_remove/<?php echo $bulkpackaging->id; ?>" method="POST" id="remove_bulkpackaging_form">
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">
			<div class="form-group">
						<label class="control-label">Nazwa
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<input type="text" placeholder="Nazwa" class="form-control" name="name" value="<?php echo $bulkpackaging->name; ?>" DISABLED/>
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Opis
							<span class="required" aria-required="true"> * </span>
						</label>
						<textarea class="form-control" name="description" DISABLED><?php echo $bulkpackaging->description; ?></textarea>
						<span class="help-block"></span>
					</div>
				<div id="tab_1-1" class="tab-pane active">
					<div class="form-group">
						<label class="control-label">Wybór wirtualnej teczki
							</label>
						<div class="input-icon right">
							<select class="form-control" name="virtualbriefcase_id">
								<option value="">-- Wybierz teczkę --</option>
								<?php foreach ($virtualbriefcases as $virtualbriefcase):?>
								<?php 
											echo "<option value=\"".$virtualbriefcase->id."\">".$virtualbriefcase->name."</option>";
								?>
								<?php endforeach;?>
							</select>
							<span class="help-block">Wybierz wirtualną teczkę, z której  chcesz usunąć wybrany element.</span>
						</div>
					</div>
					
					
					<br/>
					<div class="margiv-top-10">
						<input type="hidden" value="<?php echo $bulkpackaging->id ?>" name="bulkpackaging_id" />
						<a href="/virtualbriefcase/virtualbriefcase_view/<?php echo $virtualbriefcase->id; ?>" class="btn green" id="submit">
						Usuń opakowanie</a>
						<a href="/virtualbriefcase/virtualbriefcase_view/<?php echo $virtualbriefcase->id; ?>" class="btn default" id="cancel">
						Anuluj</a>
					</div>
				</div>	
			</div>
		</form>
	</div>
<!--end col-md-9-->
</div>

