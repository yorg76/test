<div class="row profile-account">	
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1-1">
				<i class="fa fa-cog"></i>Drukowanie kodów kreskowych</a>
				<span class="after">
				</span>
			</li>
		</ul>
	</div>
	<div class="col-md-9">
		<form role="form" action="/warehouse/box_barcode_print" method="POST" id="barcodes_form" target="barcodes_frame">
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">
				<div id="tab_1-1" class="tab-pane active">
					<div class="form-group">
						<label class="control-label">Drukarka
						</label>
						<div class="input-icon right" id="qz_applet">
							<textarea class="form-control" name="qz_log" readonly="true" style="height: 200px;"></textarea>
							<applet id="qz" archive="<?php echo ASSETS_QZPRINT; ?>/qz-print.jar" name="QZ Print Plugin" code="qz.PrintApplet.class" width="55" height="55">
								<param name="jnlp_href" value="<?php echo ASSETS_QZPRINT; ?>qz-print_jnlp.jnlp">
								<param name="cache_option" value="plugin">
								<param name="disable_logging" value="false">
								<param name="initial_focus" value="false">
							</applet>
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Ilość
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<input type="text" placeholder="Ilość" class="form-control" name="count"  />
							<span class="help-block"></span>
						</div>
					</div>
					
					<iframe src="" name="barcodes_frame" width="480" height="280">
					</iframe>
					
										
					<br />
					<div class="margiv-top-10">
						<button href="/warehouse/box_barcode_print" class="btn green" id="submit" >
						Generuj kody</button>
						<button href="/warehouse/box_barcode_print" class="btn blue" id="print" onClick="javascript:barcodes_frame.print();">
						Drukuj normalnie</button>
						
						<button href="#" class="btn blue" id="print_on_e4" disabled="true" >Drukuj na drukace kodów</button>
						
						<button href="/warehouse/box_barcode_print" class="btn default" id="cancel">
						Anuluj</button>
					</div>
				</div>	
			</div>
		</form>
	</div>
	<!--end col-md-9-->
</div>