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
		<h4>
		<a href="<?php echo $result['url']; ?>">
		<?php echo $result['type']; ?> - <?php echo $result['id']; ?> </a>
		</h4>
		<a href="<?php echo $result['url']; ?>">
		<img src="/barcode/get/<?php echo $result['id']; ?>" > </a>
		<p>
			<?php echo $result['type']; ?>: <?php echo $result['id']; ?>			 
		</p>
	</div>
	<?php endforeach;?>
<!-- 	
	<div class="margin-top-20">
		<ul class="pagination">
			<li>
				<a href="#">
				Prev </a>
			</li>
			<li>
				<a href="#">
				1 </a>
			</li>
			<li>
				<a href="#">
				2 </a>
			</li>
			<li class="active">
				<a href="#">
				3 </a>
			</li>
			<li>
				<a href="#">
				4 </a>
			</li>
			<li>
				<a href="#">
				5 </a>
			</li>
			<li>
				<a href="#">
				Next </a>
			</li>
		</ul>
	</div>
 -->