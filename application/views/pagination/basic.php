<div class="margin-top-20">
	<ul class="pagination">

	<?php if ($first_page !== FALSE): ?>
		<li><span class="btn"><a href="<?php echo HTML::chars($page->url($first_page)) ?>" rel="first"><?php echo __('First') ?></a></span></li>
	<?php else: ?>
		<li><span class="btn"><?php echo __('First') ?></span></li>
	<?php endif ?>

	<?php if ($previous_page !== FALSE): ?>
		<li><span class="btn"><a href="<?php echo HTML::chars($page->url($previous_page)) ?>" rel="prev"><?php echo __('Previous') ?></a></span></li>
	<?php else: ?>
		<li><span class="btn"><?php echo __('Previous') ?></span></li>
	<?php endif ?>

	<?php for ($i = $current_page; $i <= ($current_page+10)-1; $i++): ?>

		<?php if ($i == $current_page): ?>
			<li class="active"><span class="btn"> <strong><?php echo $i ?></strong></span></li>
		<?php else: ?>
			<li><span class="btn"> <a href="<?php echo HTML::chars($page->url($i)) ?>"><?php echo $i ?></a></span></li>
		<?php endif ?>

	<?php endfor ?>

	<?php if ($next_page !== FALSE): ?>
		<li><span class="btn"><a href="<?php echo HTML::chars($page->url($next_page)) ?>" rel="next"><?php echo __('Next') ?></a></span></li>
	<?php else: ?>
		<li><span class="btn"><?php echo __('Next') ?></span></li>
	<?php endif ?>

	<?php if ($last_page !== FALSE): ?>
		<li><span class="btn"><a href="<?php echo HTML::chars($page->url($last_page)) ?>" rel="last"><?php echo __('Last') ?></a></span></li>
	<?php else: ?>
		<li><span class="btn"><?php echo __('Last') ?></span></li>
	<?php endif ?>

</ul><!-- .pagination -->
</div>