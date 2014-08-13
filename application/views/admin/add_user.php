<h2>Dodaj użytkownika</h2>
<? if ($message) : ?>
	<h3 class="message">
		<?= $message; ?>
	</h3>
<? endif; ?>

<?= Form::open('admin/add_user'); ?>

<?= Form::label('username', 'Nazwa'); ?>
<?= Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>
<div class="error">
	<?= Arr::get($errors, 'username'); ?>
</div>

<?= Form::label('email', 'Email'); ?>
<?= Form::input('email', HTML::chars(Arr::get($_POST, 'email'))); ?>
<div class="error">
	<?= Arr::get($errors, 'email'); ?>
</div>

<?= Form::label('password', 'Hasło'); ?>
<?= Form::password('password'); ?>
<div class="error">
	<?= Arr::path($errors, '_external.password'); ?>
</div>

<?= Form::label('password_confirm', 'Potwierdź hasło'); ?>
<?= Form::password('password_confirm'); ?>
<div class="error">
	<?= Arr::path($errors, '_external.password_confirm'); ?>
</div>

<?= Form::submit('create', 'Dodaj'); ?>
<?= Form::close(); ?>
