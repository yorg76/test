<?php 
$info = Message::info();
$error = Message::error();
$success = Message::success();
?>
<?php if(isset($info) && $info != NULL): ?>
<div class="alert alert-info display-hide" style="display: block;">
		<button class="close" data-close="alert"></button>
		<span>
		<?php echo $info ?></span>
</div>
<?php endif;?>

<?php if(isset($error) && $error != NULL): ?>		

<div class="alert alert-danger display-hide" style="display: block;">
		<button class="close" data-close="alert"></button>
		<span>
		<?php echo $error ?></span>
</div>

<?php endif;?>

<?php if(isset($success) && $success != NULL): ?>
<div class="alert alert-success display-hide" style="display: block;">
		<button class="close" data-close="alert"></button>
		<span>
		<?php echo $success ?></span>
</div>				
<?php endif;?>