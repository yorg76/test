<div class="row profile-account">	
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1-1">
				<i class="fa fa-cog"></i>Usuwanie pozycji <?php echo $box->id; ?> z wirtualnej teczki</a>
				<span class="after">
				</span>
			</li>

		</ul>
	</div>
	<div class="col-md-9">
		<form enctype="multipart/form-data" role="form" action="/virtualbriefcase/box_remove/<?php echo $box->id; ?>" method="POST" id="remove_box_form">
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">
			
				<div id="tab_1-1" class="tab-pane active">
					<div class="form-group">
						<label class="control-label">Numer
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<input type="text" placeholder="Nazwa" class="form-control" name="name" value="<?php echo $box->id; ?>" />
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Opis
							<span class="required" aria-required="true"> * </span>
						</label>
						<textarea class="form-control" name="description"><?php echo $box->description; ?>
						</textarea>
						<span class="help-block"></span>
					</div>
					
					<div class="form-group">
						<label class="control-label">Wybór wirtualnej teczki
							</label>
						<div class="input-icon right">
							<select class="form-control" name="virtualbriefcase_id">
								<option>-- Wybierz teczkę --</option>
								<?php foreach ($virtualbriefcases as $virtualbriefcase):?>
								<?php 
											echo "<option value=\"".$virtualbriefcase->id."\">".$virtualbriefcase->name."</option>";
								?>
								<?php endforeach;?>
							</select>
							<span class="help-block">Wybierz wirtualną teczkę, z której chcesz usunąć pozycję</span>
						</div>
					</div>
					
					
					<br/>
					<div class="margiv-top-10">
						<input type="submit" />
						<input type="hidden" value="<?php echo $box->id ?>" name="box_id" />
						<a href="/virtualbriefcase/boxes" class="btn green" id="submit">
						Usuń dokument</a>
						<a href="/virtualbriefcase/boxes" class="btn default" id="cancel">
						Anuluj</a>
					</div>
				</div>	
			</div>
		</form>
	</div>
<!--end col-md-9-->
</div>

