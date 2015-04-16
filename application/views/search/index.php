	
	<?php if($pagination) echo $pagination->render(); ?>
	
	<div class="row search-form-default">
		<div class="col-md-12">
			<form action="/search" method="POST" >
				<div class="input-group">
					<div class="input-cont">
						<input type="text" name="query" value="<?php echo $query;?>" placeholder="Szukaj..." class="form-control"/>
					</div>
					<span class="input-group-btn">
					<button type="button" class="btn green-haze" onClick="javascript:this.submit();">
					<?php echo __("Szukaj"); ?> &nbsp; <i class="m-icon-swapright m-icon-white"></i>
					</button>
					</span>
				</div>
			</form>
		</div>
	</div>
	<?php foreach ($results['data'] as $result):?>
	<div class="search-classic">
		<?php if($result['type']=="Pudło"):?> 
		<div class="row">
			<div class="col-md-2">
				<h4>
				<a href="<?php echo $result['url']; ?>">
				<?php echo $result['type']; ?> - <?php echo $result['id']; ?> </a>
				</h4>
			
			
			
				<a href="<?php echo $result['url']; ?>">
				<img src="/barcode/get/<?php echo $result['barcode']; ?>" > </a>
				<p>
				<?php echo $result['type']; ?>: <?php echo $result['id']; ?>			 
				</p>
			</div>
			<div class="col-md-4">
				<h4>
				<a href="<?php echo $result['url']; ?>">Regał - <?php echo $result['place']; ?> </a>
				</h4>
				
				<a href="<?php echo $result['url']; ?>">
				<img src="/barcode/get/<?php echo $result['place']; ?>" > </a>
				<p>
				Regał: <?php echo $result['place']; ?>			 
				</p>
			</div>
			<div class="col-md-4">
				<p>
				Dział: <?php echo $result['division']; ?>			 
				</p>
				
				<p>
				Data końca przechowywania: <?php echo $result['date_to']; ?>			 
				</p>
				
			</div>
		</div>
		<hr width="70%" />
		<?php else:?>
				<h4>
				<a href="<?php echo $result['url']; ?>">
				<?php echo $result['type']; ?> - <?php echo $result['id']; ?> </a>
				</h4>
			
				<a href="<?php echo $result['url']; ?>">
				<img src="/barcode/get/<?php echo $result['id']; ?>" > </a>
				
				<p>
				<?php echo $result['type']; ?>: <?php echo $result['id']; ?>			 
				</p>
		<hr width="70%" />
		<?php endif;?>
	</div>
	<?php endforeach;?>
	
	<?php if($pagination) echo $pagination->render(); ?>
 