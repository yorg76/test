<div class="row profile-account">
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active"><a data-toggle="tab" href="#tab_1-1"> <i
					class="fa fa-cog"></i>Usuwanie wirtualnej teczki <?php echo $documentlist->name; ?> z wirtualnej teczki</a>
				<span class="after"> </span></li>

		</ul>
	</div>
	<div class="col-md-9">
		<form enctype="multipart/form-data" role="form"
			action="/virtualbriefcase/childvirtualbriefcase_remove/<?php echo $childvirtualbriefcase->id; ?>"
			method="POST" id="remove_childvirtualbriefcase_form">
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">

				<div id="tab_1-1" class="tab-pane active">
					<div class="form-group">
						<label class="control-label">Nazwa <span class="required"
							aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<input type="text" placeholder="Nazwa" class="form-control"
								name="name" value="<?php echo $childvirtualbriefcase->name; ?>"
								DISABLED /> <span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Opis <span class="required"
							aria-required="true"> * </span>
						</label>
						<textarea class="form-control" name="description" DISABLED><?php echo $childvirtualbriefcase->description; ?>
						</textarea>
						<span class="help-block"></span>
					</div>

					<div class="form-group">
						<label class="control-label">Wybór wirtualnej teczki<span
							class="required" aria-required="true"> * </span>
						</label> <span class="help-block"></span>
						<div class="input-icon right">
							<select class="form-control" name="virtualbriefcase1_id">
								<option value="">-- Wybierz teczkę --</option>
								<?php foreach ($virtualbriefcases as $virtualbriefcase):?>
								<?php
									echo "<option value=\"" . $virtualbriefcase->id . "\">" . $virtualbriefcase->name . "</option>";
									?>
								<?php endforeach;?>
							</select>

						</div>
					</div>


					<br />
					<div class="margiv-top-10">
						<input type="hidden"
							value="<?php echo $childvirtualbriefcase->id ?>"
							name="virtualbriefcase2_id" /> <a
							href="/virtualbriefcase/virtualbriefcase_view/<?php echo $virtualbriefcase->id; ?>"
							class="btn green" id="submit"> Usuń teczkę</a> <a
							href="/virtualbriefcase/virtualbriefcase_view/<?php echo $virtualbriefcase->id; ?>"
							class="btn default" id="cancel"> Anuluj</a>
					</div>
				</div>
			</div>
		</form>
	</div>
	<!--end col-md-9-->
</div>

